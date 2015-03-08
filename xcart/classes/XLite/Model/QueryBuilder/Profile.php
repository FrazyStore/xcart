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

namespace XLite\Model\QueryBuilder;

/**
 * Profile query builder
 */
class Profile extends \XLite\Model\QueryBuilder\AQueryBuilder
{
    // {{{ Search binds

    /**
     * Bind pattern condition
     *
     * @param string $value Condition
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindPattern($value)
    {
        if (!empty($value)) {
            $cnd = new \Doctrine\ORM\Query\Expr\Orx();

            $this->prepareField($this, 'firstname')
                ->prepareField($this, 'lastname');

            foreach ($this->getNameSubstringSearchFields() as $field) {
                $cnd->add($field . ' LIKE :pattern');
            }

            $this->andWhere($cnd)
                ->setParameter('pattern', '%' . $value . '%');
        }

        return $this;
    }

    /**
     * Bind address condition
     *
     * @param string $value Condition
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindAddress($value)
    {
        if (!empty($value)) {
            $this->linkLeft('addresses.addressFields', 'field_value_address_pattern')
                ->andWhere('field_value_address_pattern.value LIKE :addressPattern')
                ->setParameter('addressPattern', '%' . $value . '%');
        }

        return $this;
    }

    /**
     * Bind AND condition
     *
     * @param string $name  Name
     * @param mixed  $value Value
     * @param string $type  Condition type OPTIONAL
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindFieldAndCondition($name, $value, $type = '=')
    {
        if ($value) {
            $alias = 'field_value_' . $name;
            $this->prepareField($this, $name)
                ->andWhere($alias . '.value ' . $type . ' :field_value_' . $name)
                ->setParameter('field_value_' . $name, $value);
        }

        return $this;
    }

    /// {{{ Visible

    /**
     * Bind only visible profiles
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindVisible()
    {
        return $this->andWhere($this->getVisibleCondition());
    }

    /**
     * Return visible condition
     *
     * @return \Doctrine\ORM\Query\Expr\Base
     */
    public function getVisibleCondition()
    {
        return $this->expr()->isNull('p.order');
    }

    // }}}

    /**
     * Bind only logged profiles
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindLogged()
    {
        return $this->andWhere('p.last_login > 0');
    }

    /**
     * Bind only profiles with same login
     *
     * @param \XLite\Model\Profile $profile Profile
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindSameLogin(\XLite\Model\Profile $profile)
    {
        return $this->andWhere('p.login = :login')
            ->andWhere('p.profile_id != :profileId')
            ->setParameter('login', $profile->getLogin())
            ->setParameter('profileId', $profile->getProfileId() ?: 0);
    }

    // {{{ Registered

    /**
     * Bind only visible and registered profiles
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindRegistered()
    {
        return $this->andWhere($this->getRegisteredCondition())
            ->setParameter('anonymous', true);
    }

    /**
     * Return registered condition
     *
     * @return \Doctrine\ORM\Query\Expr\Base
     */
    public function getRegisteredCondition()
    {
        return $this->expr()->andX(
            $this->getVisibleCondition(),
            'p.anonymous != :anonymous'
        );
    }

    // }}}

    // {{{ Anonymous

    /**
     * Bind only anonymous profiles
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindAnonymous()
    {
        return $this->andWhere($this->getAnonymousCondition())
            ->setParameter('anonymous', true);
    }

    /**
     * Return anonymous condition
     *
     * @return \Doctrine\ORM\Query\Expr\Base
     */
    public function getAnonymousCondition()
    {
        return $this->expr()->andX(
            $this->getVisibleCondition(),
            'p.anonymous = :anonymous'
        );
    }

    // }}}

    // {{{ Admin

    /**
     * Bind only admin profiles
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindAdmin()
    {
        return $this->andWhere($this->getAdminCondition())
            ->setParameter('adminAccessLevel', \XLite\Core\Auth::getInstance()->getAdminAccessLevel());
    }

    /**
     * Return admin condition
     *
     * @return \Doctrine\ORM\Query\Expr\Base
     */
    public function getAdminCondition()
    {
        return $this->expr()->andX(
            $this->getRegisteredCondition(),
            'p.access_level >= :adminAccessLevel'
        );
    }

    // }}}

    // {{{ Customer

