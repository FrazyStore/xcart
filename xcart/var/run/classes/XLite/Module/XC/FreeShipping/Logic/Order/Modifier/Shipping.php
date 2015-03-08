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
 * @copyright Copyright (c) 2011-2015 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 */


namespace XLite\Module\XC\FreeShipping\Logic\Order\Modifier;

/**
 * Decorate shipping modifier
 */
abstract class Shipping extends \XLite\Logic\Order\Modifier\ShippingAbstract implements \XLite\Base\IDecorator
{
    /**
     * Get shipped items
     *
     * @return array
     */
    public function getItems()
    {
        $items = parent::getItems();
        $result = array();

        foreach ($items as $item) {
            if (!$item->getObject()->freeShip) {
                $result[] = $item;
            }
        }

        return $result;
    }

    /**
     * Get shipping rates
     *
     * @return array(\XLite\Model\Shipping\Rate)
     */
    public function getRates()
    {
        $rates = parent::getRates();
        $unsetFree = true;

        if (0 == count($this->getItems())) {
            $unsetFree = false;
            foreach ($rates as $rate) {
                $rate->setBaseRate(0);
                $rate->setMarkupRate(0);
                if (!$rate->getMethod()->getFree()) {
                    $unsetFree = true;
                }
            }
        }

        if ($unsetFree) {
            foreach ($rates as $k => $rate) {
                if ($rate->getMethod()->getFree()) {
                    unset($rates[$k]);
                }
            }
        }

        return $rates;
    }

    /**
     * Returns true if any of order items are shipped
     *
     * @return boolean
     */
    protected function isShippable()
    {
        $result = parent::isShippable();

        foreach (parent::getItems() as $item) {
            if ($item->isShippable()) {
                $result = true;
                break;
            }
        }

        return $result;
    }
}
