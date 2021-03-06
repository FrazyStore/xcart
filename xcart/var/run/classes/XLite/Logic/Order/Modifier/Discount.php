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

namespace XLite\Logic\Order\Modifier;

/**
 * Abstract Discount modifier - for discounts which should be aggregated
 * and displayed as a single 'Discount' line in cart/order totals
 */
abstract class Discount extends \XLite\Logic\Order\Modifier\ADiscount
{
    /**
     * Modifier unique code
     *
     * @var string
     */
    protected $code = 'DISCOUNT';

    // {{{ Surcharge operations

    /**
     * Get surcharge name
     *
     * @param \XLite\Model\Order\Surcharge $surcharge Surcharge
     *
     * @return \XLite\DataSet\Transport\Order\Surcharge
     */
    public function getSurchargeInfo(\XLite\Model\Base\Surcharge $surcharge)
    {
        $info = new \XLite\DataSet\Transport\Order\Surcharge;

        $info->name = \XLite\Core\Translation::lbl('Discount');

        return $info;
    }

    // }}}

    /**
     * Distribute discount among the ordered products
     * 
     * @param float  $discountTotal Discount value
     *  
     * @return void
     */
    protected function distributeDiscount($discountTotal)
    {
        // Get order items
        $orderItems = $this->getOrderItems();

        // Order currency
        $currency = $this->getOrder()->getCurrency();

        // Initialize service variables
        $subtotal = 0;
        $distributedSum = 0;
        $lastItemKey = null;

        // Calculate sum of subtotals of all items
        foreach ($orderItems as $key => $item) {
            $subtotal += $item->getSubtotal();
        }

        foreach ($orderItems as $key => $item) {

            // Calculate item discount value
            $discountValue = $currency->roundValue(($item->getSubtotal() / $subtotal) * $discountTotal);

            // Set discounted subtotal for item
            $item->setDiscountedSubtotal($item->getSubtotal() - $discountValue);

            // Update distributed discount value
            $distributedSum += $discountValue;

            // Remember last used item
            $lastItemKey = $key;
        }

        if ($distributedSum != $discountTotal) {
            // Correct last item's discount
            $orderItems[$lastItemKey]->setDiscountedSubtotal(
                $orderItems[$lastItemKey]->getDiscountedSubtotal() + $discountTotal - $distributedSum
            );
        }
    }

    /**
     * Returns order items
     * 
     * @return array
     */
    protected function getOrderItems()
    {
        return $this->getOrder()->getItems();
    }
}
