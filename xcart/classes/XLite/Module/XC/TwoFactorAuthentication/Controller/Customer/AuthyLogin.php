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

namespace XLite\Module\XC\TwoFactorAuthentication\Controller\Customer;

/**
 * Authy login
 */
class AuthyLogin extends \XLite\Controller\Customer\ACustomer
{
    /**
     * Get page title
     *
     * @return string
     */
    public function getTitle()
    {
        return 'Enter SMS code';
    }

    /**
     * Preprocessor for no-action run
     *
     * @return void
     */
    protected function doNoAction()
    {
        if (!isset(\XLite\Core\Session::getInstance()->preauth_authy_profile_id)) {
            $returnURL = $this->buildURL('login');
            $this->setReturnURL($returnURL);
            $this->redirect();
        }

        $authyCore = \XLite\Module\XC\TwoFactorAuthentication\Core\Authy::getInstance();

        if (!$authyCore->getAuthyIdFromSession()) {
            $registeredAuthyId = $authyCore->registerAuthyForSessionProfile();
            if (empty($registeredAuthyId)) {
                $this->loginSessionProfile();
            }

            \XLite\Core\Database::getEM()->flush();
        }

        $sms = $authyCore->sendSMS();

        static::log(array('send_token' => $sms));

        if (!$sms->ok()) {
            \XLite\Core\TopMessage::addError('Authy:' . $authyCore->getResponseError($sms));
        }
    }

    /**
     * Login action
     *
     * @return void
     */
    protected function  doActionLogin()
    {
        $token = \XLite\Core\Request::getInstance()->sms_token;

        $authyCore = \XLite\Module\XC\TwoFactorAuthentication\Core\Authy::getInstance();
        $verifyResult = $authyCore->verifyToken($token);
        if ($verifyResult) {
            $this->loginSessionProfile();
        } else {
            $this->addTokenFailedMessage();
        }

        static::log(array('verify_result' => $verifyResult));
    }

    /**
     * Resend sms token action
     *
     * @return void
     */
    protected function doActionResendToken()
    {
        $this->setSilenceClose(true);

        $authyCore = \XLite\Module\XC\TwoFactorAuthentication\Core\Authy::getInstance();
        $sms = $authyCore->sendSMS();

        static::log(array('resend_token' => $sms));

        if (!$sms->ok()) {
            \XLite\Core\TopMessage::addError('Authy:' . $authyCore->getResponseError($sms));
        }
    }

    /**
     * Login session profile
     *
     * @return void
     */
    protected function loginSessionProfile()
    {
        $profileId = \XLite\Core\Session::getInstance()->preauth_authy_profile_id;
        $profile = \XLite\Core\Database::getRepo('XLite\Model\Profile')->find($profileId);

        $this->setReturnURL($this->buildURL());

        if (isset($profile)) {
             \XLite\Core\Auth::getInstance()->loginProfile($profile);

            if (\XLite\Core\Request::getInstance()->preReturnURL) {

                $url = preg_replace(
                    '/' . preg_quote(\XLite\Core\Session::getInstance()->getName()) . '=([^&]+)/',
                    '',
                    \XLite\Core\Request::getInstance()->preReturnURL
                );
                $this->setReturnURL($url);
            }

            $profileCart = $this->getCart();
            if (!$this->getReturnURL()) {
                $url = $profileCart->isEmpty()
                    ? \XLite\Core\Converter::buildURL()
                    : \XLite\Core\Converter::buildURL('cart');
                $this->setReturnURL($url);
            }

            $this->setHardRedirect();

            // We merge the logged in cart into the session cart
            $profileCart->login($profile);
            \XLite\Core\Database::getEM()->flush();

            if ($profileCart->isPersistent()) {
                $this->updateCart();
                \XLite\Core\Event::getInstance()->exclude('updateCart');
            }
        }

    }

    /**
     * Add top message if log in is failed
     *
     * @return void
     */
    protected function addTokenFailedMessage()
    {
        \XLite\Core\TopMessage::addError(static::t('SMS code is invalid. Resend SMS code'));
        \XLite\Core\Event::invalidForm('login-form', static::t('Invalid SMS code'));

    }

    /**
     * Logging the data under AuthyLogin
     * Available if developer_mode is on in the config file
     *
     * @param mixed $data Log data
     *
     * @return void
     */
    protected static function log($data)
    {
        if (LC_DEVELOPER_MODE) {
            \XLite\Logger::logCustom('AuthyLogin', $data);
        }
    }
}