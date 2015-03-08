<?php

namespace XLite\Model\Proxy\__CG__\XLite\Model;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class AddressField extends \XLite\Model\AddressField implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getCSSFieldName()
    {
        $this->__load();
        return parent::getCSSFieldName();
    }

    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setServiceName($serviceName)
    {
        $this->__load();
        return parent::setServiceName($serviceName);
    }

    public function getServiceName()
    {
        $this->__load();
        return parent::getServiceName();
    }

    public function setViewGetterName($viewGetterName)
    {
        $this->__load();
        return parent::setViewGetterName($viewGetterName);
    }

    public function getViewGetterName()
    {
        $this->__load();
        return parent::getViewGetterName();
    }

    public function setSchemaClass($schemaClass)
    {
        $this->__load();
        return parent::setSchemaClass($schemaClass);
    }

    public function getSchemaClass()
    {
        $this->__load();
        return parent::getSchemaClass();
    }

    public function setAdditional($additional)
    {
        $this->__load();
        return parent::setAdditional($additional);
    }

    public function getAdditional()
    {
        $this->__load();
        return parent::getAdditional();
    }

    public function setRequired($required)
    {
        $this->__load();
        return parent::setRequired($required);
    }

    public function getRequired()
    {
        $this->__load();
        return parent::getRequired();
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

    public function setPosition($position)
    {
        $this->__load();
        return parent::setPosition($position);
    }

    public function getPosition()
    {
        $this->__load();
        return parent::getPosition();
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

    public function cloneEntity()
    {
        $this->__load();
        return parent::cloneEntity();
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
        return array('__isInitialized__', 'id', 'serviceName', 'viewGetterName', 'schemaClass', 'additional', 'required', 'enabled', 'position', 'translations');
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