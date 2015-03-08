<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * X-Cart
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the software license agreement
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.x-cart.com/license-agreement.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to licensing@x-cart.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not modify this file if you wish to upgrade X-Cart to newer versions
 * in the future. If you wish to customize X-Cart for your needs please
 * refer to http://www.x-cart.com/ for more information.
 *
 * @category  X-Cart 5
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 */

namespace XLite\View\ItemsList\Model;

/**
 * Attributes items list
 */
class Attribute extends \XLite\View\ItemsList\Model\Table
{
    /**
     * Widget param names
     */
    const PARAM_GROUP = 'group';

    /**
     * Define columns structure
     *
     * @return array
     */
    protected function defineColumns()
    {
        return array(
            'name' => array(
                static::COLUMN_NAME     => $this->getAttributeGroup()
                    ? $this->getAttributeGroup()->getName()
                    : \XLite\Core\Translation::lbl('No group'),
                static::COLUMN_CLASS    => 'XLite\View\FormField\Inline\Input\Text',
                static::COLUMN_PARAMS   => array('required' => true),
                static::COLUMN_NO_WRAP  => true,
                static::COLUMN_ORDERBY  => 100,
                static::COLUMN_EDIT_LINK => true,
                static::COLUMN_LINK      => 'attribute',
            ),
            'type' => array(
                static::COLUMN_NAME     => $this->getAttributeGroup()
                    ? static::t(
                        'X attributes in group',
                        array(
                            'count' => $this->getAttributeGroup()->getAttributesCount()
                        )
                    )
                    : null,
                static::COLUMN_TEMPLATE => 'attributes/parts/type.tpl',
                static::COLUMN_ORDERBY  => 200,
            ),
        );
    }

    /**
     * Define repository name
     *
     * @return string
     */
    protected function defineRepositoryName()
    {
        return 'XLite\Model\Attribute';
    }

    /**
     * Get create entity URL
     *
     * @return string
     */
    protected function getCreateURL()
    {
        return \XLite\Core\Converter::buildUrl('attribute');
    }

    /**
     * Get create button label
     *
     * @return string
     */
    protected function getCreateButtonLabel()
    {
        return 'New attribute';
    }

    /**
     * Define widget params
     *
     * @return void
     */
    protected function defineWidgetParams()
    {
        parent::defineWidgetParams();

        $this->widgetParams += array(
            self::PARAM_GROUP => new \XLite\Model\WidgetParam\Object(
                'Group', null, false, '\XLite\Model\AttributeGroup'
            ),
        );
    }

    /**
     * Return class name for the list pager
     *
     * @return string
     */
    protected function getPagerClass()
    {
        return 'XLite\View\Pager\Admin\Model\Infinity';
    }

    /**
     * Get attribute group
     *
     * @return \XLite\Model\AttributeGroup
     */
    protected function getAttributeGroup()
    {
        return $this->getParam(static::PARAM_GROUP);
    }

    // {{{ Behaviors

    /**
     * Mark list as removable
     *
     * @return boolean
     */
    protected function isRemoved()
    {
        return true;
    }

    /**
     * Mark list as sortable
     *
     * @return integer
     */
    protected function getSortableType()
    {
        return static::SORT_TYPE_MOVE;
    }

    /**
     * Check if there are any results to display in list
     *
     * @return boolean
     */
    protected function hasResults()
    {
        return true;
    }

    /**
     * Check if widget is visible
     *
     * @return boolean
     */
    protected function isVisible()
    {
        return $this->getAttributeGroup()
            || 0 < $this->getItemsCount();
    }

    /**
     * Check - pager box is visible or not
     *
     * @return boolean
     */
    protected function isPagerVisible()
    {
        return false;
    }

    /**
     * Build entity page URL
     *
     * @param \XLite\Model\AEntity $entity Entity
     * @param array                $column Column data
     *
     * @return string
     */
    protected function buildEntityURL(\XLite\Model\AEntity $entity, array $column)
    {
        return 'javascript: void(0);';
    }

    /**
     * Get edit link params string
     *
     * @param \XLite\Model\AEntity $entity Entity
     * @param array                $column Column data
     *
     * @return string
     */
    protected function getEditLinkAttributes(\XLite\Model\AEntity $entity, array $column)
    {
        $params = array();
        $params[] = 'data-id=' . $entity->getId();

        if ($entity->getProductClass()) {
            $params[] = 'data-class-id=' . $entity->getProductClass()->getId();
        }

        return parent::getEditLinkAttributes($entity, $column) . implode(' ', $params);
    }

    // }}}

    /**
     * Get container class
     *
     * @return string
     */
    protected function getContainerClass()
    {
        $class = parent::getContainerClass() . ' attributes';

        if ($this->getAttributeGroup()) {
            $class .= ' group';
        }

        return $class;
    }

    /**
     * Get panel class
     *
     * @return \XLite\View\Base\FormStickyPanel
     */
    protected function getPanelClass()
    {
        $groups = $this->getAttributeGroups();

        return (
            $this->getAttributesCount()
            && (
                0 == count($groups)
                || (
                    $this->getAttributeGroup()
                    && end($groups)->getId() == $this->getAttributeGroup()->getId()
                )
            )
        )
            ? 'XLite\View\StickyPanel\ItemsList\Attribute'
            : null;
    }


    // {{{ Search

    /**
     * Return search parameters.
     *
     * @return array
     */
    static public function getSearchParams()
    {
        return array();
    }

    /**
     * Return params list to use for search
     * TODO refactor
     *
     * @return \XLite\Core\CommonCell
     */
    protected function getSearchCondition()
    {
        $result = parent::getSearchCondition();

        foreach (static::getSearchParams() as $modelParam => $requestParam) {
            $paramValue = $this->getParam($requestParam);

            if ('' !== $paramValue && 0 !== $paramValue) {
                $result->$modelParam = $paramValue;
            }
        }

        $result->productClass = $this->getProductClass();
        if (\XLite\Core\Request::getInstance()->isGet()) {
            $result->attributeGroup = $this->getAttributeGroup();
            $result->productClass = $this->getProductClass();
        }
        $result->product = null;

        return $result;
    }

    // }}}
}
