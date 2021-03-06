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

namespace XLite\Upgrade\Entry\Module;

/**
 * Uploaded
 */
class Uploaded extends \XLite\Upgrade\Entry\Module\AModule
{
    /**
     * Default URL for module icon
     */
    const DEFAULT_ICON_URL = 'skins/admin/en/images/addon_default.png';

    /**
     * Module metadata
     *
     * @var array
     */
    protected $metadata;

    /**
     * Return module actual name
     *
     * @return string
     */
    public function getActualName()
    {
        return $this->getMetadata('ActualName');
    }

    /**
     * Return entry readable name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getMetadata('Name');
    }

    /**
     * Return icon URL
     *
     * @return string
     */
    public function getIconURL()
    {
        $url = $this->getMetadata('IconLink');
        if (!$url) {
            list($author, $name) = explode('\\', $this->getActualName());
            $path = \Includes\Utils\ModulesManager::getModuleIconFile($author, $name);
            if (\Includes\Utils\FileManager::isFileReadable($path)) {
                $url = \XLite\Core\Converter::buildURL(
                    'module',
                    null,
                    array(
                        'author' => $author,
                        'name'   => $name,
                    ),
                    'image.php'
                );
            }
        }

        return $url ?: static::DEFAULT_ICON_URL;
    }

    /**
     * Return entry old major version
     *
     * @return string
     */
    public function getMajorVersionOld()
    {
        return $this->callModuleMethod('getMajorVersion');
    }

    /**
     * Return entry old minor version
     *
     * @return string
     */
    public function getMinorVersionOld()
    {
        return $this->callModuleMethod('getMinorVersion');
    }

    /**
     * Return entry new major version
     *
     * @return string
     */
    public function getMajorVersionNew()
    {
        return $this->getMetadata('VersionMajor');
    }

    /**
     * Return entry new minor version
     *
     * @return string
     */
    public function getMinorVersionNew()
    {
        return $this->getMetadata('VersionMinor');
    }

    /**
     * Return entry revision date
     *
     * @return integer
     */
    public function getRevisionDate()
    {
        return $this->getMetadata('RevisionDate');
    }

    /**
     * Return module author readable name
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->getMetadata('Author');
    }

    /**
     * Return module description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getMetadata('Description');
    }

    /**
     * Check if module is enabled
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->isInstalled();
    }

    /**
     * Check if module is installed
     *
     * @return boolean
     */
    public function isInstalled()
    {
        return \Includes\Utils\ModulesManager::isModuleInstalled($this->getActualName());
    }

    /**
     * Return entry pack size
     *
     * @return integer
     */
    public function getPackSize()
    {
        return intval(\Includes\Utils\FileManager::getFileSize($this->getRepositoryPath()));
    }

    /**
     * Return module dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return $this->getMetadata('Dependencies');
    }

    /**
     * Unpack archive
     *
     * @return boolean
     */
    public function unpack()
    {
        parent::unpack();
        $this->saveHashesForInstalledFiles();

        return $this->isUnpacked();
    }

    /**
     * Calculate hashes for current version
     *
     * @return array
     */
    protected function loadHashesForInstalledFiles()
    {
        $result = array();
        $module = $this->getModuleInstalled();

        if ($module) {
            $pack = new \XLite\Core\Pack\Module($module);

            foreach ($pack->getDirectoryIterator() as $file) {

                if ($file->isFile()) {
                    $relativePath = \Includes\Utils\FileManager::getRelativePath($file->getPathname(), LC_DIR_ROOT);

                    if ($relativePath) {
                        $result[$relativePath] = \Includes\Utils\FileManager::getHash($file->getPathname(), true);
                    }
                }
            }
        }

        return $result ?: $this->getHashes(true);
    }

    /**
     * Overloaded constructor
     *
     * @param string $path Path to the module package
     *
     * @return void
     */
    public function __construct($path)
    {
        if (!\Includes\Utils\FileManager::isFileReadable($path)) {
            \Includes\ErrorHandler::fireError('Unable to read module package: "' . $path . '"');
        }

        $this->setRepositoryPath($path);

        $module = new \PharData($this->getRepositoryPath());
        $this->metadata = $module->getMetaData();

        if (empty($this->metadata)) {
            \Includes\ErrorHandler::fireError('Unable to read module metadata: "' . $path . '"');
        }

        parent::__construct();
    }

    /**
     * Names of variables to serialize
     *
     * @return array
     */
    public function __sleep()
    {
        $list = parent::__sleep();
        $list[] = 'metadata';

        return $list;
    }

    /**
     * Get module metadata (or only the certain field from it)
     *
     * @param string $name Array index
     *
     * @return mixed
     */
    protected function getMetadata($name)
    {
        return \Includes\Utils\ArrayManager::getIndex($this->metadata, $name, true);
    }

    /**
     * Method to access module main clas methods
     *
     * @param string $method Method to call
     * @param array  $args   Call arguments OPTIONAL
     *
     * @return mixed
     */
    protected function callModuleMethod($method, array $args = array())
    {
        return \Includes\Utils\ModulesManager::callModuleMethod($this->getActualName(), $method, $args);
    }

    /**
     * Find installed module
     *
     * @return \XLite\Model\Module
     */
    protected function getModuleInstalled()
    {
        return \XLite\Core\Database::getRepo('\XLite\Model\Module')->findOneBy($this->getModuleData());
    }

    /**
     * Return common module data
     *
     * @return array
     */
    protected function getModuleData()
    {
        list($author, $name) = explode('\\', $this->getActualName());

        return array(
            'name'            => $name,
            'author'          => $author,
            'majorVersion'    => $this->getMajorVersionNew(),
            'minorVersion'    => $this->getMinorVersionNew(),
            'fromMarketplace' => false,
            'installed'       => true,
            'authorEmail'     => '',
        );
    }

    /**
     * Update database records
     *
     * @return array
     */
    protected function updateDBRecords()
    {
        $this->setIsFreshInstall(!$this->isInstalled());

        $module = $this->getModuleInstalled() ?: new \XLite\Model\Module($this->getModuleData());

        $module->setDate(\XLite\Core\Converter::time());
        $module->setRevisionDate($this->getRevisionDate());
        $module->setPackSize($this->getPackSize());
        $module->setModuleName($this->getName());
        $module->setAuthorName($this->getAuthor());
        $module->setDescription($this->getDescription());
        $module->setIconURL($this->getIconURL());
        $module->setDependencies($this->getDependencies());

        $data = $this->getModuleData();
        unset($data['majorVersion']);
        unset($data['minorVersion']);

        $modules = \XLite\Core\Database::getRepo('\XLite\Model\Module')->findBy($data);

        foreach ($modules as $moduleOld) {
            if ($moduleOld) {
                if (
                    $moduleOld->getMajorVersion() != $this->getMajorVersionNew()
                    || $moduleOld->getMinorVersion() != $this->getMinorVersionNew()
                ) {
                    $module->setYamlLoaded($moduleOld->getYamlLoaded());
                    \XLite\Core\Database::getRepo('\XLite\Model\Module')->delete($moduleOld);
                }
            }
        }

        // Save changes in DB
        if ($module->getModuleID()) {
            $module->setMajorVersion($this->getMajorVersionNew());
            $module->setMinorVersion($this->getMinorVersionNew());
            \XLite\Core\Database::getRepo('\XLite\Model\Module')->update($module);
        } else {
            $module->setEnabled(true);
            \XLite\Core\Database::getRepo('\XLite\Model\Module')->insert($module);
        }

        \XLite\Controller\Admin\Base\AddonsList::storeRecentlyInstalledModules(array($module->getModuleID()));
    }
}
