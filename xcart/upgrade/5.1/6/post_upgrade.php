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

return function()
{
    $lng = \Includes\Utils\ConfigParser::getOptions(array('installation', 'installation_lng'));

    $dir = 'public' . LC_DS . $lng . LC_DS . 'customer';
    @mkdir(LC_DIR_ROOT . 'public' . LC_DS . 'customer');

    \Includes\Utils\FileManager::copyRecursive(
        dirname(__FILE__) . LC_DS . $dir,
        LC_DIR_ROOT . 'public' . LC_DS . 'customer'
    );

    $origAdminFile = dirname(__FILE__) . LC_DS . 'public' . LC_DS . $lng . LC_DS . 'admin_orig' . LC_DS . 'error.html';

    if (md5_file($origAdminFile) === md5_file(LC_DIR_ROOT . 'public' . LC_DS . 'error.html')) {
        \Includes\Utils\FileManager::copyRecursive(
            dirname(__FILE__) . LC_DS . 'public' . LC_DS . $lng . LC_DS . 'admin',
            LC_DIR_ROOT . 'public'
        );
    }

    \Includes\Utils\Session::setAdminCookie();

    // Configuration names
    $model = \XLite\Core\Database::getRepo('XLite\Model\Config')->findOneBy(array('name' => 'enable_init_order_notif', 'category' => 'Company'));
    if ($model) {
        $label = $model->getHardTranslation('en');
        if ($label) {
            $label->setOptionName('Send Order created notifications to sales department');
        }
    }

    $model = \XLite\Core\Database::getRepo('XLite\Model\Config')->findOneBy(array('name' => 'enable_init_order_notif_customer', 'category' => 'Company'));
    if ($model) {
        $label = $model->getHardTranslation('en');
        if ($label) {
            $label->setOptionName('Send Order created notifications to customers');
        }
    }

};
