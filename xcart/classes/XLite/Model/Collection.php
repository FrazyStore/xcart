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

namespace XLite\Model;

/**
 * Double-linked list
 */
class Collection extends \XLite\Base\SuperClass
{
    /**
     * Start element
     *
     * @var \XLite_Model_ListNode
     */
    protected $head = null;

    /**
     * End element
     *
     * @var \XLite_Model_ListNode
     */
    protected $tail = null;


    /**
     * Search list element using a callback function
     *
     * @param string $method Some public method of the XLite_Model_ListNode class
     * @param array  $args   Callback arguments OPTIONAL
     *
     * @return \XLite\Model\ListNode
     */
    public function findByCallbackResult($method, array $args = array())
    {
        $node = $this->head;

        while ($node && call_user_func_array(array($node, $method), $args)) {
            $node = $node->getNext();
        }

        return $node;
    }

    /**
     * Search list element by its key
     *
     * @param string $key Node identifier
     *
     * @return \XLite\Model\ListNode
     */
    public function findByKey($key)
    {
        return $this->findByCallbackResult('checkKey', array($key));
    }

    /**
     * Insert new node before a certain node
     *
     * @param string                $key  Node key to search
     * @param \XLite\Model\ListNode $node New node to insert
     *
     * @return void
     */
    public function insertBefore($key, \XLite\Model\ListNode $node)
    {
        $current = $this->findByKey($key);
        $prev = $current->getPrev();

        $current->setPrev($node);

        $node->setNext($current);
        $node->setPrev($prev);

        if (isset($prev)) {
            $prev->setNext($node);
        } else {
            $this->head = $node;
        }
    }

    /**
     * Insert new node after a certain node
     *
     * @param string                $key  Node key to search
     * @param \XLite\Model\ListNode $node New node to insert
     *
     * @return void
     */
    public function insertAfter($key, \XLite\Model\ListNode $node)
    {
        $current = $this->findByKey($key);
        $next = $current->getNext();

        $current->setNext($node);

        $node->setPrev($current);
        $node->setNext($next);

        if (isset($next)) {
            $next->setPrev($node);
        } else {
            $this->tail = $node;
        }
    }

    /**
     * Add new node to the end of list
     *
     * @param \XLite\Model\ListNode $node Node to add
     *
     * @return void
     */
    public function add(\XLite\Model\ListNode $node)
    {
        if ($this->isInitialized()) {
            $this->insertAfter($this->tail->getKey(), $node);
        } else {
            $this->head = $this->tail = $node;
        }
    }

    /**
     * Return first element of the list
     *
     * @return \XLite\Model\ListNode
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * Return last element of the list
     *
     * @return \XLite\Model\ListNode
     */
    public function getTail()
    {
        return $this->tail;
    }


    /**
     * Check if list is initialized
     *
     * @return boolean
     */
    protected function isInitialized()
    {
        return isset($this->head) && isset($this->tail);
    }
}
