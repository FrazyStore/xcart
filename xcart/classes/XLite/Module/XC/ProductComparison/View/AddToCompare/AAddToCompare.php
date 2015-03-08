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

namespace XLite\Module\XC\ProductComparison\View\AddToCompare;

/**
 * Add to compare widget
 *
 *
 */
abstract class AAddToCompare extends \XLite\View\Container
{
    /**
     * Checkbox id
     *
     * @var string
     */
    protected $checkboxId;

    /**
     * Product id
     *
     * @var string
     */
    protected $productId;

    /**
     * Get checkbox id
     *
     * @param integer $productId Product id
     *
     * @return string
     */
    public function getCheckboxId($productId)
    {
        if (
            !isset($this->checkboxId)
            || $productId != $this->productId
        ) {
            $this->checkboxId = 'product' . rand() . $productId;
        }
        
        $this->productId = $productId;

        return $this->checkboxId;
    }

    /**
     * Register JS files
     *
     * @return array
     */
    public function getJSFiles()
    {
        $list = parent::getJSFiles();

        $list[] = $this->getDir() . '/script.js';
        $list[] = 'modules/XC/ProductComparison/compare/script.js';

        return $list;
    }

    /**
     * Register CSS files
     *
     * @return array
     */
    public function getCSSFiles()
    {
        $list = parent::getCSSFiles();

        $list[] = $this->getDir() . '/style.css';
        $list[] = 'modules/XC/ProductComparison/compare/style.css';

        return $list;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return \XLite\Module\XC\ProductComparison\Core\Data::getInstance()->getTitle();
    }

    /**
     * Is checked
     *
     * @param integer $productId Product id
     *
     * @return boolean
     */
    public function isChecked($productId)
    {
        $ids = \XLite\Module\XC\ProductComparison\Core\Data::getInstance()->getProductIds();

        return $ids
            && isset($ids[$productId]);
    }

    /**
     * Return default template
     *
     * @return string
     */
    protected function getDefaultTemplate()
    {
        return $this->getDir() . '/body.tpl';
    }

    /**
     * Is empty
     *
     * @return boolean
     */
    protected function isEmptyList()
    {
        return 0 == \XLite\Module\XC\ProductComparison\Core\Data::getInstance()->getProductsCount();
    }

}
