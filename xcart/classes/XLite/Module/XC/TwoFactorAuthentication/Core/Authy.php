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

namespace XLite\Module\XC\TwoFactorAuthentication\Core;

/**
 * Authy client
 */
class Authy extends \XLite\Base\Singleton
{
    /**
     * URL for test mode
     */
    const SANDBOX_URL = 'http://sandbox-api.authy.com';

    /**
     * authy api object
     *
     * @var \Authy_Api
     */
    protected $authyApi;

    /**
     * Get Authy_Api object
     *
     * @return \Authy_Api
     */
    public function getAuthyApi()
    {
        return $this->authyApi;
    }

    /**
     * Get authy id from session user
     *
     * @return integer
     */
    public function getAuthyIdFromSession()
    {
        $authyId = null;

        $profileId = \XLite\Core\Session::getInstance()->preauth_authy_profile_id;
        $profile = \XLite\Core\Database::getRepo('XLite\Model\Profile')->find($profileId);
        if (isset($profile)) {
            $authyId = $profile->getAuthyId();
        }

        return $authyId;
    }

    /**
     * Register Authy user by User from session and return Authy id
     *
     * @return integer
     */
    public function registerAuthyForSessionProfile()
    {
        $profileId = \XLite\Core\Session::getInstance()->preauth_authy_profile_id;
        $profile = \XLite\Core\Database::getRepo('XLite\Model\Profile')->find($profileId);

        $authyPhone = preg_replace('/[^0-9]/', '', $profile->getAuthPhoneNumber());
        $authyPhoneCode = preg_replace('/[^0-9]/', '', $profile->getAuthPhoneCode());

        $authyApi = $this->getAuthyApi();
        $authyUser = $authyApi->registerUser($profile->getLogin(), $authyPhone, $authyPhoneCode);
        $authyId = null;
        if ($authyUser->ok()) {
            $authyId = $authyUser->id();
            $profile->setAuthyId($authyId);

        } else {
            \XLite\Core\TopMessage::addError('Authy:' . $this->getResponseError($authyUser));
            \XLite\Logger::logCustom('AuthyLogin_error', array('register_user_error' => $this->getResponseError($authyUser)));
        }

        return $authyId;
    }

    /**
     * Send sms to profile from session
     *
     * @return \Authy_Response
     */
    public function sendSMS()
    {
        $authyApi = $this->getAuthyApi();
        $sms = $authyApi->requestSms($this->getAuthyIdFromSession());
        if (!$sms->ok())
        {
            \XLite\Logger::logCustom('AuthyLogin_error', array('send_sms_error' => $this->getResponseError($sms)));
        }

        return $sms;
    }

    /**
     * Get response error if it is
     *
     * @param \Authy_Response $response Target response
     *
     * @return string
     */
    public function getResponseError(\Authy_Response $response)
    {
        return !is_null($response->errors()->message)
            ? $response->errors()->message
            : null;
    }

    /**
     * Verify SMS token
     *
     * @param string $smsToken SMS token
     *
     * @return boolean
     */
    public function verifyToken($smsToken)
    {
        $authyApi = $this->getAuthyApi();
        $verification = $authyApi->verifyToken($this->getAuthyIdFromSession(), $smsToken);

        return $verification->ok();
    }

    /**
     * Constructor
     *
     * @return void
     */
    protected function __construct()
    {
        require_once LC_DIR_MODULES . 'XC' . LC_DS . 'TwoFactorAuthentication' . LC_DS . 'lib' . LC_DS . 'Api.php';
        require_once LC_DIR_MODULES . 'XC' . LC_DS . 'TwoFactorAuthentication' . LC_DS . 'lib' . LC_DS . 'Response.php';
        require_once LC_DIR_MODULES . 'XC' . LC_DS . 'TwoFactorAuthentication' . LC_DS . 'lib' . LC_DS . 'User.php';
        require_once LC_DIR_MODULES . 'XC' . LC_DS . 'TwoFactorAuthentication' . LC_DS . 'lib' . LC_DS . 'Resty.php';

        $config = \XLite\Core\Config::getInstance()->XC->TwoFactorAuthentication;

        if ($config->api_key) {
            $this->authyApi = \XLite\Core\Config::getInstance()->XC->TwoFactorAuthentication->production_mode
                ? new \Authy_Api($config->api_key)
                : new \Authy_Api($config->api_key, static::SANDBOX_URL);
        }
    }
}