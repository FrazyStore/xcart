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

namespace XLite\View\FormField\Select\CheckboxList;

/**
 * Multiple select based on checkboxes list
 */
abstract class ACheckboxList extends \XLite\View\FormField\Select\Multiple
{
    /**
     * Register JS files
     *
     * @return array
     */
    public function getJSFiles()
    {
        $list = parent::getJSFiles();
        $list[] = $this->getDir() . '/js/checkbox_list.js';

        return $list;
    }

    /**
     * Register CSS files
     *
     * @return array
     */
    public function getCSSFiles()
    {
        $list = parent::getJSFiles();
        $list[] = $this->getDir() . '/checkbox_list.css';

        return $list;
    }

    /**
     * Set value
     *
     * @param mixed $value Value to set
     *
     * @return void
     */
    public function setValue($value)
    {
        if (
            is_array($value)
            && 1 == sizeof($value)
            && isset($value[0])
            && '' === $value[0]
        ) {
            $value = array();
        }

        parent::setValue($value);
    }

    /**
     * Register files from common repository
     *
     * @return array
     */
    protected function getCommonFiles()
    {
        $list = parent::getCommonFiles();

        $list[static::RESOURCE_JS][] = 'js/jquery.multiselect.min.js';
        $list[static::RESOURCE_JS][] = 'js/jquery.multiselect.filter.min.js';

        $list[static::RESOURCE_CSS][] = 'css/jquery.multiselect.css';
        $list[static::RESOURCE_CSS][] = 'css/jquery.multiselect.filter.css';

        return $list;
    }

    /**
     * Prepare attributes
     *
     * @param array $attrs Field attributes to prepare
     *
     * @return array
     */
    protected function prepareAttributes(array $attrs)
    {
        $attrs = parent::prepareAttributes($attrs);

        $attrs['class'] = (empty($attrs['class']) ? '' : $attrs['class'] . ' ')
            . 'checkbox-list';

        return $attrs;
    }

    /**
     * Set common attributes
     *
     * @param array $attrs Field attributes to prepare
     *
     * @return array
     */
    protected function setCommonAttributes(array $attrs)
    {
        return parent::setCommonAttributes($attrs)
            + array(
                'data-placeholder'   => static::t('Select options'),
                'data-selected-text' => static::t('# selected'),
            );
    }

    /**
     * Set the form field as "form control" (some major styling will be applied)
     *
     * @return boolean
     */
    protected function isFormControl()
    {
        return false;
    }
}
