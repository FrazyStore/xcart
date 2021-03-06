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

namespace XLite\View\Order;

/**
 * Actions  row
 *
 * @ListChild (list="order.actions", weight="200", zone="admin")
 */
class Actions extends \XLite\View\AView
{
    /**
     * Return widget default template
     *
     * @return string
     */
    protected function getDefaultTemplate()
    {
        return 'order/page/parts/action.buttons.tpl';
    }

    /**
     * Check if widget is visible
     *
     * @return boolean
     */
    protected function isVisible()
    {
        return parent::isVisible()
            && 0 < count($this->defineOrderActions());
    }

    /**
     * Get order aActions
     *
     * @param \XLite\Model\Order $entity Order
     *
     * @return array
     */
    protected function getOrderActions(\XLite\Model\Order $entity)
    {
        $list = array();

        foreach ($this->defineOrderActions($entity) as $action) {
            $arguments = array(
                'order_number' => $this->getOrder()->getOrderNumber(),
            );
            $parameters = array(
                'label'    => ucfirst($action),
                'location' => \XLite\Core\Converter::buildURL('order', $action, $arguments),
            );

            $list[] = $this->getWidget($parameters, 'XLite\View\Button\Link');
        }

        return $list;
    }

    /**
     * Define order actions
     *
     * @return array
     */
    protected function defineOrderActions()
    {
        return $this->getOrder()->getAllowedActions();
    }
}

