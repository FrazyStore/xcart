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

namespace XLite\Module\XC\News\Model;

/**
 * NewsMessage
 *
 * @Entity (repositoryClass="\XLite\Module\XC\News\Model\Repo\NewsMessage")
 * @Table  (name="news",
 *      indexes={
 *          @Index (name="enabled", columns={"enabled"}),
 *          @Index (name="cl", columns={"cleanURL"})
 *      }
 * )
 * @HasLifecycleCallbacks
 */
class NewsMessage extends \XLite\Model\Base\Catalog
{
    /**
     * Unique ID
     *
     * @var integer
     *
     * @Id
     * @GeneratedValue (strategy="AUTO")
     * @Column         (type="uinteger")
     */
    protected $id;

    /**
     * Is menu enabled or not
     *
     * @var boolean
     *
     * @Column (type="boolean")
     */
    protected $enabled = true;

    /**
     * Date add news message
     *
     * @var integer
     *
     * @Column (type="integer")
     */
    protected $date;

    /**
     * Prepare order before save data operation
     *
     * @return void
     *
     * @PrePersist
     * @PreUpdate
     */
    public function prepareBeforeSave()
    {
        parent::prepareBeforeSave();

        if (!is_numeric($this->date) || !is_int($this->date)) {
            $this->setDate(\XLite\Core\Converter::time());
        }
    }

    /**
     * Check - news is enabled or not
     * 
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->getEnabled()
            && $this->getDate() < \XLite\Core\Converter::time();
    }

    /**
     * Get front URL
     *
     * @return string
     */
    public function getFrontURL()
    {
        $url = null;
        if ($this->getId()) {
            $url = \XLite::getInstance()->getShopURL(
                \XLite\Core\Converter::buildURL(
                    'newsMessage',
                    '',
                    array('id' => $this->getId()),
                    \XLite::CART_SELF,
                    true
                )
            );
        }

        return $url;
    }

    /**
     * The main procedure to generate clean URL
     *
     * @return string
     */
    public function generateCleanURL()
    {
        return $this->getRepository()->generateCleanURL($this, $this->getName());
    }

    /**
     * Get id
     *
     * @return uinteger 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return NewsMessage
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set date
     *
     * @param integer $date
     * @return NewsMessage
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get date
     *
     * @return integer 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set cleanURL
     *
     * @param string $cleanURL
     * @return NewsMessage
     */
    public function setCleanURL($cleanURL)
    {
        $this->cleanURL = $cleanURL;
        return $this;
    }

    /**
     * Get cleanURL
     *
     * @return string 
     */
    public function getCleanURL()
    {
        return $this->cleanURL;
    }

    /**
     * Translations (relation). AUTOGENERATED
     *
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @OneToMany (targetEntity="XLite\Module\XC\News\Model\NewsMessageTranslation", mappedBy="owner", cascade={"all"})
     */
    protected $translations;

    /**
     * Translation getter. AUTOGENERATED
     *
     * @return string
     */
    public function getName()
    {
        return $this->getSoftTranslation()->getName();
    }

    /**
     * Translation setter. AUTOGENERATED
     *
     * @param string $value value to set
     *
     * @return void
     */
    public function setName($value)
    {
        $translation = $this->getTranslation();

        if (!$this->hasTranslation($translation->getCode())) {
            $this->addTranslations($translation);
        }

        return $translation->setName($value);
    }

    /**
     * Translation getter. AUTOGENERATED
     *
     * @return string
     */
    public function getBody()
    {
        return $this->getSoftTranslation()->getBody();
    }

    /**
     * Translation setter. AUTOGENERATED
     *
     * @param string $value value to set
     *
     * @return void
     */
    public function setBody($value)
    {
        $translation = $this->getTranslation();

        if (!$this->hasTranslation($translation->getCode())) {
            $this->addTranslations($translation);
        }

        return $translation->setBody($value);
    }

    /**
     * Translation getter. AUTOGENERATED
     *
     * @return string
     */
    public function getMetaTags()
    {
        return $this->getSoftTranslation()->getMetaTags();
    }

    /**
     * Translation setter. AUTOGENERATED
     *
     * @param string $value value to set
     *
     * @return void
     */
    public function setMetaTags($value)
    {
        $translation = $this->getTranslation();

        if (!$this->hasTranslation($translation->getCode())) {
            $this->addTranslations($translation);
        }

        return $translation->setMetaTags($value);
    }

    /**
     * Translation getter. AUTOGENERATED
     *
     * @return string
     */
    public function getMetaDesc()
    {
        return $this->getSoftTranslation()->getMetaDesc();
    }

    /**
     * Translation setter. AUTOGENERATED
     *
     * @param string $value value to set
     *
     * @return void
     */
    public function setMetaDesc($value)
    {
        $translation = $this->getTranslation();

        if (!$this->hasTranslation($translation->getCode())) {
            $this->addTranslations($translation);
        }

        return $translation->setMetaDesc($value);
    }

    /**
     * Translation getter. AUTOGENERATED
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->getSoftTranslation()->getMetaTitle();
    }

    /**
     * Translation setter. AUTOGENERATED
     *
     * @param string $value value to set
     *
     * @return void
     */
    public function setMetaTitle($value)
    {
        $translation = $this->getTranslation();

        if (!$this->hasTranslation($translation->getCode())) {
            $this->addTranslations($translation);
        }

        return $translation->setMetaTitle($value);
    }


}