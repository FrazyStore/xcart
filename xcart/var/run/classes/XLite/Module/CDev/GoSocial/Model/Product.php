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

namespace XLite\Module\CDev\GoSocial\Model;

/**
 * Product
 * @MappedSuperClass 
 */
abstract class Product extends \XLite\Module\CDev\FeaturedProducts\Model\Product implements \XLite\Base\IDecorator
{
    /**
     * Custom Open graph meta tags
     *
     * @var string
     *
     * @Column (type="text")
     */
    protected $ogMeta = '';

    /**
     * User Open graph meta tags generator flag
     *
     * @var boolean
     *
     * @Column (type="boolean")
     */
    protected $useCustomOG = false;

    /**
     * Get Open Graph meta tags
     *
     * @param boolean $preprocessed Preprocessed OPTIONAL
     *
     * @return string
     */
    public function getOpenGraphMetaTags($preprocessed = true)
    {
        $tags = $this->getUseCustomOG()
            ? $this->getOgMeta()
            : $this->generateOpenGraphMetaTags();

        return $preprocessed ? $this->preprocessOpenGraphMetaTags($tags) : $tags;
    }

    /**
     * Define Open Graph meta tags
     *
     * @return array
     */
    protected function defineOpenGraphMetaTags()
    {
        $list = array(
            'og:title'       => $this->getOpenGraphTitle(),
            'og:type'        => $this->getOpenGraphType(),
            'og:url'         => $this->getOpenGraphURL(),
            'og:site_name'   => $this->getOpenGraphSiteName(),
            'og:description' => $this->getOpenGraphDescription(),
            'og:locale'      => $this->getOpenGraphLocale(),
        );

        if ($this->getImage()) {
            $list['og:image'] = $this->getOpenGraphImage();
        }

        $appId = $this->getOpenGraphAppId();
        $admins = $this->getOpenGraphAdmins();
        if ($appId) {
            $list['fb:app_id'] = $appId;

        } elseif ($admins) {
            $list['fb:admins'] = $admins;
        }

        return $list;
    }

    /**
     * Returns open graph title
     *
     * @return string
     */
    protected function getOpenGraphTitle()
    {
        return $this->getName();
    }

    /**
     * Returns open graph type
     *
     * @return string
     */
    protected function getOpenGraphType()
    {
        return 'article';
    }

    /**
     * Returns open graph url
     *
     * @return string
     */
    protected function getOpenGraphURL()
    {
        return '[PAGE_URL]';
    }

    /**
     * Returns open graph site name
     *
     * @return string
     */
    protected function getOpenGraphSiteName()
    {
        return \XLite\Core\Config::getInstance()->Company->company_name;
    }

    /**
     * Returns open graph description
     *
     * @return string
     */
    protected function getOpenGraphDescription()
    {
        return strip_tags($this->getBriefDescription());
    }

    /**
     * Returns open graph locale
     *
     * @return string
     */
    protected function getOpenGraphLocale()
    {
        return 'en_US';
    }

    /**
     * Returns open graph image
     *
     * @return string
     */
    protected function getOpenGraphImage()
    {
        return '[IMAGE_URL]';
    }

    /**
     * Returns open graph app id
     *
     * @return string
     */
    protected function getOpenGraphAppId()
    {
        return \XLite\Core\Config::getInstance()->CDev->GoSocial->fb_app_id;
    }

    /**
     * Returns open graph admins
     *
     * @return string
     */
    protected function getOpenGraphAdmins()
    {
        return \XLite\Core\Config::getInstance()->CDev->GoSocial->fb_admins;
    }

    /**
     * Get generated Open Graph meta tags
     *
     * @return string
     */
    protected function generateOpenGraphMetaTags()
    {
        $list = $this->defineOpenGraphMetaTags();

        $html = array();
        foreach ($list as $k => $v) {
            $html[] = '<meta property="' . $k . '" content="' . htmlentities($v, ENT_COMPAT, 'UTF-8') . '" />';
        }

        return implode("\n", $html);
    }

    /**
     * Preprocess Open Graph meta tags
     *
     * @param string $tags Tags content
     *
     * @return string
     */
    protected function preprocessOpenGraphMetaTags($tags)
    {
        return str_replace(
            array(
                '[PAGE_URL]',
                '[IMAGE_URL]',
            ),
            array(
                $this->getFrontURL(),
                $this->getImage() ? $this->getImage()->getFrontURL() : '',
            ),
            $tags
        );
    }

    /**
     * Set ogMeta
     *
     * @param text $ogMeta
     * @return Product
     */
    public function setOgMeta($ogMeta)
    {
        $this->ogMeta = $ogMeta;
        return $this;
    }

    /**
     * Get ogMeta
     *
     * @return text 
     */
    public function getOgMeta()
    {
        return $this->ogMeta;
    }

    /**
     * Set useCustomOG
     *
     * @param boolean $useCustomOG
     * @return Product
     */
    public function setUseCustomOG($useCustomOG)
    {
        $this->useCustomOG = $useCustomOG;
        return $this;
    }

    /**
     * Get useCustomOG
     *
     * @return boolean 
     */
    public function getUseCustomOG()
    {
        return $this->useCustomOG;
    }
}