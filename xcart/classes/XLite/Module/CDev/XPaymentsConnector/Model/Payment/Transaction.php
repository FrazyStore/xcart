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

namespace XLite\Module\CDev\XPaymentsConnector\Model\Payment;

/**
 * XPayments payment processor
 *
 */
class Transaction extends \XLite\Model\Payment\Transaction implements \XLite\Base\IDecorator
{
    /**
     * One-to-one relation with X-Payments transaction details
     *
     * @var \XLite\Module\CDev\XPaymentsConnector\Model\Payment\XpcTransactionData
     *
     * @OneToOne  (targetEntity="\XLite\Module\CDev\XPaymentsConnector\Model\Payment\XpcTransactionData", mappedBy="transaction", cascade={"all"})
     */
    protected $xpc_data;

    /**
     * Check - transaction is X-Payment connector's transaction
     * 
     * @return boolean
     */
    public function isXPC($includeSavedCardsMethod = false)
    {
        $xpClass = array(
            'Module\CDev\XPaymentsConnector\Model\Payment\Processor\XPayments',
        );

        if ($includeSavedCardsMethod) {
            $xpClass[] = 'Module\CDev\XPaymentsConnector\Model\Payment\Processor\SavedCard';
        } 

        return $this->getPaymentMethod()
            && in_array($this->getPaymentMethod()->getClass(), $xpClass);
    }

    /**
     * Check - transaction is open or not
     *
     * @return boolean
     */
    public function isOpen()
    {
        return parent::isOpen()
            || (static::STATUS_INPROGRESS == $this->getStatus() && $this->isXPC());
    }

    /**
     * Save card in details 
     *
     * @return array
     */
    public function setXpcDetails($cardNumber, $cardType, $useForRecharges = 'N')
    {
        $xpcData = new \XLite\Module\CDev\XPaymentsConnector\Model\Payment\XpcTransactionData;

        $xpcData->setCardNumber($cardNumber);
        $xpcData->setCardType($cardType);
        $xpcData->setUseForRecharges($useForRecharges);
        $xpcData->setTransaction($this);

        $this->xpc_data = $xpcData;
        
    }

    /**
     * Get saved credit card 
     *
     * @return array
     */
    public function getCard($forRechargesOnly = false)
    {
        $result = false;

        $xpcData = $this->xpc_data;

        if (
            !empty($xpcData)
            && !empty($xpcData->card_number)
            && !empty($xpcData->card_type) 
            && (!$forRechargesOnly || 'Y' == $xpcData->use_for_recharges)
        ) {

            $result = array(
                'card_id'           => $xpcData->id,
                'card_number'       => $xpcData->card_number,
                'card_type'         => $xpcData->card_type,
                'use_for_recharges' => $xpcData->use_for_recharges
            );
        }

        return $result;
    }

    /**
     * Set whether controller should be finalized via customer's checkout callSuccess (say hello to crapcode)
     *
     * @return void 
     */
    public function setCallCheckoutSuccessNecessary($isNecessary = true)
    {
        if (
            true === $isNecessary
            || 'Y' === $isNecessary
        ) {
            $value = 'Y';
        } else {
            $value = 'N';
        }

        $this->setDataCell('xpc_call_checkout_success', $value, '', 'C');
        \XLite\Core\Database::getEM()->flush();
    }

    /**
     * Check whether controller should be finalized via customer's checkout callSuccess (say hello to crapcode) 
     *
     * @return boolean
     */
    public function isCallCheckoutSuccessNecessary()
    {
        return $this->getDataCell('xpc_call_checkout_success')
            && 'Y' == $this->getDataCell('xpc_call_checkout_success')->getValue();
    }

    /**
     * Get initial action of a transaction. Was it first authorized or charged.
     *
     * @return string
     */
    public function getInitXpcAction()
    {
        if (
            $this->getDataCell('xpc_authorized')
            && $this->getDataCell('xpc_authorized')->getValue() > \XLite\Model\Order::ORDER_ZERO
        ) {
            $action = 'authorize';
        } else {
            $action = 'charge';
        }

        return $action;
    }

    /**
     * Get transaction xpc_ values. What was actually authorized, paid, voided, and refunded.
     *
     * @return array 
     */
    public function getXpcValues()
    {
        $fields = array(
            'authorized', 'paid', 'voided', 'refunded',
        );

        foreach ($fields as $key) {
            $$key = $this->getDataCell('xpc_' . $key)
                ? $this->getDataCell('xpc_' . $key)->getValue()
                : 0;

        }

        if ($paid == 0 && $refunded > 0) {

            // WA fix for the information returned from X-Payments.
            // The captured and charged values are calculated in a different way,
            // refunded amount is substracted from charged but not from captured.
            // See XPay_Model_Payment::getInfo().

            $paid = $refunded;
        }

        return array($authorized, $paid, $voided, $refunded);
    }

    /**
     * Get charge value modifier
     *
     * @return float
     */
    public function getChargeValueModifier()
    {
        if ($this->isXpc(true)) {

            list($authorized, $paid, $voided, $refunded) = $this->getXpcValues();

            $positive = max($authorized, $paid);

            $negative = $voided + $refunded;

            $value = $positive - $negative;

        } else {

            $value = parent::getChargeValueModifier();

        }

        return $value;
    }

}
