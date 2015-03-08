<?php

namespace XLite\Model\Proxy\__CG__\XLite\Model;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class OrderItem extends \XLite\Model\OrderItem implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function addCapostParcelItem(\XLite\Module\XC\CanadaPost\Model\Order\Parcel\Item $newItem)
    {
        $this->__load();
        return parent::addCapostParcelItem($newItem);
    }

    public function addCapostReturnItem(\XLite\Module\XC\CanadaPost\Model\ProductsReturn\Item $newItem)
    {
        $this->__load();
        return parent::addCapostReturnItem($newItem);
    }

    public function addCapostParcelItems(\XLite\Module\XC\CanadaPost\Model\Order\Parcel\Item $capostParcelItems)
    {
        $this->__load();
        return parent::addCapostParcelItems($capostParcelItems);
    }

    public function getCapostParcelItems()
    {
        $this->__load();
        return parent::getCapostParcelItems();
    }

    public function addCapostReturnItems(\XLite\Module\XC\CanadaPost\Model\ProductsReturn\Item $capostReturnItems)
    {
        $this->__load();
        return parent::addCapostReturnItems($capostReturnItems);
    }

    public function getCapostReturnItems()
    {
        $this->__load();
        return parent::getCapostReturnItems();
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function setOrder(\XLite\Model\Order $order = NULL)
    {
        $this->__load();
        return parent::setOrder($order);
    }

    public function cloneEntity()
    {
        $this->__load();
        return parent::cloneEntity();
    }

    public function getClearPrice()
    {
        $this->__load();
        return parent::getClearPrice();
    }

    public function getItemPrice()
    {
        $this->__load();
        return parent::getItemPrice();
    }

    public function getItemNetPrice()
    {
        $this->__load();
        return parent::getItemNetPrice();
    }

    public function isOrderOpen()
    {
        $this->__load();
        return parent::isOrderOpen();
    }

    public function getThroughExcludeSurcharges()
    {
        $this->__load();
        return parent::getThroughExcludeSurcharges();
    }

    public function getProduct()
    {
        $this->__load();
        return parent::getProduct();
    }

    public function setProduct(\XLite\Model\Product $product = NULL)
    {
        $this->__load();
        return parent::setProduct($product);
    }

    public function setObject(\XLite\Model\Base\IOrderItem $item = NULL)
    {
        $this->__load();
        return parent::setObject($item);
    }

    public function getAmountWarning($amount)
    {
        $this->__load();
        return parent::getAmountWarning($amount);
    }

    public function setAmount($amount)
    {
        $this->__load();
        return parent::setAmount($amount);
    }

    public function getWeight()
    {
        $this->__load();
        return parent::getWeight();
    }

    public function getClearWeight()
    {
        $this->__load();
        return parent::getClearWeight();
    }

    public function hasImage()
    {
        $this->__load();
        return parent::hasImage();
    }

    public function hasWrongAmount()
    {
        $this->__load();
        return parent::hasWrongAmount();
    }

    public function getImageURL()
    {
        $this->__load();
        return parent::getImageURL();
    }

    public function getImage()
    {
        $this->__load();
        return parent::getImage();
    }

    public function getDescription()
    {
        $this->__load();
        return parent::getDescription();
    }

    public function getExtendedDescription()
    {
        $this->__load();
        return parent::getExtendedDescription();
    }

    public function getProductAvailableAmount()
    {
        $this->__load();
        return parent::getProductAvailableAmount();
    }

    public function getURL()
    {
        $this->__load();
        return parent::getURL();
    }

    public function isShippable()
    {
        $this->__load();
        return parent::isShippable();
    }

    public function getKey()
    {
        $this->__load();
        return parent::getKey();
    }

    public function getAttributeValuesIds()
    {
        $this->__load();
        return parent::getAttributeValuesIds();
    }

    public function getAttributeValuesPlain()
    {
        $this->__load();
        return parent::getAttributeValuesPlain();
    }

    public function getAttributeValuesAsString()
    {
        $this->__load();
        return parent::getAttributeValuesAsString();
    }

    public function getAttributeValuesCount()
    {
        $this->__load();
        return parent::getAttributeValuesCount();
    }

    public function getSortedAttributeValues()
    {
        $this->__load();
        return parent::getSortedAttributeValues();
    }

    public function isValid()
    {
        $this->__load();
        return parent::isValid();
    }

    public function isConfigured()
    {
        $this->__load();
        return parent::isConfigured();
    }

    public function canChangeAmount()
    {
        $this->__load();
        return parent::canChangeAmount();
    }

    public function isValidAmount()
    {
        $this->__load();
        return parent::isValidAmount();
    }

    public function isValidToClone()
    {
        $this->__load();
        return parent::isValidToClone();
    }

    public function isActualAttributes()
    {
        $this->__load();
        return parent::isActualAttributes();
    }

    public function setPrice($price)
    {
        $this->__load();
        return parent::setPrice($price);
    }

    public function setAttributeValues(array $attributeValues)
    {
        $this->__load();
        return parent::setAttributeValues($attributeValues);
    }

    public function hasAttributeValues()
    {
        $this->__load();
        return parent::hasAttributeValues();
    }

    public function calculate()
    {
        $this->__load();
        return parent::calculate();
    }

    public function renew()
    {
        $this->__load();
        return parent::renew();
    }

    public function getTaxable()
    {
        $this->__load();
        return parent::getTaxable();
    }

    public function getTaxableBasis()
    {
        $this->__load();
        return parent::getTaxableBasis();
    }

    public function getProductClass()
    {
        $this->__load();
        return parent::getProductClass();
    }

    public function getEventCell()
    {
        $this->__load();
        return parent::getEventCell();
    }

    public function isDeleted()
    {
        $this->__load();
        return parent::isDeleted();
    }

    public function calculateTotal()
    {
        $this->__load();
        return parent::calculateTotal();
    }

    public function calculateNetSubtotal()
    {
        $this->__load();
        return parent::calculateNetSubtotal();
    }

    public function getNetSubtotal()
    {
        $this->__load();
        return parent::getNetSubtotal();
    }

    public function changeAmount($delta)
    {
        $this->__load();
        return parent::changeAmount($delta);
    }

    public function isPriceControlledServer()
    {
        $this->__load();
        return parent::isPriceControlledServer();
    }

    public function getItemId()
    {
        $this->__load();
        return parent::getItemId();
    }

    public function setName($name)
    {
        $this->__load();
        return parent::setName($name);
    }

    public function setSku($sku)
    {
        $this->__load();
        return parent::setSku($sku);
    }

    public function getSku()
    {
        $this->__load();
        return parent::getSku();
    }

    public function getPrice()
    {
        $this->__load();
        return parent::getPrice();
    }

    public function setItemNetPrice($itemNetPrice)
    {
        $this->__load();
        return parent::setItemNetPrice($itemNetPrice);
    }

    public function setDiscountedSubtotal($discountedSubtotal)
    {
        $this->__load();
        return parent::setDiscountedSubtotal($discountedSubtotal);
    }

    public function getDiscountedSubtotal()
    {
        $this->__load();
        return parent::getDiscountedSubtotal();
    }

    public function getAmount()
    {
        $this->__load();
        return parent::getAmount();
    }

    public function getTotal()
    {
        $this->__load();
        return parent::getTotal();
    }

    public function getSubtotal()
    {
        $this->__load();
        return parent::getSubtotal();
    }

    public function getObject()
    {
        $this->__load();
        return parent::getObject();
    }

    public function getOrder()
    {
        $this->__load();
        return parent::getOrder();
    }

    public function addSurcharges(\XLite\Model\OrderItem\Surcharge $surcharges)
    {
        $this->__load();
        return parent::addSurcharges($surcharges);
    }

    public function getSurcharges()
    {
        $this->__load();
        return parent::getSurcharges();
    }

    public function addAttributeValues(\XLite\Model\OrderItem\AttributeValue $attributeValues)
    {
        $this->__load();
        return parent::addAttributeValues($attributeValues);
    }

    public function getAttributeValues()
    {
        $this->__load();
        return parent::getAttributeValues();
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

    public function setTotal($total)
    {
        $this->__load();
        return parent::setTotal($total);
    }

    public function setSubtotal($subtotal)
    {
        $this->__load();
        return parent::setSubtotal($subtotal);
    }

    public function getExcludeSurcharges()
    {
        $this->__load();
        return parent::getExcludeSurcharges();
    }

    public function getIncludeSurcharges()
    {
        $this->__load();
        return parent::getIncludeSurcharges();
    }

    public function getExcludeSurchargesByType($type)
    {
        $this->__load();
        return parent::getExcludeSurchargesByType($type);
    }

    public function getSurchargeTotals()
    {
        $this->__load();
        return parent::getSurchargeTotals();
    }

    public function getSurchargeSum()
    {
        $this->__load();
        return parent::getSurchargeSum();
    }

    public function getSurchargeSumByType($type)
    {
        $this->__load();
        return parent::getSurchargeSumByType($type);
    }

    public function getSurchargeTotalByType($type)
    {
        $this->__load();
        return parent::getSurchargeTotalByType($type);
    }

    public function resetSurcharges()
    {
        $this->__load();
        return parent::resetSurcharges();
    }

    public function compareSurcharges(array $oldSurcharges)
    {
        $this->__load();
        return parent::compareSurcharges($oldSurcharges);
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

    public function detach()
    {
        $this->__load();
        return parent::detach();
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
        return array('__isInitialized__', 'item_id', 'name', 'sku', 'price', 'itemNetPrice', 'discountedSubtotal', 'amount', 'total', 'subtotal', 'capostParcelItems', 'capostReturnItems', 'object', 'order', 'surcharges', 'attributeValues');
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