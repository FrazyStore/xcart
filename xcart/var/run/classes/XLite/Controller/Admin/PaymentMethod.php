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

namespace XLite\Controller\Admin;

/**
 * Payment method
 */
class PaymentMethod extends \XLite\Controller\Admin\AAdmin
{
    /**
     * Controller parameters
     *
     * @var string
     */
    protected $params = array('target', 'method_id');

    /**
     * Return page title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->getPaymentMethod()
            ? static::t('{{paymentMethod}} settings', array('paymentMethod' => $this->getPaymentMethod()->getName()))
            : 'Payment method settings';
    }


    /**
     * getPaymentMethod
     *
     * @return \XLite\Model\Payment\Method
     */
    protected function getPaymentMethod()
    {
        return \XLite\Core\Database::getRepo('\XLite\Model\Payment\Method')
            ->find(\XLite\Core\Request::getInstance()->method_id);
    }

    /**
     * Update payment method
     *
     * @return void
     */
    protected function doActionUpdate()
    {
        $settings = \XLite\Core\Request::getInstance()->settings;
        $method = $this->getPaymentMethod();

        if (!$method) {
            \XLite\Core\TopMessage::addError('An attempt to update settings of unknown payment method');

        } else {

            if (is_array($settings)) {
                foreach ($settings as $name => $value) {
                    $method->setSetting($name, trim($value));
                }
            }

            $properties = \XLite\Core\Request::getInstance()->properties;
            if (is_array($properties) && !empty($properties)) {
                $method->map($properties);
            }

            \XLite\Core\Database::getRepo('\XLite\Model\Payment\Method')->update($method);

            // If "just added" method is configured and can be enabled then we enable it
            if (\XLite\Core\Request::getInstance()->just_added && $method->isConfigured() && $method->canEnable()) {
                $method->setEnabled(true);
                \XLite\Core\Database::getEM()->flush();
            }

            \XLite\Core\TopMessage::addInfo('The settings of payment method successfully updated');

            $this->setReturnURL($this->buildURL('payment_settings'));
        }
    }
}
