<?php

namespace XLite\Model\Proxy\__CG__\XLite\Model;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Product extends \XLite\Model\Product implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function cloneEntity()
    {
        $this->__load();
        return parent::cloneEntity();
    }

    public function addUpsellingProducts(\XLite\Module\XC\Upselling\Model\UpsellingProduct $upsellingProducts)
    {
        $this->__load();
        return parent::addUpsellingProducts($upsellingProducts);
    }

    public function getUpsellingProducts()
    {
        $this->__load();
        return parent::getUpsellingProducts();
    }

    public function addUpsellingParentProducts(\XLite\Module\XC\Upselling\Model\UpsellingProduct $upsellingParentProducts)
    {
        $this->__load();
        return parent::addUpsellingParentProducts($upsellingParentProducts);
    }

    public function getUpsellingParentProducts()
    {
        $this->__load();
        return parent::getUpsellingParentProducts();
    }

    public function getVotesCount()
    {
        $this->__load();
        return parent::getVotesCount();
    }

    public function getReviewsCount()
    {
        $this->__load();
        return parent::getReviewsCount();
    }

    public function getAverageRating()
    {
        $this->__load();
        return parent::getAverageRating();
    }

    public function getRatings()
    {
        $this->__load();
        return parent::getRatings();
    }

    public function isEmptyAverageRating()
    {
        $this->__load();
        return parent::isEmptyAverageRating();
    }

    public function getMaxRatingValue()
    {
        $this->__load();
        return parent::getMaxRatingValue();
    }

    public function getReviewAddedByUser(\XLite\Model\Profile $profile = NULL, $findByIp = true)
    {
        $this->__load();
        return parent::getReviewAddedByUser($profile, $findByIp);
    }

    public function isRatedByUser(\XLite\Model\Profile $profile = NULL)
    {
        $this->__load();
        return parent::isRatedByUser($profile);
    }

    public function isReviewedByUser(\XLite\Model\Profile $profile = NULL)
    {
        $this->__load();
        return parent::isReviewedByUser($profile);
    }

    public function addReviews(\XLite\Module\XC\Reviews\Model\Review $reviews)
    {
        $this->__load();
        return parent::addReviews($reviews);
    }

    public function getReviews()
    {
        $this->__load();
        return parent::getReviews();
    }

    public function setFreeShip($freeShip)
    {
        $this->__load();
        return parent::setFreeShip($freeShip);
    }

    public function getFreeShip()
    {
        $this->__load();
        return parent::getFreeShip();
    }

    public function getAllAttributes()
    {
        $this->__load();
        return parent::getAllAttributes();
    }

    public function clearSitemaps()
    {
        $this->__load();
        return parent::clearSitemaps();
    }

    public function getDiscountType()
    {
        $this->__load();
        return parent::getDiscountType();
    }

    public function getNetPriceBeforeSale()
    {
        $this->__load();
        return parent::getNetPriceBeforeSale();
    }

    public function getDisplayPriceBeforeSale()
    {
        $this->__load();
        return parent::getDisplayPriceBeforeSale();
    }

    public function setParticipateSale($participateSale)
    {
        $this->__load();
        return parent::setParticipateSale($participateSale);
    }

    public function getParticipateSale()
    {
        $this->__load();
        return parent::getParticipateSale();
    }

    public function setDiscountType($discountType)
    {
        $this->__load();
        return parent::setDiscountType($discountType);
    }

    public function setSalePriceValue($salePriceValue)
    {
        $this->__load();
        return parent::setSalePriceValue($salePriceValue);
    }

    public function getSalePriceValue()
    {
        $this->__load();
        return parent::getSalePriceValue();
    }

    public function isNewProduct()
    {
        $this->__load();
        return parent::isNewProduct();
    }

    public function isUpcomingProduct()
    {
        $this->__load();
        return parent::isUpcomingProduct();
    }

    public function addViewsStats(\XLite\Module\CDev\ProductAdvisor\Model\ProductStats $viewsStats)
    {
        $this->__load();
        return parent::addViewsStats($viewsStats);
    }

    public function getViewsStats()
    {
        $this->__load();
        return parent::getViewsStats();
    }

    public function addPurchaseStats(\XLite\Module\CDev\ProductAdvisor\Model\ProductStats $purchaseStats)
    {
        $this->__load();
        return parent::addPurchaseStats($purchaseStats);
    }

    public function getPurchaseStats()
    {
        $this->__load();
        return parent::getPurchaseStats();
    }

    public function getOpenGraphMetaTags($preprocessed = true)
    {
        $this->__load();
        return parent::getOpenGraphMetaTags($preprocessed);
    }

    public function setOgMeta($ogMeta)
    {
        $this->__load();
        return parent::setOgMeta($ogMeta);
    }

    public function getOgMeta()
    {
        $this->__load();
        return parent::getOgMeta();
    }

    public function setUseCustomOG($useCustomOG)
    {
        $this->__load();
        return parent::setUseCustomOG($useCustomOG);
    }

    public function getUseCustomOG()
    {
        $this->__load();
        return parent::getUseCustomOG();
    }

    public function addFeaturedProducts(\XLite\Module\CDev\FeaturedProducts\Model\FeaturedProduct $featuredProducts)
    {
        $this->__load();
        return parent::addFeaturedProducts($featuredProducts);
    }

    public function getFeaturedProducts()
    {
        $this->__load();
        return parent::getFeaturedProducts();
    }

    public function getId()
    {
        $this->__load();
        return parent::getId();
    }

    public function getWeight()
    {
        $this->__load();
        return parent::getWeight();
    }

    public function getPrice()
    {
        $this->__load();
        return parent::getPrice();
    }

    public function getClearPrice()
    {
        $this->__load();
        return parent::getClearPrice();
    }

    public function getQuickDataPrice()
    {
        $this->__load();
        return parent::getQuickDataPrice();
    }

    public function getClearWeight()
    {
        $this->__load();
        return parent::getClearWeight();
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function getSku()
    {
        $this->__load();
        return parent::getSku();
    }

    public function getQty()
    {
        $this->__load();
        return parent::getQty();
    }

    public function getImage()
    {
        $this->__load();
        return parent::getImage();
    }

    public function getPublicImages()
    {
        $this->__load();
        return parent::getPublicImages();
    }

    public function getFreeShipping()
    {
        $this->__load();
        return parent::getFreeShipping();
    }

    public function getShippable()
    {
        $this->__load();
        return parent::getShippable();
    }

    public function setShippable($value)
    {
        $this->__load();
        return parent::setShippable($value);
    }

    public function isAvailable()
    {
        $this->__load();
        return parent::isAvailable();
    }

    public function isPublicAvailable()
    {
        $this->__load();
        return parent::isPublicAvailable();
    }

    public function isVisible()
    {
        $this->__load();
        return parent::isVisible();
    }

    public function getMembershipIds()
    {
        $this->__load();
        return parent::getMembershipIds();
    }

    public function hasAvailableMembership()
    {
        $this->__load();
        return parent::hasAvailableMembership();
    }

    public function availableInDate()
    {
        $this->__load();
        return parent::availableInDate();
    }

    public function hasImage()
    {
        $this->__load();
        return parent::hasImage();
    }

    public function getImageURL()
    {
        $this->__load();
        return parent::getImageURL();
    }

    public function getCategory($categoryId = NULL)
    {
        $this->__load();
        return parent::getCategory($categoryId);
    }

    public function getCategoryId($categoryId = NULL)
    {
        $this->__load();
        return parent::getCategoryId($categoryId);
    }

    public function getCategories()
    {
        $this->__load();
        return parent::getCategories();
    }

    public function setAmount($value)
    {
        $this->__load();
        return parent::setAmount($value);
    }

    public function getURL()
    {
        $this->__load();
        return parent::getURL();
    }

    public function getFrontURL()
    {
        $this->__load();
        return parent::getFrontURL();
    }

    public function getMinPurchaseLimit()
    {
        $this->__load();
        return parent::getMinPurchaseLimit();
    }

    public function getMaxPurchaseLimit()
    {
        $this->__load();
        return parent::getMaxPurchaseLimit();
    }

    public function getInventory()
    {
        $this->__load();
        return parent::getInventory();
    }

    public function getAvailableAmount()
    {
        $this->__load();
        return parent::getAvailableAmount();
    }

    public function isOutOfStock()
    {
        $this->__load();
        return parent::isOutOfStock();
    }

    public function getOrderBy($categoryId = NULL)
    {
        $this->__load();
        return parent::getOrderBy($categoryId);
    }

    public function countImages()
    {
        $this->__load();
        return parent::countImages();
    }

    public function getCommonDescription()
    {
        $this->__load();
        return parent::getCommonDescription();
    }

    public function getTaxableBasis()
    {
        $this->__load();
        return parent::getTaxableBasis();
    }

    public function prepareBeforeCreate()
    {
        $this->__load();
        return parent::prepareBeforeCreate();
    }

    public function prepareBeforeUpdate()
    {
        $this->__load();
        return parent::prepareBeforeUpdate();
    }

    public function prepareBeforeRemove()
    {
        $this->__load();
        return parent::prepareBeforeRemove();
    }

    public function setProductClass(\XLite\Model\ProductClass $productClass = NULL)
    {
        $this->__load();
        return parent::setProductClass($productClass);
    }

    public function getAttrValues()
    {
        $this->__load();
        return parent::getAttrValues();
    }

    public function setAttrValues($value)
    {
        $this->__load();
        return parent::setAttrValues($value);
    }

    public function getEditableAttributes()
    {
        $this->__load();
        return parent::getEditableAttributes();
    }

    public function getEditableAttributesIds()
    {
        $this->__load();
        return parent::getEditableAttributesIds();
    }

    public function hasEditableAttributes()
    {
        $this->__load();
        return parent::hasEditableAttributes();
    }

    public function getMultipleAttributes()
    {
        $this->__load();
        return parent::getMultipleAttributes();
    }

    public function getMultipleAttributesIds()
    {
        $this->__load();
        return parent::getMultipleAttributesIds();
    }

    public function hasMultipleAttributes()
    {
        $this->__load();
        return parent::hasMultipleAttributes();
    }

    public function updateQuickData()
    {
        $this->__load();
        return parent::updateQuickData();
    }

    public function prepareAttributeValues($ids = array (
))
    {
        $this->__load();
        return parent::prepareAttributeValues($ids);
    }

    public function generateCleanURL()
    {
        $this->__load();
        return parent::generateCleanURL();
    }

    public function getPosition($category)
    {
        $this->__load();
        return parent::getPosition($category);
    }

    public function setPosition($value)
    {
        $this->__load();
        return parent::setPosition($value);
    }

    public function getProductId()
    {
        $this->__load();
        return parent::getProductId();
    }

    public function setPrice($price)
    {
        $this->__load();
        return parent::setPrice($price);
    }

    public function setSku($sku)
    {
        $this->__load();
        return parent::setSku($sku);
    }

    public function setEnabled($enabled)
    {
        $this->__load();
        return parent::setEnabled($enabled);
    }

    public function getEnabled()
    {
        $this->__load();
        return parent::getEnabled();
    }

    public function setWeight($weight)
    {
        $this->__load();
        return parent::setWeight($weight);
    }

    public function setUseSeparateBox($useSeparateBox)
    {
        $this->__load();
        return parent::setUseSeparateBox($useSeparateBox);
    }

    public function getUseSeparateBox()
    {
        $this->__load();
        return parent::getUseSeparateBox();
    }

    public function setBoxWidth($boxWidth)
    {
        $this->__load();
        return parent::setBoxWidth($boxWidth);
    }

    public function getBoxWidth()
    {
        $this->__load();
        return parent::getBoxWidth();
    }

    public function setBoxLength($boxLength)
    {
        $this->__load();
        return parent::setBoxLength($boxLength);
    }

    public function getBoxLength()
    {
        $this->__load();
        return parent::getBoxLength();
    }

    public function setBoxHeight($boxHeight)
    {
        $this->__load();
        return parent::setBoxHeight($boxHeight);
    }

    public function getBoxHeight()
    {
        $this->__load();
        return parent::getBoxHeight();
    }

    public function setItemsPerBox($itemsPerBox)
    {
        $this->__load();
        return parent::setItemsPerBox($itemsPerBox);
    }

    public function getItemsPerBox()
    {
        $this->__load();
        return parent::getItemsPerBox();
    }

    public function setFreeShipping($freeShipping)
    {
        $this->__load();
        return parent::setFreeShipping($freeShipping);
    }

    public function setTaxable($taxable)
    {
        $this->__load();
        return parent::setTaxable($taxable);
    }

    public function getTaxable()
    {
        $this->__load();
        return parent::getTaxable();
    }

    public function setJavascript($javascript)
    {
        $this->__load();
        return parent::setJavascript($javascript);
    }

    public function getJavascript()
    {
        $this->__load();
        return parent::getJavascript();
    }

    public function setArrivalDate($arrivalDate)
    {
        $this->__load();
        return parent::setArrivalDate($arrivalDate);
    }

    public function getArrivalDate()
    {
        $this->__load();
        return parent::getArrivalDate();
    }

    public function setDate($date)
    {
        $this->__load();
        return parent::setDate($date);
    }

    public function getDate()
    {
        $this->__load();
        return parent::getDate();
    }

    public function setUpdateDate($updateDate)
    {
        $this->__load();
        return parent::setUpdateDate($updateDate);
    }

    public function getUpdateDate()
    {
        $this->__load();
        return parent::getUpdateDate();
    }

    public function setAttrSepTab($attrSepTab)
    {
        $this->__load();
        return parent::setAttrSepTab($attrSepTab);
    }

    public function getAttrSepTab()
    {
        $this->__load();
        return parent::getAttrSepTab();
    }

    public function setCleanURL($cleanURL)
    {
        $this->__load();
        return parent::setCleanURL($cleanURL);
    }

    public function getCleanURL()
    {
        $this->__load();
        return parent::getCleanURL();
    }

    public function addCategoryProducts(\XLite\Model\CategoryProducts $categoryProducts)
    {
        $this->__load();
        return parent::addCategoryProducts($categoryProducts);
    }

    public function getCategoryProducts()
    {
        $this->__load();
        return parent::getCategoryProducts();
    }

    public function addOrderItems(\XLite\Model\OrderItem $orderItems)
    {
        $this->__load();
        return parent::addOrderItems($orderItems);
    }

    public function getOrderItems()
    {
        $this->__load();
        return parent::getOrderItems();
    }

    public function addImages(\XLite\Model\Image\Product\Image $images)
    {
        $this->__load();
        return parent::addImages($images);
    }

    public function getImages()
    {
        $this->__load();
        return parent::getImages();
    }

    public function setInventory(\XLite\Model\Inventory $inventory = NULL)
    {
        $this->__load();
        return parent::setInventory($inventory);
    }

    public function getProductClass()
    {
        $this->__load();
        return parent::getProductClass();
    }

    public function setTaxClass(\XLite\Model\TaxClass $taxClass = NULL)
    {
        $this->__load();
        return parent::setTaxClass($taxClass);
    }

    public function getTaxClass()
    {
        $this->__load();
        return parent::getTaxClass();
    }

    public function addAttributes(\XLite\Model\Attribute $attributes)
    {
        $this->__load();
        return parent::addAttributes($attributes);
    }

    public function getAttributes()
    {
        $this->__load();
        return parent::getAttributes();
    }

    public function addAttributeValueC(\XLite\Model\AttributeValue\AttributeValueCheckbox $attributeValueC)
    {
        $this->__load();
        return parent::addAttributeValueC($attributeValueC);
    }

    public function getAttributeValueC()
    {
        $this->__load();
        return parent::getAttributeValueC();
    }

    public function addAttributeValueT(\XLite\Model\AttributeValue\AttributeValueText $attributeValueT)
    {
        $this->__load();
        return parent::addAttributeValueT($attributeValueT);
    }

    public function getAttributeValueT()
    {
        $this->__load();
        return parent::getAttributeValueT();
    }

    public function addAttributeValueS(\XLite\Model\AttributeValue\AttributeValueSelect $attributeValueS)
    {
        $this->__load();
        return parent::addAttributeValueS($attributeValueS);
    }

    public function getAttributeValueS()
    {
        $this->__load();
        return parent::getAttributeValueS();
    }

    public function addQuickData(\XLite\Model\QuickData $quickData)
    {
        $this->__load();
        return parent::addQuickData($quickData);
    }

    public function getQuickData()
    {
        $this->__load();
        return parent::getQuickData();
    }

    public function addMemberships(\XLite\Model\Membership $memberships)
    {
        $this->__load();
        return parent::addMemberships($memberships);
    }

    public function getMemberships()
    {
        $this->__load();
        return parent::getMemberships();
    }

    public function setName($value)
    {
        $this->__load();
        return parent::setName($value);
    }

    public function getDescription()
    {
        $this->__load();
        return parent::getDescription();
    }

    public function setDescription($value)
    {
        $this->__load();
        return parent::setDescription($value);
    }

    public function getBriefDescription()
    {
        $this->__load();
        return parent::getBriefDescription();
    }

    public function setBriefDescription($value)
    {
        $this->__load();
        return parent::setBriefDescription($value);
    }

    public function getMetaTags()
    {
        $this->__load();
        return parent::getMetaTags();
    }

    public function setMetaTags($value)
    {
        $this->__load();
        return parent::setMetaTags($value);
    }

    public function getMetaDesc()
    {
        $this->__load();
        return parent::getMetaDesc();
    }

    public function setMetaDesc($value)
    {
        $this->__load();
        return parent::setMetaDesc($value);
    }

    public function getMetaTitle()
    {
        $this->__load();
        return parent::getMetaTitle();
    }

    public function setMetaTitle($value)
    {
        $this->__load();
        return parent::setMetaTitle($value);
    }

    public function getNetPrice()
    {
        $this->__load();
        return parent::getNetPrice();
    }

    public function getDisplayPrice()
    {
        $this->__load();
        return parent::getDisplayPrice();
    }

    public function prepareBeforeSave()
    {
        $this->__load();
        return parent::prepareBeforeSave();
    }

    public function setEditLanguage($code)
    {
        $this->__load();
        return parent::setEditLanguage($code);
    }

    public function getTranslations()
    {
        $this->__load();
        return parent::getTranslations();
    }

    public function addTranslations(\XLite\Model\Base\Translation $translation)
    {
        $this->__load();
        return parent::addTranslations($translation);
    }

    public function getTranslation($code = NULL, $allowEmptyResult = false)
    {
        $this->__load();
        return parent::getTranslation($code, $allowEmptyResult);
    }

    public function getHardTranslation($code = NULL)
    {
        $this->__load();
        return parent::getHardTranslation($code);
    }

    public function getSoftTranslation($code = NULL)
    {
        $this->__load();
        return parent::getSoftTranslation($code);
    }

    public function hasTranslation($code = NULL)
    {
        $this->__load();
        return parent::hasTranslation($code);
    }

    public function getTranslationCodes()
    {
        $this->__load();
        return parent::getTranslationCodes();
    }

    public function detach()
    {
        $this->__load();
        return parent::detach();
    }

    public function map(array $data)
    {
        $this->__load();
        return parent::map($data);
    }

    public function __get($name)
    {
        $this->__load();
        return parent::__get($name);
    }

    public function __set($name, $value)
    {
        $this->__load();
        return parent::__set($name, $value);
    }

    public function __isset($name)
    {
        $this->__load();
        return parent::__isset($name);
    }

    public function __unset($name)
    {
        $this->__load();
        return parent::__unset($name);
    }

    public function getRepository()
    {
        $this->__load();
        return parent::getRepository();
    }

    public function checkCache()
    {
        $this->__load();
        return parent::checkCache();
    }

    public function __call($method, array $args = array (
))
    {
        $this->__load();
        return parent::__call($method, $args);
    }

    public function setterProperty($property, $value)
    {
        $this->__load();
        return parent::setterProperty($property, $value);
    }

    public function getterProperty($property)
    {
        $this->__load();
        return parent::getterProperty($property);
    }

    public function isPersistent()
    {
        $this->__load();
        return parent::isPersistent();
    }

    public function isDetached()
    {
        $this->__load();
        return parent::isDetached();
    }

    public function getUniqueIdentifierName()
    {
        $this->__load();
        return parent::getUniqueIdentifierName();
    }

    public function getUniqueIdentifier()
    {
        $this->__load();
        return parent::getUniqueIdentifier();
    }

    public function update()
    {
        $this->__load();
        return parent::update();
    }

    public function create()
    {
        $this->__load();
        return parent::create();
    }

    public function delete()
    {
        $this->__load();
        return parent::delete();
    }

    public function processFiles($field, array $data)
    {
        $this->__load();
        return parent::processFiles($field, $data);
    }

    public function prepareEntityBeforeCommit($type)
    {
        $this->__load();
        return parent::prepareEntityBeforeCommit($type);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'freeShip', 'participateSale', 'discountType', 'salePriceValue', 'ogMeta', 'useCustomOG', 'product_id', 'price', 'sku', 'enabled', 'weight', 'useSeparateBox', 'boxWidth', 'boxLength', 'boxHeight', 'itemsPerBox', 'free_shipping', 'taxable', 'javascript', 'arrivalDate', 'date', 'updateDate', 'attrSepTab', 'cleanURL', 'upsellingProducts', 'upsellingParentProducts', 'reviews', 'views_stats', 'purchase_stats', 'featuredProducts', 'categoryProducts', 'order_items', 'images', 'inventory', 'productClass', 'taxClass', 'attributes', 'attributeValueC', 'attributeValueT', 'attributeValueS', 'quickData', 'memberships', 'translations');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}