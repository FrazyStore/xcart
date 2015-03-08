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
 * Login page controller
 */
class Login extends \XLite\Controller\Customer\Login implements \XLite\Base\IDecorator
{
    /**
     * Check if alternative login body used
     *
     * @return boolean
     */
    protected function isAlternativeLoginUsed()
    {
        $isUses = false;

        $data = \XLite\Core\Request::getInstance()->getData();

        list($profile, $result) = \XLite\Core\Auth::getInstance()->checkLoginPassword($data['login'], $data['password']);

        if (isset($profile) && $result === true) {
            $isAdmin = \XLite\Core\Auth::getInstance()->isAdmin($profile)
                && \XLite\Core\Config::getInstance()->XC->TwoFactorAuthentication->admin_interface;

            if (
                \XLite\Core\Config::getInstance()->XC->TwoFactorAuthentication->api_key
                && $profile->getAuthPhoneNumber()
                && $profile->getAuthPhoneCode()
                && (\XLite\Core\Config::getInstance()->XC->TwoFactorAuthentication->customer_interface || $isAdmin)
            ) {
                \XLite\Core\Session::getInstance()->preauth_authy_profile_id = $profile->getProfileId();

                $isUses = true;
            }
        }

        return $isUses;
    }

    /**
     * Alternative login body
     *
     * @return void
     */
    protected function alternativeLoginBody()
    {
        $returnURL = $this->buildURL(
            'authy_login',
            '',
            array(
                'widget'    => '\XLite\Module\XC\TwoFactorAuthentication\View\CustomerLogin',
                'preReturnURL' => \XLite\Core\Request::getInstance()->returnURL,
                )
            );
        $this->setReturnURL($returnURL);

        $this->setHardRedirect(false);
        $this->setInternalRedirect();
    }
}