    /**
     * Bind only customer profiles
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindCustomer()
    {
        return $this->andWhere($this->getCustomerCondition())
            ->setParameter('adminAccessLevel', \XLite\Core\Auth::getInstance()->getAdminAccessLevel());
    }

    /**
     * Return customer condition
     *
     * @return \Doctrine\ORM\Query\Expr\Base
     */
    public function getCustomerCondition()
    {
        return $this->expr()->andX(
            $this->getVisibleCondition(),
            'p.access_level < :adminAccessLevel'
        );
    }

    // }}}

    /**
     * Bind profiles with specified order or order ID
     *
     * @param mixed $order Order or order ID
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindOrder($order)
    {
        if (is_object($order) && $order instanceOf \XLite\Model\Order) {
            $this->andWhere('p.order = :order')
                ->setParameter('order', $order);

        } elseif (is_int($order) || preg_match('/^\s*\d+\s*$/Ss', $order)) {
            $this->linkInner('p.order')
                ->andWhere('order.order_id = :order_id')
                ->setParameter('order_id', intval($order));

        }

        return $this;
    }

    /**
     * Bind membership condition
     *
     * @param mixed $value Membership or membership id or special code
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindMembership($value)
    {
        if (is_object($value) && $value instanceOF \XLite\Model\Membership) {
            $this->andWhere('p.membership = :membership')
                ->setParameter('membership', $value);

        } elseif ('pending_membership' === trim($value)) {
            $this->andWhere('p.pending_membership IS NOT NULL');

        } elseif ('%' === trim($value)) {
            $this->andWhere('p.membership IS NULL');

        } elseif (is_scalar($value) && 0 < intval($value)) {
            $this->linkInner('p.membership')
                ->andWhere('membership.membership_id = :membershipId')
                ->setParameter('membershipId', intval($value));
        }

        return $this;
    }

    // {{{ Roles

    /**
     * Bind roles
     *
     * @param mixed $value Role or role id or roles list or role id list
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindRoles($value)
    {
        $condition = $this->getRolesCondition($value);

        if ($condition) {
            $this->linkInner('p.roles')
                ->andWhere($condition);
        }

        return $this;
    }

    /**
     * Return roles condition
     *
     * @param mixed $value Role or role id or roles list or role id list
     *
     * @return \Doctrine\ORM\Query\Expr\Base
     */
    public function getRolesCondition($value)
    {
        if (!is_array($value)) {
            $value = array($value);
        }

        $ids = array();
        foreach ($value as $id) {
            if ($id) {
                $ids[] = is_object($id) ? $id->getId() : $id;
            }
        }

        return $ids ? $this->expr()->in('roles.id', $ids) : null;
    }

    // }}}

    /**
     * Bind permissions
     *
     * @param mixed $value Permission code or permission codes list
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindPermissions($value)
    {
        $this->linkInner('p.roles')
            ->linkInner('roles.permissions')
            ->andWhere('permissions.code IN (' . $this->getInCondition($value, 'perm') . ')');

        return $this;
    }

    /**
     * Bind permissions
     *
     * @param mixed $value Permission code or permission codes list
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    public function bindAddedDate(\XLite\Core\CommonCell $value)
    {
        return $this->bindMacroDate(
            'p.addes',
            is_int($value->startDate) ? $value->startDate : null,
            is_int($value->endDate) ? $value->endDate : null
        );
    }

    /**
     * Prepare field search query
     *
     * @param \Doctrine\ORM\QueryBuilder $queryBuilder Query builder
     * @param string                     $fieldName    Field name
     *
     * @return \XLite\Model\QueryBuilder\AQueryBuilder
     */
    protected function prepareField(\Doctrine\ORM\QueryBuilder $queryBuilder, $fieldName)
    {
        $alias = 'field_' . $fieldName;
        $aliasValue = 'field_value_' . $fieldName;

        $this->linkLeft('addresses.addressFields', $aliasValue);
        $this->leftJoin(
            $aliasValue . '.addressField',
            $alias,
            \Doctrine\ORM\Query\Expr\Join::WITH,
            $alias . '.serviceName = :' . $fieldName
        );

        return $this->setParameter($fieldName, $fieldName);
    }

    /**
     * List of fields to use in search by substring
     *
     * @return array
     */
    protected function getNameSubstringSearchFields()
    {
        return array(
            'CONCAT(CONCAT(field_value_firstname.value, \' \'), field_value_lastname.value)',
            'CONCAT(CONCAT(field_value_lastname.value, \' \'), field_value_firstname.value)',
            'p.login'
        );
    }

    // }}}

}
