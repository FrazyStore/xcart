<?php

namespace XLite\Model\Proxy\__CG__\XLite\Model;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class OrderHistoryEvents extends \XLite\Model\OrderHistoryEvents implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function prepareBeforeSave()
    {
        $this->__load();
        return parent::prepareBeforeSave();
    }

    public function getDescription()
    {
        $this->__load();
        return parent::getDescription();
    }

    public function setDetails(array $details)
    {
        $this->__load();
        return parent::setDetails($details);
    }

    public function getEventId()
    {
        $this->__load();
        return parent::getEventId();
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

    public function setDescription($description)
    {
        $this->__load();
        return parent::setDescription($description);
    }

    public function setData($data)
    {
        $this->__load();
        return parent::setData($data);
    }

    public function getData()
    {
        $this->__load();
        return parent::getData();
    }

    public function setComment($comment)
    {
        $this->__load();
        return parent::setComment($comment);
    }

    public function getComment()
    {
        $this->__load();
        return parent::getComment();
    }

    public function addDetails(\XLite\Model\OrderHistoryEventsData $details)
    {
        $this->__load();
        return parent::addDetails($details);
    }

    public function getDetails()
    {
        $this->__load();
        return parent::getDetails();
    }

    public function setOrder(\XLite\Model\Order $order = NULL)
    {
        $this->__load();
        return parent::setOrder($order);
    }

    public function getOrder()
    {
        $this->__load();
        return parent::getOrder();
    }

    public function setAuthor(\XLite\Model\Profile $author = NULL)
    {
        $this->__load();
        return parent::setAuthor($author);
    }

    public function getAuthor()
    {
        $this->__load();
        return parent::getAuthor();
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
        return array('__isInitialized__', 'event_id', 'date', 'code', 'description', 'data', 'comment', 'details', 'order', 'author');
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