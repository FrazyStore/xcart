<?php

namespace XLite\Model\Proxy\__CG__\XLite\Model;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Cart extends \XLite\Model\Cart implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function checkCart()
    {
        $this->__load();
        return parent::checkCart();
    }

    public function isIgnoreLongCalculations()
    {
        $this->__load();
        return parent::isIgnoreLongCalculations();
    }

    public function setIgnoreLongCalculations()
    {
        $this->__load();
        return parent::setIgnoreLongCalculations();
    }

    public function calculate()
    {
        $this->__load();
        return parent::calculate();
    }

    public function assignOrderNumber()
    {
        $this->__load();
        return parent::assignOrderNumber();
    }

    public function calculateInitial()
    {
        $this->__load();
        return parent::calculateInitial();
    }

    public function prepareBeforeSave()
    {
        $this->__load();
        return parent::prepareBeforeSave();
    }

    public function prepareBeforeCreate()
    {
        $this->__load();
        return parent::prepareBeforeCreate();
    }

    public function clear()
    {
        $this->__load();
        return parent::clear();
    }

    public function isProductAdded($productId)
    {
        $this->__load();
        return parent::isProductAdded($productId);
    }

    public function prepareBeforeRemove()
    {
        $this->__load();
        return parent::prepareBeforeRemove();
    }

    public function markAsOrder()
    {
        $this->__load();
        return parent::markAsOrder();
    }

    public function hasCartStatus()
    {
        $this->__load();
        return parent::hasCartStatus();
    }

    public function login(\XLite\Model\Profile $profile)
    {
        $this->__load();
        return parent::login($profile);
    }

    public function logoff()
    {
        $this->__load();
        return parent::logoff();
    }

    public function mergeWithProfile(\XLite\Model\Profile $profile)
    {
        $this->__load();
        return parent::mergeWithProfile($profile);
    }

    public function merge(\XLite\Model\Cart $cart)
    {
        $this->__load();
        return parent::merge($cart);
    }

    public function addCapostParcel(\XLite\Module\XC\CanadaPost\Model\Order\Parcel $newParcel)
    {
        $this->__load();
        return parent::addCapostParcel($newParcel);
    }

    public function addCapostReturn(\XLite\Module\XC\CanadaPost\Model\ProductsReturn $return)
    {
        $this->__load();
        return parent::addCapostReturn($return);
    }

    public function setCapostOffice(\XLite\Module\XC\CanadaPost\Model\Order\PostOffice $office = NULL)
    {
        $this->__load();
        return parent::setCapostOffice($office);
    }

    public function removeAllCapostParcels()
    {
        $this->__load();
        return parent::removeAllCapostParcels();
    }

    public function createCapostParcels($replace = false)
    {
        $this->__load();
        return parent::createCapostParcels($replace);
    }

    public function getItemById($id)
    {
        $this->__load();
        return parent::getItemById($id);
    }

    public function getCapostShippingMethodCode()
    {
        $this->__load();
        return parent::getCapostShippingMethodCode();
    }

    public function isCapostShippingMethod()
    {
        $this->__load();
        return parent::isCapostShippingMethod();
    }

    public function countCapostParcels()
    {
        $this->__load();
        return parent::countCapostParcels();
    }

    public function hasCapostParcels()
    {
        $this->__load();
        return parent::hasCapostParcels();
    }

    public function getCapostTrackingPins()
    {
        $this->__load();
        return parent::getCapostTrackingPins();
    }

    public function getCapostDeliveryService()
    {
        $this->__load();
        return parent::getCapostDeliveryService();
    }

    public function updateOrder()
    {
        $this->__load();
        return parent::updateOrder();
    }

    public function renewCapostOffice()
    {
        $this->__load();
        return parent::renewCapostOffice();
    }

    public function isCapostOfficeApplicable(\XLite\Module\XC\CanadaPost\Model\Order\PostOffice $office)
    {
        $this->__load();
        return parent::isCapostOfficeApplicable($office);
    }

    public function getSelectedShippingRate()
    {
        $this->__load();
        return parent::getSelectedShippingRate();
    }

    public function getNearestCapostOffices()
    {
        $this->__load();
        return parent::getNearestCapostOffices();
    }

    public function isCapostOfficeAvailable($officeId)
    {
        $this->__load();
        return parent::isCapostOfficeAvailable($officeId);
    }

    public function isSelectedMethodSupportDeliveryToPO()
    {
        $this->__load();
        return parent::isSelectedMethodSupportDeliveryToPO();
    }

    public function addCapostParcels(\XLite\Module\XC\CanadaPost\Model\Order\Parcel $capostParcels)
    {
        $this->__load();
        return parent::addCapostParcels($capostParcels);
    }

    public function getCapostParcels()
    {
        $this->__load();
        return parent::getCapostParcels();
    }

    public function addCapostReturns(\XLite\Module\XC\CanadaPost\Model\ProductsReturn $capostReturns)
    {
        $this->__load();
        return parent::addCapostReturns($capostReturns);
    }

    public function getCapostReturns()
    {
        $this->__load();
        return parent::getCapostReturns();
    }

    public function getCapostOffice()
    {
        $this->__load();
        return parent::getCapostOffice();
    }

    public function getCCData()
    {
        $this->__load();
        return parent::getCCData();
    }

    public function setPaymentStatusByTransaction(\XLite\Model\Payment\Transaction $transaction)
    {
        $this->__load();
        return parent::setPaymentStatusByTransaction($transaction);
    }

    public function getPaymentTransactionSums()
    {
        $this->__load();
        return parent::getPaymentTransactionSums();
    }

    public function getAomTotalDifference()
    {
        $this->__load();
        return parent::getAomTotalDifference();
    }

    public function isAomTotalDifferencePositive()
    {
        $this->__load();
        return parent::isAomTotalDifferencePositive();
    }

    public function isAllowRecharge()
    {
        $this->__load();
        return parent::isAllowRecharge();
    }

    public function getFraudInfoKountAnchor()
    {
        $this->__load();
        return parent::getFraudInfoKountAnchor();
    }

    public function setFraudStatusKount($fraudStatusKount)
    {
        $this->__load();
        return parent::setFraudStatusKount($fraudStatusKount);
    }

    public function getFraudStatusKount()
    {
        $this->__load();
        return parent::getFraudStatusKount();
    }

    public function getPaymentMethods()
    {
        $this->__load();
        return parent::getPaymentMethods();
    }

    public function isExpressCheckout($method)
    {
        $this->__load();
        return parent::isExpressCheckout($method);
    }

    public function isPaypalCredit($method)
    {
        $this->__load();
        return parent::isPaypalCredit($method);
    }

    public function getTransactionIds()
    {
        $this->__load();
        return parent::getTransactionIds();
    }

    public function cloneEntity()
    {
        $this->__load();
        return parent::cloneEntity();
    }

    public function processSucceed()
    {
        $this->__load();
        return parent::processSucceed();
    }

    public function addUsedCoupons(\XLite\Module\CDev\Coupons\Model\UsedCoupon $usedCoupons)
    {
        $this->__load();
        return parent::addUsedCoupons($usedCoupons);
    }

    public function getUsedCoupons()
    {
        $this->__load();
        return parent::getUsedCoupons();
    }

    public function addItem(\XLite\Model\OrderItem $newItem)
    {
        $this->__load();
        return parent::addItem($newItem);
    }

    public function getAddItemError()
    {
        $this->__load();
        return parent::getAddItemError();
    }

    public function getItemByItem(\XLite\Model\OrderItem $item)
    {
        $this->__load();
        return parent::getItemByItem($item);
    }

    public function getItemByItemKey($key)
    {
        $this->__load();
        return parent::getItemByItemKey($key);
    }

    public function getItemByItemId($itemId)
    {
        $this->__load();
        return parent::getItemByItemId($itemId);
    }

    public function getItemsByProductId($productId)
    {
        $this->__load();
        return parent::getItemsByProductId($productId);
    }

    public function normalizeItems()
    {
        $this->__load();
        return parent::normalizeItems();
    }

    public function countItems()
    {
        $this->__load();
        return parent::countItems();
    }

    public function countQuantity()
    {
        $this->__load();
        return parent::countQuantity();
    }

    public function getFailureReason()
    {
        $this->__load();
        return parent::getFailureReason();
    }

    public function isEmpty()
    {
        $this->__load();
        return parent::isEmpty();
    }

    public function isMinOrderAmountError()
    {
        $this->__load();
        return parent::isMinOrderAmountError();
    }

    public function isMaxOrderAmountError()
    {
        $this->__load();
        return parent::isMaxOrderAmountError();
    }

    public function isProcessed()
    {
        $this->__load();
        return parent::isProcessed();
    }

    public function isQueued()
    {
        $this->__load();
        return parent::isQueued();
    }

    public function getItemsWithWrongAmounts()
    {
        $this->__load();
        return parent::getItemsWithWrongAmounts();
    }

    public function setProfile(\XLite\Model\Profile $profile = NULL)
    {
        $this->__load();
        return parent::setProfile($profile);
    }

    public function setOrigProfile(\XLite\Model\Profile $profile = NULL)
    {
        $this->__load();
        return parent::setOrigProfile($profile);
    }

    public function setProfileCopy(\XLite\Model\Profile $profile)
    {
        $this->__load();
        return parent::setProfileCopy($profile);
    }

    public function getShippingMethodName()
    {
        $this->__load();
        return parent::getShippingMethodName();
    }

    public function getPaymentMethodName()
    {
        $this->__load();
        return parent::getPaymentMethodName();
    }

    public function setOldPaymentStatus($paymentStatus)
    {
        $this->__load();
        return parent::setOldPaymentStatus($paymentStatus);
    }

    public function setOldShippingStatus($shippingStatus)
    {
        $this->__load();
        return parent::setOldShippingStatus($shippingStatus);
    }

    public function getItemsFingerprint()
    {
        $this->__load();
        return parent::getItemsFingerprint();
    }

    public function getDescription()
    {
        $this->__load();
        return parent::getDescription();
    }

    public function getEventFingerprint(array $exclude = array (
))
    {
        $this->__load();
        return parent::getEventFingerprint($exclude);
    }

    public function getDetail($name)
    {
        $this->__load();
        return parent::getDetail($name);
    }

    public function setDetail($name, $value, $label = NULL)
    {
        $this->__load();
        return parent::setDetail($name, $value, $label);
    }

    public function getMeaningDetails()
    {
        $this->__load();
        return parent::getMeaningDetails();
    }

    public function markAsCart()
    {
        $this->__load();
        return parent::markAsCart();
    }

    public function refreshItems()
    {
        $this->__load();
        return parent::refreshItems();
    }

    public function isRemoving()
    {
        $this->__load();
        return parent::isRemoving();
    }

    public function renewPaymentMethod()
    {
        $this->__load();
        return parent::renewPaymentMethod();
    }

    public function getPaymentMethod()
    {
        $this->__load();
        return parent::getPaymentMethod();
    }

    public function checkItemKeyEqual(\XLite\Model\OrderItem $item, $key)
    {
        $this->__load();
        return parent::checkItemKeyEqual($item, $key);
    }

    public function checkItemIdEqual(\XLite\Model\OrderItem $item, $itemId)
    {
        $this->__load();
        return parent::checkItemIdEqual($item, $itemId);
    }

    public function checkDetailName(\XLite\Model\OrderDetail $detail, $name)
    {
        $this->__load();
        return parent::checkDetailName($detail, $name);
    }

    public function checkPaymentTransactionStatusEqual(\XLite\Model\Payment\Transaction $transaction, $status)
    {
        $this->__load();
        return parent::checkPaymentTransactionStatusEqual($transaction, $status);
    }

    public function checkPaymentTransactionOpen(\XLite\Model\Payment\Transaction $transaction)
    {
        $this->__load();
        return parent::checkPaymentTransactionOpen($transaction);
    }

    public function isItemProductIdEqual(\XLite\Model\OrderItem $item, $productId)
    {
        $this->__load();
        return parent::isItemProductIdEqual($item, $productId);
    }

    public function checkLastPaymentMethod(\XLite\Model\Payment\Method $pmethod, $lastPaymentId)
    {
        $this->__load();
        return parent::checkLastPaymentMethod($pmethod, $lastPaymentId);
    }

    public function setPaymentMethod($paymentMethod, $value = NULL)
    {
        $this->__load();
        return parent::setPaymentMethod($paymentMethod, $value);
    }

    public function unsetPaymentMethod()
    {
        $this->__load();
        return parent::unsetPaymentMethod();
    }

    public function getActivePaymentTransactions()
    {
        $this->__load();
        return parent::getActivePaymentTransactions();
    }

    public function getVisiblePaymentMethods()
    {
        $this->__load();
        return parent::getVisiblePaymentMethods();
    }

    public function getFirstOpenPaymentTransaction()
    {
        $this->__load();
        return parent::getFirstOpenPaymentTransaction();
    }

    public function getOpenTotal()
    {
        $this->__load();
        return parent::getOpenTotal();
    }

    public function isOpen()
    {
        $this->__load();
        return parent::isOpen();
    }

    public function hasUnpaidTotal()
    {
        $this->__load();
        return parent::hasUnpaidTotal();
    }

    public function getPayedTotal()
    {
        $this->__load();
        return parent::getPayedTotal();
    }

    public function isPayed()
    {
        $this->__load();
        return parent::isPayed();
    }

    public function hasInprogressPayments()
    {
        $this->__load();
        return parent::hasInprogressPayments();
    }

    public function renewShippingMethod()
    {
        $this->__load();
        return parent::renewShippingMethod();
    }

    public function getShippingProcessor()
    {
        $this->__load();
        return parent::getShippingProcessor();
    }

    public function isTrackingInformationForm($trackingNumber)
    {
        $this->__load();
        return parent::isTrackingInformationForm($trackingNumber);
    }

    public function getTrackingInformationURL($trackingNumber)
    {
        $this->__load();
        return parent::getTrackingInformationURL($trackingNumber);
    }

    public function getTrackingInformationParams($trackingNumber)
    {
        $this->__load();
        return parent::getTrackingInformationParams($trackingNumber);
    }

    public function getTrackingInformationMethod($trackingNumber)
    {
        $this->__load();
        return parent::getTrackingInformationMethod($trackingNumber);
    }

    public function setIsNotificationSent($value)
    {
        $this->__load();
        return parent::setIsNotificationSent($value);
    }

    public function setIsNotificationsAllowedFlag($value)
    {
        $this->__load();
        return parent::setIsNotificationsAllowedFlag($value);
    }

    public function setIgnoreCustomerNotifications($value)
    {
        $this->__load();
        return parent::setIgnoreCustomerNotifications($value);
    }

    public function getModifiers()
    {
        $this->__load();
        return parent::getModifiers();
    }

    public function getModifier($type, $code)
    {
        $this->__load();
        return parent::getModifier($type, $code);
    }

    public function isModifierByType($type)
    {
        $this->__load();
        return parent::isModifierByType($type);
    }

    public function getModifiersByType($type)
    {
        $this->__load();
        return parent::getModifiersByType($type);
    }

    public function getItemsExcludeSurcharges()
    {
        $this->__load();
        return parent::getItemsExcludeSurcharges();
    }

    public function getItemsIncludeSurchargesTotals()
    {
        $this->__load();
        return parent::getItemsIncludeSurchargesTotals();
    }

    public function recalculate()
    {
        $this->__load();
        return parent::recalculate();
    }

    public function renew()
    {
        $this->__load();
        return parent::renew();
    }

    public function renewSoft()
    {
        $this->__load();
        return parent::renewSoft();
    }

    public function resetSurcharges()
    {
        $this->__load();
        return parent::resetSurcharges();
    }

    public function calculateInitialValues()
    {
        $this->__load();
        return parent::calculateInitialValues();
    }

    public function getSurchargesByType($type)
    {
        $this->__load();
        return parent::getSurchargesByType($type);
    }

    public function getSurchargesSubtotal($type = NULL, $include = NULL)
    {
        $this->__load();
        return parent::getSurchargesSubtotal($type, $include);
    }

    public function getSurchargesTotal($type = NULL)
    {
        $this->__load();
        return parent::getSurchargesTotal($type);
    }

    public function prepareEntityBeforeCommit($type)
    {
        $this->__load();
        return parent::prepareEntityBeforeCommit($type);
    }

    public function getPaymentStatusCode()
    {
        $this->__load();
        return parent::getPaymentStatusCode();
    }

    public function getShippingStatusCode()
    {
        $this->__load();
        return parent::getShippingStatusCode();
    }

    public function setPaymentStatus($paymentStatus = NULL)
    {
        $this->__load();
        return parent::setPaymentStatus($paymentStatus);
    }

    public function setShippingStatus($shippingStatus = NULL)
    {
        $this->__load();
        return parent::setShippingStatus($shippingStatus);
    }

    public function processStatus($status, $type)
    {
        $this->__load();
        return parent::processStatus($status, $type);
    }

    public function checkStatuses()
    {
        $this->__load();
        return parent::checkStatuses();
    }

    public function checkInventory()
    {
        $this->__load();
        return parent::checkInventory();
    }

    public function transformItemsAttributes()
    {
        $this->__load();
        return parent::transformItemsAttributes();
    }

    public function getAllowedActions()
    {
        $this->__load();
        return parent::getAllowedActions();
    }

    public function getAllowedPaymentActions()
    {
        $this->__load();
        return parent::getAllowedPaymentActions();
    }

    public function getRawPaymentTransactionSums($override = false)
    {
        $this->__load();
        return parent::getRawPaymentTransactionSums($override);
    }

    public function isShippingSectionVisible()
    {
        $this->__load();
        return parent::isShippingSectionVisible();
    }

    public function isPaymentSectionVisible()
    {
        $this->__load();
        return parent::isPaymentSectionVisible();
    }

    public function isPaymentShippingSectionVisible()
    {
        $this->__load();
        return parent::isPaymentShippingSectionVisible();
    }

    public function isShippable()
    {
        $this->__load();
        return parent::isShippable();
    }

    public function getAddresses()
    {
        $this->__load();
        return parent::getAddresses();
    }

    public function getOrderId()
    {
        $this->__load();
        return parent::getOrderId();
    }

    public function setShippingId($shippingId)
    {
        $this->__load();
        return parent::setShippingId($shippingId);
    }

    public function getShippingId()
    {
        $this->__load();
        return parent::getShippingId();
    }

    public function setShippingMethodName($shippingMethodName)
    {
        $this->__load();
        return parent::setShippingMethodName($shippingMethodName);
    }

    public function setPaymentMethodName($paymentMethodName)
    {
        $this->__load();
        return parent::setPaymentMethodName($paymentMethodName);
    }

    public function setTracking($tracking)
    {
        $this->__load();
        return parent::setTracking($tracking);
    }

    public function getTracking()
    {
        $this->__load();
        return parent::getTracking();
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

    public function setLastRenewDate($lastRenewDate)
    {
        $this->__load();
        return parent::setLastRenewDate($lastRenewDate);
    }

    public function getLastRenewDate()
    {
        $this->__load();
        return parent::getLastRenewDate();
    }

    public function setNotes($notes)
    {
        $this->__load();
        return parent::setNotes($notes);
    }

    public function getNotes()
    {
        $this->__load();
        return parent::getNotes();
    }

    public function setAdminNotes($adminNotes)
    {
        $this->__load();
        return parent::setAdminNotes($adminNotes);
    }

    public function getAdminNotes()
    {
        $this->__load();
        return parent::getAdminNotes();
    }

    public function setOrderNumber($orderNumber)
    {
        $this->__load();
        return parent::setOrderNumber($orderNumber);
    }

    public function getOrderNumber()
    {
        $this->__load();
        return parent::getOrderNumber();
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

    public function getProfile()
    {
        $this->__load();
        return parent::getProfile();
    }

    public function getOrigProfile()
    {
        $this->__load();
        return parent::getOrigProfile();
    }

    public function getPaymentStatus()
    {
        $this->__load();
        return parent::getPaymentStatus();
    }

    public function getShippingStatus()
    {
        $this->__load();
        return parent::getShippingStatus();
    }

    public function addDetails(\XLite\Model\OrderDetail $details)
    {
        $this->__load();
        return parent::addDetails($details);
    }

    public function getDetails()
    {
        $this->__load();
        return parent::getDetails();
    }

    public function addTrackingNumbers(\XLite\Model\OrderTrackingNumber $trackingNumbers)
    {
        $this->__load();
        return parent::addTrackingNumbers($trackingNumbers);
    }

    public function getTrackingNumbers()
    {
        $this->__load();
        return parent::getTrackingNumbers();
    }

    public function addEvents(\XLite\Model\OrderHistoryEvents $events)
    {
        $this->__load();
        return parent::addEvents($events);
    }

    public function getEvents()
    {
        $this->__load();
        return parent::getEvents();
    }

    public function addItems(\XLite\Model\OrderItem $items)
    {
        $this->__load();
        return parent::addItems($items);
    }

    public function getItems()
    {
        $this->__load();
        return parent::getItems();
    }

    public function addSurcharges(\XLite\Model\Order\Surcharge $surcharges)
    {
        $this->__load();
        return parent::addSurcharges($surcharges);
    }

    public function getSurcharges()
    {
        $this->__load();
        return parent::getSurcharges();
    }

    public function addPaymentTransactions(\XLite\Model\Payment\Transaction $paymentTransactions)
    {
        $this->__load();
        return parent::addPaymentTransactions($paymentTransactions);
    }

    public function getPaymentTransactions()
    {
        $this->__load();
        return parent::getPaymentTransactions();
    }

    public function setCurrency(\XLite\Model\Currency $currency = NULL)
    {
        $this->__load();
        return parent::setCurrency($currency);
    }

    public function getCurrency()
    {
        $this->__load();
        return parent::getCurrency();
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


    public function __sleep()
    {
        return array('__isInitialized__', 'fraud_status_kount', 'order_id', 'shipping_id', 'shipping_method_name', 'payment_method_name', 'tracking', 'date', 'lastRenewDate', 'notes', 'adminNotes', 'orderNumber', 'total', 'subtotal', 'capostParcels', 'capostReturns', 'capostOffice', 'usedCoupons', 'profile', 'orig_profile', 'paymentStatus', 'shippingStatus', 'details', 'trackingNumbers', 'events', 'items', 'surcharges', 'payment_transactions', 'currency');
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