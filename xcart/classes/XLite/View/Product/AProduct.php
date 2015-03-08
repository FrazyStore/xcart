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

namespace XLite\View\Product;

/**
 * Abstract product-based widget
 */
abstract class AProduct extends \XLite\View\AView
{
    /**
     * getDir
     *
     * @return string
     */
    protected function getDir()
    {
        return 'product';
    }

    /**
     * Return widget default template
     *
     * @return string
     */
    protected function getDefaultTemplate()
    {
        return $this->getDir() . '/body.tpl';
    }

    /**
     * Check if the product is in-stock
     *
     * @return boolean
     */
    protected function isInStock()
    {
        return $this->getProduct()->getInventory()->getEnabled()
            && !$this->getProduct()->getInventory()->isOutOfStock();
    }   

    /**
     * Check if the product is out-of-stock
     *
     * @return boolean
     */
    protected function isOutOfStock()
    {
        return $this->getProduct()->getInventory()->isOutOfStock();
    }

    /**
     * Check - product is available for sale or not
     * 
     * @return boolean
     */
    protected function isProductAvailableForSale()
    {
        return $this->getProduct()->isAvailable();
    }

    /**
     * Checks whether a product was added to the cart
     *
     * @return boolean
     */
    protected function isProductAdded()
    {
        return $this->getCart()->isProductAdded($this->getProduct()->getProductId());
    }
}