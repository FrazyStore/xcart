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

namespace XLite\View\Order\Details\Base;

/**
 * AModel
 */
abstract class AModel extends \XLite\View\Model\AModel
{
    /**
     * Return list of targets allowed for this widget
     *
     * @return array
     */
    public static function getAllowedTargets()
    {
        $result = parent::getAllowedTargets();
        $result[] = 'order';

        return $result;
    }

    /**
     * Return current order ID
     *
     * NOTE: this method is public since it's used
     * by the external widgets (e.g. forms)
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->getOrder()->getOrderId();
    }

    /**
     * This object will be used if another one is not pased
     *
     * @return \XLite\Model\Order
     */
    protected function getDefaultModelObject()
    {
        return \XLite::getController()->getOrder();
    }

    /**
     * Return name of web form widget class
     *
     * @return string
     */
    protected function getFormClass()
    {
        return '\XLite\View\Order\Details\Admin\Form';
    }

    /**
     * Return title
     *
     * @return string
     */
    protected function getHead()
    {
        return static::t('Order #{{id}} details', array('id' => $this->getOrderId()));
    }
}
