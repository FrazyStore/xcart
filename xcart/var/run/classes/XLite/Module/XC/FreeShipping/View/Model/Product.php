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

namespace XLite\Module\XC\FreeShipping\View\Model;

/**
 * Decorate product settings page
 */
abstract class Product extends \XLite\Module\CDev\Sale\View\Model\Product implements \XLite\Base\IDecorator
{
    /**
     * Constructor
     *
     * @param array $params   Params   OPTIONAL
     * @param array $sections Sections OPTIONAL
     */
    public function __construct(array $params = array(), array $sections = array())
    {
        parent::__construct($params, $sections);

        $schema = array();
        $isFreeShippingAdded = false;
        foreach ($this->schemaDefault as $name => $value) {
            $schema[$name] = $value;
            if ('shippable' == $name) {
                $schema['freeShip'] = $this->defineFreeShipping();
                $isFreeShippingAdded = true;
            }
        }

        if (!$isFreeShippingAdded) {
            $schema['freeShip'] = $this->defineFreeShipping();
        }

        $this->schemaDefault = $schema;
    }

    /**
     * Defines the is free shipping by module field
     *
     * @return array
     */
    protected function defineFreeShipping()
    {
        return array(
            static::SCHEMA_CLASS      => 'XLite\View\FormField\Select\YesNo',
            static::SCHEMA_LABEL      => static::t('Free shipping'),
            static::SCHEMA_REQUIRED   => false,
            static::SCHEMA_DEPENDENCY => array(
                static::DEPENDENCY_SHOW => array(
                    'shippable' => array(\XLite\View\FormField\Select\YesNo::YES),
                ),
            ),
        );
    }

    /**
     * Populate model object properties by the passed data.
     * Specific wrapper for setModelProperties method.
     *
     * @param array $data Data to set
     *
     * @return void
     */
    protected function updateModelProperties(array $data)
    {
        if ($data['freeShip']) {
            $data['freeShip'] = 'Y' == $data['freeShip'];
        }

        parent::updateModelProperties($data);
    }
}