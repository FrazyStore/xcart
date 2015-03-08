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

namespace XLite\Module\CDev\Paypal\Model\Payment\Processor;

/**
 * Paypal Payments Standard payment processor
 *
 * @see https://developer.paypal.com/docs/classic/paypal-payments-standard/integration-guide/Appx_websitestandard_htmlvariables
 */
class PaypalWPS extends \XLite\Model\Payment\Base\WebBased
{
    /**
     * Referral page URL
     *
     * @var string
     */
    protected $referralPageURL = 'https://www.paypal.com/webapps/mpp/referral/paypal-payments-standard?partner_id=XCART5_Cart';

    /**
     * Knowledge base page URL
     *
     * @var string
     */
    protected $knowledgeBasePageURL = 'http://kb.x-cart.com/pages/viewpage.action?pageId=7505720';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->api = new \XLite\Module\CDev\Paypal\Core\PayflowAPI();

        $method = \XLite\Module\CDev\Paypal\Main::getPaymentMethod(
            \XLite\Module\CDev\Paypal\Main::PP_METHOD_PPS
        );

        $this->api->setMethod($method);
    }

    /**
     * Get payment method row checkout template
     *
     * @param \XLite\Model\Payment\Method $method Payment method
     *
     * @return string
     */
    public function getCheckoutTemplate(\XLite\Model\Payment\Method $method)
    {
        return 'modules/CDev/Paypal/checkout/paypal.tpl';
    }

    /**
     * Get payment method configuration page URL
     *
     * @param \XLite\Model\Payment\Method $method    Payment method
     * @param boolean                     $justAdded Flag if the method is just added via administration panel.
     *                                               Additional init configuration can be provided OPTIONAL
     *
     * @return string
     */
    public function getConfigurationURL(\XLite\Model\Payment\Method $method, $justAdded = false)
    {
        return \XLite\Core\Converter::buildURL('paypal_settings', '', array('method_id' => $method->getMethodId()));
    }

    /**
     * Get URL of referral page
     *
     * @param \XLite\Model\Payment\Method $method Payment method
     *
     * @return string
     */
    public function getPartnerPageURL(\XLite\Model\Payment\Method $method)
    {
        return \XLite::getXCartURL('http://www.x-cart.com/paypal_shopping_cart.html');
    }

    /**
     * Get URL of referral page
     *
     * @param \XLite\Model\Payment\Method $method Payment method
     *
     * @return string
     */
    public function getReferralPageURL(\XLite\Model\Payment\Method $method)
    {
        return $this->referralPageURL;
    }

    /**
     * Get knowledge base page URL
     *
     * @return string
     */
    public function getKnowledgeBasePageURL()
    {
        return $this->knowledgeBasePageURL;
    }

    /**
     * Prevent enabling Paypal Standard if Paypal Advanced is already enabled
     *
     * @param \XLite\Model\Payment\Method $method Payment method object
     *
     * @return boolean
     */
    public function canEnable(\XLite\Model\Payment\Method $method)
    {
        return parent::canEnable($method)
            && \XLite\Module\CDev\Paypal\Main::PP_METHOD_PPS == $method->getServiceName()
            && !$this->isPaypalAdvancedEnabled();
    }

    /**
     * Return true if ExpressCheckout method is enabled
     *
     * @return boolean
     */
    public function isExpressCheckoutEnabled()
    {
        static $result = null;

        if (!isset($result)) {

            $result = $this->isPaypalMethodEnabled(\XLite\Module\CDev\Paypal\Main::PP_METHOD_EC);
        }

        return $result;
    }

    /**
     * Return true if Paypal Advanced method is enabled
     *
     * @return boolean
     */
    public function isPaypalAdvancedEnabled()
    {
        static $result = null;

        if (!isset($result)) {

            $result = $this->isPaypalMethodEnabled(\XLite\Module\CDev\Paypal\Main::PP_METHOD_PPA);
        }

        return $result;
    }

    /**
     * Get note with explanation why payment method can not be enabled
     *
     * @param \XLite\Model\Payment\Method $method Payment method object
     *
     * @return string
     */
    public function getForbidEnableNote(\XLite\Model\Payment\Method $method)
    {
        $result = parent::getForbidEnableNote($method);

        if (\XLite\Module\CDev\Paypal\Main::PP_METHOD_PPS == $method->getServiceName()) {
            $result = 'This payment method cannot be enabled together with PayPal Advanced method';
        }

        return $result;
    }

    /**
     * Process callback
     *
     * @param \XLite\Model\Payment\Transaction $transaction Callback-owner transaction
     *
     * @return void
     */
    public function processCallback(\XLite\Model\Payment\Transaction $transaction)
    {
        parent::processCallback($transaction);

        if (\XLite\Module\CDev\Paypal\Model\Payment\Processor\PaypalIPN::getInstance()->isCallbackIPN()) {
            // If callback is IPN request from Paypal

            \XLite\Module\CDev\Paypal\Model\Payment\Processor\PaypalIPN::getInstance()
                ->processCallbackIPN($transaction, $this);
        }

        $this->saveDataFromRequest();
    }

    /**
     * Process return
     *
     * @param \XLite\Model\Payment\Transaction $transaction Return-owner transaction
     *
     * @return void
     */
    public function processReturn(\XLite\Model\Payment\Transaction $transaction)
    {
        parent::processReturn($transaction);

        if (\XLite\Core\Request::getInstance()->cancel) {
            $this->setDetail(
                'cancel',
                'Customer has canceled checkout before completing their payments'
            );
            $this->transaction->setStatus($transaction::STATUS_CANCELED);

        } elseif ($transaction::STATUS_INPROGRESS == $this->transaction->getStatus()) {
            $this->transaction->setStatus($transaction::STATUS_PENDING);
        }
    }

    /**
     * Check - payment method is configured or not
     *
     * @param \XLite\Model\Payment\Method $method Payment method
     *
     * @return boolean
     */
    public function isConfigured(\XLite\Model\Payment\Method $method)
    {
        return parent::isConfigured($method)
            && $method->getSetting('account');
    }

    /**
     * Get payment method admin zone icon URL
     *
     * @param \XLite\Model\Payment\Method $method Payment method
     *
     * @return string
     */
    public function getAdminIconURL(\XLite\Model\Payment\Method $method)
    {
        return true;
    }

    /**
     * Return TRUE if the test mode is ON
     *
     * @param \XLite\Model\Payment\Method $method Payment method object
     *
     * @return boolean
     */
    public function isTestMode(\XLite\Model\Payment\Method $method)
    {
        return \XLite\View\FormField\Select\TestLiveMode::TEST === $method->getSetting('mode');
    }


    /**
     * Return true if "serviceName" method is enabled
     *
     * @param string $serviceName Service name
     *
     * @return boolean
     */
    protected function isPaypalMethodEnabled($serviceName)
    {
        $m = \XLite\Core\Database::getRepo('XLite\Model\Payment\Method')->findOneBy(
            array(
                'service_name' => $serviceName,
            )
        );

        return $m && $m->isEnabled();
    }

    /**
     * Get redirect form URL
     *
     * @return string
     */
    protected function getFormURL()
    {
        return $this->isTestMode($this->transaction->getPaymentMethod())
            ? 'https://www.sandbox.paypal.com/cgi-bin/webscr'
            : 'https://www.paypal.com/cgi-bin/webscr';
    }

    /**
     * Return ITEM NAME for request
     *
     * @return string
     */
    protected function getItemName()
    {
        return $this->getSetting('description') . '(Order #' . $this->getOrder()->getOrderNumber() . ')';
    }

    /**
     * Returns order items
     *
     * @param \XLite\Model\Order $order Order
     *
     * @return array
     * @see    https://developer.paypal.com/docs/classic/paypal-payments-standard/integration-guide/Appx_websitestandard_htmlvariables
     */
    protected function getItems($order)
    {
        $result = array();

        $itemsSubtotal  = 0;

        if ($order->countItems()) {
            $index = 1;

            /** @var \XLite\Model\Currency $currency */
            $currency = $order->getCurrency();

            foreach ($order->getItems() as $item) {
                $amt = $currency->roundValue($item->getItemNetPrice());
                $result['amount_' . $index] = $amt;

                /** @var \XLite\Model\Product $product */
                $product = $item->getProduct();
                $result['item_name_' . $index] = $product->getName();

                $qty = $item->getAmount();
                $result['quantity_' . $index] = $qty;
                $itemsSubtotal += $amt * $qty;
                $index += 1;
            }

            // Prepare data about discount

            $discount = $currency->roundValue(
                $order->getSurchargeSumByType(\XLite\Model\Base\Surcharge::TYPE_DISCOUNT)
            );

            if (0 != $discount) {
                $result['discount_amount_cart']  = $discount;
            }

            $result += array('items_amount' => $itemsSubtotal);

            // Prepare data about summary tax cost

            $taxCost = $currency->roundValue(
                $order->getSurchargeSumByType(\XLite\Model\Base\Surcharge::TYPE_TAX)
            );

            if (0 < $taxCost) {
                $result['tax_cart'] = $taxCost;
            }
        }

        return $result;
    }

    /**
     * Get redirect form fields list
     *
     * @return array
     * @see    https://developer.paypal.com/docs/classic/paypal-payments-standard/integration-guide/Appx_websitestandard_htmlvariables
     */
    protected function getFormFields()
    {
        /** @var \XLite\Model\Order $order */
        $order = $this->getOrder();

        /** @var \XLite\Model\Currency $currency */
        $currency = $order->getCurrency();

        $orderTotal = $currency->roundValue($order->getTotal());
        $orderNumber = $this->getSetting('prefix') . $order->getOrderNumber();

        $shippingCost = $this->getShippingCost($order);

        $params = array(
            'return'        => $this->getReturnURL(null, true),
            'cancel_return' => $this->getReturnURL(null, true, true),
            'shopping_url'  => $this->getReturnURL(null, true, true),
            'notify_url'    => $this->getCallbackURL(null, true),
            'rm'            => '2',
            'bn'            => 'XCART5_Cart',
            'upload'        => 1,

            'charset'       => 'UTF-8',
            'cmd'           => '_cart',
            'redirect_cmd'  => '_xclick',
            'business'      => $this->getSetting('account'),

            'custom'        => $order->getOrderNumber(),
            'invoice'       => $orderNumber,

            'currency_code' => $currency->getCode(),
            'handling'      => 0,

            'shipping_1'    => (float) $shippingCost,
            'weight_cart'   => 0,
        );

        if (\XLite\Core\Config::getInstance()->Security->customer_security) {
            $fields['cpp_header_image'] = \XLite\Module\CDev\Paypal\Main::getLogo();
        }

        $items = $this->getItems($order);

        // To avoid total mismatch clear tax and shipping cost
        $taxAmt = isset($items['tax_cart']) ? $items['tax_cart'] : 0;
        if (abs($orderTotal - $items['items_amount'] - $taxAmt - $shippingCost) <= 0.0000000001) {
            unset($items['items_amount']);
            $params += $items;

        } else {
            $params['cmd'] = '_ext-enter';
            $params['amount'] = $orderTotal;
            $params['item_name'] = $this->getItemName();
            unset($params['shipping_1']);
        }

        $profile = $this->getProfile();

        $params += array(
            'address_override' => 1,
            'email'            => $profile->getLogin(),
        );

        if (null !== $shippingCost) {
            /** @var \XLite\Model\Address $address */
            $address = $profile->getShippingAddress();

            $params += array(
                'first_name'    => $address->getFirstname(),
                'last_name'     => $address->getLastname(),
                'country'       => $this->getCountryFieldValue(),
                'state'         => $this->getStateFieldValue(),
                'address1'      => $address->getStreet(),
                'address2'      => 'n/a',
                'city'          => $address->getCity(),
                'zip'           => $address->getZipcode(),
            );
        }

        $params = array_merge($params, $this->getPhone());

        return $params;
    }

    /**
     * Return amount value. Specific for Paypal
     *
     * @return string
     */
    protected function getAmountValue()
    {
        $value = $this->transaction->getValue();

        settype($value, 'float');

        $value = sprintf('%0.2f', $value);

        return $value;
    }

    /**
     * Return Country field value. if no country defined we should use '' value
     *
     * @return string
     */
    protected function getCountryFieldValue()
    {
        $address = $this->getProfile()->getShippingAddress();

        return $address->getCountry()
            ? $address->getCountry()->getCode()
            : '';
    }

    /**
     * Return State field value. If country is US then state code must be used.
     *
     * @return string
     */
    protected function getStateFieldValue()
    {
        $address = $this->getProfile()->getShippingAddress();

        return 'US' === $this->getCountryFieldValue()
            ? $address->getState()->getCode()
            : $address->getState()->getState();
    }

    /**
     * Get shipping cost for set express checkout
     *
     * @param \XLite\Model\Order $order Order
     *
     * @return float
     */
    protected function getShippingCost($order)
    {
        $result = null;

        $shippingModifier = $order->getModifier(\XLite\Model\Base\Surcharge::TYPE_SHIPPING, 'SHIPPING');

        if ($shippingModifier && $shippingModifier->canApply()) {

            /** @var \XLite\Model\Currency $currency */
            $currency = $order->getCurrency();

            $result = $currency->roundValue(
                $order->getSurchargeSumByType(\XLite\Model\Base\Surcharge::TYPE_SHIPPING)
            );
        }

        return $result;
    }

    /**
     * Return Phone structure. specific for Paypal
     *
     * @return array
     */
    protected function getPhone()
    {
        $result = array();

        $phone = $this->getProfile()->getBillingAddress()->getPhone();

        $phone = preg_replace('![^\d]+!', '', $phone);

        if ($phone) {
            if (
                $this->getProfile()->getBillingAddress()->getCountry()
                && 'US' == $this->getProfile()->getBillingAddress()->getCountry()->getCode()
            ) {
                $result = array(
                    'night_phone_a' => substr($phone, -10, -7),
                    'night_phone_b' => substr($phone, -7, -4),
                    'night_phone_c' => substr($phone, -4),
                );
            } else {
                $result['night_phone_b'] = substr($phone, -10);
            }
        }

        return $result;
    }

    /**
     * Define saved into transaction data schema
     *
     * @return array
     */
    protected function defineSavedData()
    {
        return array(
            'secureid'          => 'Transaction id',
            'mc_gross'          => 'Payment amount',
            'payment_type'      => 'Payment type',
            'payment_status'    => 'Payment status',
            'pending_reason'    => 'Pending reason',
            'reason_code'       => 'Reason code',
            'mc_currency'       => 'Payment currency',
            'auth_id'           => 'Authorization identification number',
            'auth_status'       => 'Status of authorization',
            'auth_exp'          => 'Authorization expiration date and time',
            'auth_amount'       => 'Authorization amount',
            'payer_id'          => 'Unique customer ID',
            'payer_email'       => 'Customer\'s primary email address',
            'txn_id'            => 'Original transaction identification number',
        );
    }

    /**
     * Log redirect form
     *
     * @param array $list Form fields list
     *
     * @return void
     */
    protected function logRedirect(array $list)
    {
        $list = $this->maskCell($list, 'account');

        parent::logRedirect($list);
    }

    /**
     * Get allowed currencies
     * https://developer.paypal.com/docs/classic/api/currency_codes/
     *
     * @param \XLite\Model\Payment\Method $method Payment method
     *
     * @return array
     */
    protected function getAllowedCurrencies(\XLite\Model\Payment\Method $method)
    {
        return array_merge(
            parent::getAllowedCurrencies($method),
            array(
                'AUD', 'BRL', 'CAD', 'CZK', 'DKK',
                'EUR', 'HKD', 'HUF', 'ILS', 'JPY',
                'MYR', 'MXN', 'NOK', 'NZD', 'PHP',
                'PLN', 'GBP', 'RUB', 'SGD', 'SEK',
                'CHF', 'TWD', 'THB', 'TRY', 'USD',
            )
        );
    }
}