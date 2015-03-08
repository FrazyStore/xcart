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

namespace XLite\Module\XC\TwoFactorAuthentication\View\Model\Profile;

/**
 * \XLite\View\Model\Profile\Main
 */
class Main extends \XLite\View\Model\Profile\Main implements \XLite\Base\IDecorator
{
    /**
     * Schema for phone number and phone country code
     *
     * @var array
     */
    protected $auth_phone = array(
        'auth_phone_code' => array(
            self::SCHEMA_CLASS       => '\XLite\Module\XC\TwoFactorAuthentication\View\FormField\Input\Text\PhoneCode',
            self::SCHEMA_LABEL       => 'Country phone code',
            self::SCHEMA_REQUIRED    => false,
            self::SCHEMA_PLACEHOLDER => '+1',
        ),
        'auth_phone_number' => array(
            self::SCHEMA_CLASS       => '\XLite\View\FormField\Input\Text\Phone',
            self::SCHEMA_LABEL       => 'Phone number',
            self::SCHEMA_REQUIRED    => false,
            self::SCHEMA_PLACEHOLDER => '9178007060',
            self::SCHEMA_HELP        => 'Type your phone number here to receive a SMS code for two-factor-authentication'
        )
    );

    /**
     * Return fields list by the corresponding schema
     *
     * @return array
     */
    protected function getFormFieldsForSectionMain()
    {
        $schema = array_merge($this->mainSchema, $this->auth_phone);

        // Modify the main schema
        $this->mainSchema = $schema;

        return parent::getFormFieldsForSectionMain();
    }
}