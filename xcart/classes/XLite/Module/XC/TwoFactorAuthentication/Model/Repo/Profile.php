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

namespace XLite\Module\XC\TwoFactorAuthentication\Model\Repo;

/**
 * The Profile model repository
 */
class Profile extends \XLite\Model\Repo\Profile implements \XLite\Base\IDecorator
{
    /**
     * Set NULL authy_id field for all entities
     *
     * @return void
     */
    public function clearAuthyIds()
    {
        $qb = $this->getQueryBuilder();
        $qb->update($this->_entityName, 'p')
            ->set('p.authy_id', 'NULL');
        $qb->execute();
    }

    /**
     * Set NULL authy_id field for profile entity by profile_id
     *
     * @param integer $profileId Profile id
     *
     * @return void
     */
    public function clearAuthyIdById($profileId)
    {
        $qb = $this->getQueryBuilder();
        $qb->update($this->_entityName, 'p')
            ->set('p.authy_id', 'NULL')
            ->where('p.profile_id=:profile_id')
            ->setParameter('profile_id', $profileId);
        $qb->execute();
    }
}