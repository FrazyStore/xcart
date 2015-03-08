<?php

namespace XLite\Model\Proxy\__CG__\XLite\Module\XC\CanadaPost\Model;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class DeliveryService extends \XLite\Module\XC\CanadaPost\Model\DeliveryService implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function addOption(\XLite\Module\XC\CanadaPost\Model\DeliveryService\Option $newOption)
    {
        $this->__load();
        return parent::addOption($newOption);
    }

    public function isExpired()
    {
        $this->__load();
        return parent::isExpired();
    }

    public function updateExpiry()
    {
        $this->__load();
        return parent::updateExpiry();
    }

    public function prepareBeforeSave()
    {
        $this->__load();
        return parent::prepareBeforeSave();
    }

    public function getId()
    {
        $this->__load();
        return parent::getId();
    }

    public function setCode($code)
    {
        $this->__load();
        return parent::setCode($code);
    }

    public function getCode()
    {
        $this->__load();
        return parent::getCode();
    }

    public function setCountryCode($countryCode)
    {
        $this->__load();
        return parent::setCountryCode($countryCode);
    }

    public function getCountryCode()
    {
        $this->__load();
        return parent::getCountryCode();
    }

    public function setName($name)
    {
        $this->__load();
        return parent::setName($name);
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function setExpiry($expiry)
    {
        $this->__load();
        return parent::setExpiry($expiry);
    }

    public function getExpiry()
    {
        $this->__load();
        return parent::getExpiry();
    }

    public function setMaxWeight($maxWeight)
    {
        $this->__load();
        return parent::setMaxWeight($maxWeight);
    }

    public function getMaxWeight()
    {
        $this->__load();
        return parent::getMaxWeight();
    }

    public function setMinWeight($minWeight)
    {
        $this->__load();
        return parent::setMinWeight($minWeight);
    }

    public function getMinWeight()
    {
        $this->__load();
        return parent::getMinWeight();
    }

    public function setMaxLength($maxLength)
    {
        $this->__load();
        return parent::setMaxLength($maxLength);
    }

    public function getMaxLength()
    {
        $this->__load();
        return parent::getMaxLength();
    }

    public function setMinLength($minLength)
    {
        $this->__load();
        return parent::setMinLength($minLength);
    }

    public function getMinLength()
    {
        $this->__load();
        return parent::getMinLength();
    }

    public function setMaxWidth($maxWidth)
    {
        $this->__load();
        return parent::setMaxWidth($maxWidth);
    }

    public function getMaxWidth()
    {
        $this->__load();
        return parent::getMaxWidth();
    }

    public function setMinWidth($minWidth)
    {
        $this->__load();
        return parent::setMinWidth($minWidth);
    }

    public function getMinWidth()
    {
        $this->__load();
        return parent::getMinWidth();
    }

    public function setMaxHeight($maxHeight)
    {
        $this->__load();
        return parent::setMaxHeight($maxHeight);
    }

    public function getMaxHeight()
    {
        $this->__load();
        return parent::getMaxHeight();
    }

    public function setMinHeight($minHeight)
    {
        $this->__load();
        return parent::setMinHeight($minHeight);
    }

    public function getMinHeight()
    {
        $this->__load();
        return parent::getMinHeight();
    }

    public function setLengthPlusGirthMax($lengthPlusGirthMax)
    {
        $this->__load();
        return parent::setLengthPlusGirthMax($lengthPlusGirthMax);
    }

    public function getLengthPlusGirthMax()
    {
        $this->__load();
        return parent::getLengthPlusGirthMax();
    }

    public function setLengthHeightWidthSumMax($lengthHeightWidthSumMax)
    {
        $this->__load();
        return parent::setLengthHeightWidthSumMax($lengthHeightWidthSumMax);
    }

    public function getLengthHeightWidthSumMax()
    {
        $this->__load();
        return parent::getLengthHeightWidthSumMax();
    }

    public function setOversizeLimit($oversizeLimit)
    {
        $this->__load();
        return parent::setOversizeLimit($oversizeLimit);
    }

    public function getOversizeLimit()
    {
        $this->__load();
        return parent::getOversizeLimit();
    }

    public function setDensityFactor($densityFactor)
    {
        $this->__load();
        return parent::setDensityFactor($densityFactor);
    }

    public function getDensityFactor()
    {
        $this->__load();
        return parent::getDensityFactor();
    }

    public function setCanShipInMailingTube($canShipInMailingTube)
    {
        $this->__load();
        return parent::setCanShipInMailingTube($canShipInMailingTube);
    }

    public function getCanShipInMailingTube()
    {
        $this->__load();
        return parent::getCanShipInMailingTube();
    }

    public function setCanShipUnpackaged($canShipUnpackaged)
    {
        $this->__load();
        return parent::setCanShipUnpackaged($canShipUnpackaged);
    }

    public function getCanShipUnpackaged()
    {
        $this->__load();
        return parent::getCanShipUnpackaged();
    }

    public function setAllowedAsReturnService($allowedAsReturnService)
    {
        $this->__load();
        return parent::setAllowedAsReturnService($allowedAsReturnService);
    }

    public function getAllowedAsReturnService()
    {
        $this->__load();
        return parent::getAllowedAsReturnService();
    }

    public function addOptions(\XLite\Module\XC\CanadaPost\Model\DeliveryService\Option $options)
    {
        $this->__load();
        return parent::addOptions($options);
    }

    public function getOptions()
    {
        $this->__load();
        return parent::getOptions();
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

    public function cloneEntity()
    {
        $this->__load();
        return parent::cloneEntity();
    }

    public function prepareEntityBeforeCommit($type)
    {
        $this->__load();
        return parent::prepareEntityBeforeCommit($type);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'code', 'countryCode', 'name', 'expiry', 'maxWeight', 'minWeight', 'maxLength', 'minLength', 'maxWidth', 'minWidth', 'maxHeight', 'minHeight', 'lengthPlusGirthMax', 'lengthHeightWidthSumMax', 'oversizeLimit', 'densityFactor', 'canShipInMailingTube', 'canShipUnpackaged', 'allowedAsReturnService', 'options');
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