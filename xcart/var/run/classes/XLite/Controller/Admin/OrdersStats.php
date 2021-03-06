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

namespace XLite\Controller\Admin;

/**
 * Orders statistics page controller
 */
class OrdersStats extends \XLite\Controller\Admin\Stats
{
    /**
     * Columns
     */
    const P_PROCESSED  = 'processed';
    const P_QUEUED     = 'queued';
    const P_CANCELED   = 'canceled';
    const P_DECLINED   = 'declined';
    const P_TOTAL      = 'total';
    const P_PAID       = 'paid';

    /**
     * Check ACL permissions
     *
     * @return boolean
     */
    public function checkACL()
    {
        return parent::checkACL() || \XLite\Core\Auth::getInstance()->isPermissionAllowed('manage orders');
    }

    /**
     * getPageTemplate
     *
     * @return string
     */
    public function getPageTemplate()
    {
        return 'orders_stats.tpl';
    }

    /**
     * Get row headings
     *
     * @return array
     */
    public function getRowTitles()
    {
        return array(
            self::P_PROCESSED  => 'Processed/Completed',
            self::P_QUEUED     => 'Queued',
            self::P_DECLINED   => 'Declined',
            self::P_CANCELED   => 'Canceled',
            self::P_TOTAL      => 'Total',
            self::P_PAID       => 'Paid',
        );
    }

    /**
     * Status rows as row identificator => included statuses
     *
     * @return array
     */
    public function getStatusRows()
    {
        return array(
            static::P_PROCESSED => array(
                \XLite\Model\Order\Status\Payment::STATUS_AUTHORIZED,
                \XLite\Model\Order\Status\Payment::STATUS_PAID,
                \XLite\Model\Order\Status\Payment::STATUS_PART_PAID,
            ),
            static::P_QUEUED => array(
                \XLite\Model\Order\Status\Payment::STATUS_QUEUED,
            ),
            static::P_DECLINED => array(
                \XLite\Model\Order\Status\Payment::STATUS_DECLINED,
            ),
            static::P_CANCELED => array(
                \XLite\Model\Order\Status\Payment::STATUS_CANCELED,
            ),
            static::P_TOTAL => array(
                \XLite\Model\Order\Status\Payment::STATUS_DECLINED,
                \XLite\Model\Order\Status\Payment::STATUS_QUEUED,
                \XLite\Model\Order\Status\Payment::STATUS_AUTHORIZED,
                \XLite\Model\Order\Status\Payment::STATUS_PAID,
                \XLite\Model\Order\Status\Payment::STATUS_PART_PAID,
            ),
            static::P_PAID => array(
                \XLite\Model\Order\Status\Payment::STATUS_AUTHORIZED,
                \XLite\Model\Order\Status\Payment::STATUS_PAID,
                \XLite\Model\Order\Status\Payment::STATUS_PART_PAID,
            ),
        );
    }

    /**
     * Is totals row
     *
     * @param string $row Row identificator
     *
     * @return boolean
     */
    public function isTotalsRow($row)
    {
        return in_array(
            $row,
            array(
                self::P_PAID,
                self::P_TOTAL,
            )
        );
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getStatsRows()
    {
        return array_keys($this->getStatusRows());
    }

    /**
     * Prepare statistics table
     *
     * @return array
     */
    public function getStats()
    {
        if (is_null($this->stats)) {
            $this->stats = $this->initStats();

            foreach ($this->getStatsColumns() as $period) {
                $dataCount = $this->getDataCount($this->getStartTime($period));
                $dataTotal = $this->getDataTotal($this->getStartTime($period));

                foreach ($this->getStatusRows() as $row => $statuses) {
                    if ($this->isTotalsRow($row)) {
                        $this->stats[$row][$period] = $this->getDataByStatuses($dataTotal, $statuses);

                    } else {
                        $this->stats[$row][$period] = $this->getDataByStatuses($dataCount, $statuses);
                    }
                }

            }
        }

        return $this->stats;
    }

    /**
     * Returns statistics data
     *
     * @param integer $startTime Start time
     *
     * @return array
     */
    protected function getDataCount($startTime)
    {
        $condition = $this->defineGetDataCountCondition($startTime);

        return \XLite\Core\Database::getRepo('\XLite\Model\Order')->getStatisticCount($condition);
    }

    /**
     * Returns statistic condition
     *
     * @param integer $startTime Start time
     *
     * @return \XLite\Core\CommonCell
     */
    protected function defineGetDataCountCondition($startTime)
    {
        $condition = new \XLite\Core\CommonCell();

        $condition->date = array(
            $startTime,
            LC_START_TIME
        );

        $condition->currency = $this->getCurrency();

        return $condition;
    }

    /**
     * Get data
     *
     * @param integer $startTime Start time
     *
     * @return array
     */
    protected function getDataTotal($startTime)
    {
        $condition = $this->defineGetDataTotalCondition($startTime);

        return \XLite\Core\Database::getRepo('\XLite\Model\Order')->getStatisticTotal($condition);
    }

    /**
     * Returns statistic condition
     *
     * @param integer $startTime Start time
     *
     * @return \XLite\Core\CommonCell
     */
    protected function defineGetDataTotalCondition($startTime)
    {
        $condition = new \XLite\Core\CommonCell();

        $condition->date = array(
            $startTime,
            LC_START_TIME
        );

        $condition->currency = $this->getCurrency();

        return $condition;
    }

    /**
     * Get data by statuses
     *
     * @param array $data     Data
     * @param array $statuses Statuses
     *
     * @return integer|float
     */
    protected function getDataByStatuses($data, $statuses)
    {
        $result = 0;

        foreach ($data as $value) {
            if (in_array($value['code'], $statuses)) {
                $result += $value[1];
            }
        }

        return $result;
    }
}
