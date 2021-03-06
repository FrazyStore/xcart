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

namespace XLite\View\OrderStatus;

/**
 * Abstract order status
 */
abstract class AOrderStatus extends \XLite\View\AView
{
    /**
     * Widget parameter. Order.
     */
    const PARAM_ORDER       = 'order';

    /**
     * Widget parameter. Use wrapper flag.
     */
    const PARAM_USE_WRAPPER = 'useWrapper';

    /**
     * Return status
     *
     * @return mixed
     */
    abstract protected function getStatus();

    /**
     * Return label
     *
     * @return string
     */
    abstract protected function getLabel();

    /**
     * Check if the widget is visible
     *
     * @return boolean
     */
    public function isVisible()
    {
        return $this->getOrder() && $this->getStatus();
    }

    /**
     * Get order
     *
     * @return \XLite\Model\Order
     */
    public function getOrder()
    {
        return $this->getParam(self::PARAM_ORDER);
    }

    /**
     * Return widget default template
     *
     * @return string
     */
    protected function getDefaultTemplate()
    {
        return 'common/order_status.tpl';
    }

    /**
     * Define widget parameters
     *
     * @return void
     */
    protected function defineWidgetParams()
    {
        parent::defineWidgetParams();

        $this->widgetParams += array(
            self::PARAM_ORDER       => new \XLite\Model\WidgetParam\Object('Order', null, false, '\XLite\Model\Order'),
            self::PARAM_USE_WRAPPER => new \XLite\Model\WidgetParam\Bool('Use wrapper', false),
        );
    }

    /**
     * Return CSS class to use with wrapper
     *
     * @return string
     */
    protected function getCSSClass()
    {
        $code = $this->getStatus() ? $this->getStatus()->getCode() : '';

        return $code
            ? 'order-status-' . $code
            : 'order-status';
    }

    /**
     * Return title
     *
     * @return string
     */
    protected function getTitle()
    {
        return $this->getStatus()
            ? (\XLite::isAdminZone() ? $this->getStatus()->getName() : $this->getStatus()->getCustomerName())
            : '';
    }
}
