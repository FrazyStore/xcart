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
    $yamlFile = LC_DIR_VAR . 'temporary.items.yaml';

    if (\Includes\Utils\FileManager::isFileReadable($yamlFile)) {
        $data = \Includes\Utils\Operator::loadServiceYAML($yamlFile);
        if ($data) {
            foreach ($data as $k => $v) {
                $attribute = \XLite\Core\Database::getRepo('XLite\Model\Attribute')->find($v['attributeId']);
                if ($attribute) {
                    $attributeValue = \XLite\Core\Database::getRepo($attribute->getAttributeValueClass($attribute->getType()))->find($v['attributeValueId']);
                    if ($attributeValue) {
                        $av = \XLite\Core\Database::getRepo('XLite\Model\OrderItem\AttributeValue')->find($k)->setAttributeValue($attributeValue);
                    }
                }
            }
            \XLite\Core\Database::getEM()->flush();
        }
        \Includes\Utils\FileManager::deleteFile($yamlFile);
    }

    // Loading data to the database from yaml file
    $yamlFile = __DIR__ . LC_DS . 'post_rebuild.yaml';

    if (\Includes\Utils\FileManager::isFileReadable($yamlFile)) {
        \XLite\Core\Database::getInstance()->loadFixturesFromYaml($yamlFile);
    }

    // We move the CleanURL flag into the DB
    \XLite\Core\Database::getRepo('XLite\Model\Config')->createOption(
        array(
            'category' => 'CleanURL',
            'name'     => 'clean_url_flag',
            'value'    => (bool) \Includes\Utils\ConfigParser::getOptions(array('clean_urls', 'enabled')),
        )
    );
};
