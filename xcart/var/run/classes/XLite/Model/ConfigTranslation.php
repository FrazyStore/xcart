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
 * Config multilingual data
 *
 * @Entity (repositoryClass="\XLite\Model\Repo\Base\Translation")
 * @Table  (name="config_translations",
 *      indexes={
 *          @Index (name="ci", columns={"code","id"}),
 *          @Index (name="id", columns={"id"})
 *      }
 * )
 */
class ConfigTranslation extends \XLite\Model\Base\Translation
{
    /**
     * Human-readable option name
     *
     * @var string
     *
     * @Column (type="string", length=255)
     */
    protected $option_name;

    /**
     * Option comment
     *
     * @var string
     *
     * @Column (type="text")
     */
    protected $option_comment = '';

    /**
     * Set option_name
     *
     * @param string $optionName
     * @return ConfigTranslation
     */
    public function setOptionName($optionName)
    {
        $this->option_name = $optionName;
        return $this;
    }

    /**
     * Get option_name
     *
     * @return string 
     */
    public function getOptionName()
    {
        return $this->option_name;
    }

    /**
     * Set option_comment
     *
     * @param text $optionComment
     * @return ConfigTranslation
     */
    public function setOptionComment($optionComment)
    {
        $this->option_comment = $optionComment;
        return $this;
    }

    /**
     * Get option_comment
     *
     * @return text 
     */
    public function getOptionComment()
    {
        return $this->option_comment;
    }

    /**
     * Get label_id
     *
     * @return integer 
     */
    public function getLabelId()
    {
        return $this->label_id;
    }

    /**
     * Set code
     *
     * @param fixedstring $code
     * @return ConfigTranslation
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get code
     *
     * @return fixedstring 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Translation owner (relation). AUTOGENERATED
     *
     * @var XLite\Model\Config
     *
     * @ManyToOne  (targetEntity="XLite\Model\Config", inversedBy="translations")
     * @JoinColumn (name="id", referencedColumnName="config_id")
     */
    protected $owner;


}