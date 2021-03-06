<?php

namespace XLite\Model\Proxy\__CG__\XLite\Model;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Address extends \XLite\Model\Address implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getRequiredFieldsByType($atype)
    {
        $this->__load();
        return parent::getRequiredFieldsByType($atype);
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

    public function getFieldValue($name)
    {
        $this->__load();
        return parent::getFieldValue($name);
    }

    public function cloneEntity()
    {
        $this->__load();
        return parent::cloneEntity();
    }

    public function setIsBilling($isBilling)
    {
        $this->__load();
        return parent::setIsBilling($isBilling);
    }

    public function getIsBilling()
    {
        $this->__load();
        return parent::getIsBilling();
    }

    public function setIsShipping($isShipping)
    {
        $this->__load();
        return parent::setIsShipping($isShipping);
    }

    public function getIsShipping()
    {
        $this->__load();
        return parent::getIsShipping();
    }

    public function setIsWork($isWork)
    {
        $this->__load();
        return parent::setIsWork($isWork);
    }

    public function getIsWork()
    {
        $this->__load();
        return parent::getIsWork();
    }

    public function getAddressId()
    {
        $this->__load();
        return parent::getAddressId();
    }

    public function setAddressType($addressType)
    {
        $this->__load();
        return parent::setAddressType($addressType);
    }

    public function getAddressType()
    {
        $this->__load();
        return parent::getAddressType();
    }

    public function addAddressFields(\XLite\Model\AddressFieldValue $addressFields)
    {
        $this->__load();
        return parent::addAddressFields($addressFields);
    }

    public function getAddressFields()
    {
        $this->__load();
        return parent::getAddressFields();
    }

    public function setProfile(\XLite\Model\Profile $profile = NULL)
    {
        $this->__load();
        return parent::setProfile($profile);
    }

    public function getProfile()
    {
        $this->__load();
        return parent::getProfile();
    }

    public function setCountry(\XLite\Model\Country $country = NULL)
    {
        $this->__load();
        return parent::setCountry($country);
    }

    public function getCountry()
    {
        $this->__load();
        return parent::getCountry();
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function setName($value)
    {
        $this->__load();
        return parent::setName($value);
    }

    public function getAvailableAddressFields()
    {
        $this->__load();
        return parent::getAvailableAddressFields();
    }

    public function getState()
    {
        $this->__load();
        return parent::getState();
    }

    public function setCountryCode($countryCode)
    {
        $this->__load();
        return parent::setCountryCode($countryCode);
    }

    public function setStateId($stateId)
    {
        $this->__load();
        return parent::setStateId($stateId);
    }

    public function setState($state)
    {
        $this->__load();
        return parent::setState($state);
    }

    public function getStateId()
    {
        $this->__load();
        return parent::getStateId();
    }

    public function getCountryCode()
    {
        $this->__load();
        return parent::getCountryCode();
    }

    public function getCountryName()
    {
        $this->__load();
        return parent::getCountryName();
    }

    public function getStateName()
    {
        $this->__load();
        return parent::getStateName();
    }

    public function getTypeName()
    {
        $this->__load();
        return parent::getTypeName();
    }

    public function getRequiredEmptyFields($atype)
    {
        $this->__load();
        return parent::getRequiredEmptyFields($atype);
    }

    public function isCompleted($atype)
    {
        $this->__load();
        return parent::isCompleted($atype);
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

    public function isEqualAddress(\XLite\Model\Base\Address $address)
    {
        $this->__load();
        return parent::isEqualAddress($address);
    }

    public function getFieldsHash()
    {
        $this->__load();
        return parent::getFieldsHash();
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
        return array('__isInitialized__', 'is_billing', 'is_shipping', 'isWork', 'address_id', 'address_type', 'addressFields', 'profile', 'state', 'country');
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