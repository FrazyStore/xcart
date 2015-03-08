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

    // Load missing currency's translations
    $yamlFile = __DIR__ . LC_DS . 'currencies.yaml';

    if (\Includes\Utils\FileManager::isFileReadable($yamlFile)) {
        $data = \Symfony\Component\Yaml\Yaml::load($yamlFile);

        // Import new and update old currencies
        $repo = \XLite\Core\Database::getRepo('XLite\Model\Currency');
        foreach ($data['XLite\Model\Currency'] as $cell) {
            $currency = $repo->findOneBy(array('code' => $cell['code']));
            if ($currency) {
                foreach ($cell['translations'] as $t) {
                    $translation = $currency->getTranslation($t['code']);
                    $translation->setName($t['name']);
                    if (!$translation->getLabelId()) {
                        \XLite\Core\Database::getEM()->persist($translation);
                    }
                }
            }
        }
        \XLite\Core\Database::getEM()->flush();
    }

    // Change shop_currency from obsolete code to USD
    $currency = \XLite\Core\Database::getRepo('XLite\Model\Currency')->find(\XLite\Core\Config::getInstance()->General->shop_currency);
    if (!$currency) {
        \XLite\Core\Database::getRepo('XLite\Model\Config')->createOption(
            array(
                'category' => 'General',
                'name'     => 'shop_currency',
                'value'    => 840,
            )
        );
    }
};
