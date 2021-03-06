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

namespace Includes\Decorator\Plugin\Doctrine\Plugin\Multilangs;

/**
 * Routines for Doctrine library
 *
 */
class Main extends \Includes\Decorator\Plugin\Doctrine\Plugin\APlugin
{
    /**
     * List of <file, code> pairs (code replacements)
     *
     * @var array
     */
    protected $replacements = array();

    /**
     * Autogenerated "translate" property
     *
     * @var string
     */
    protected $templateTranslation = <<<CODE
    /**
     * Translations (relation). AUTOGENERATED
     *
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @OneToMany (targetEntity="____TRANSLATION_CLASS____", mappedBy="owner", cascade={"all"})
     */
    protected \$translations;
CODE;

    /**
     * Autogenerated getter
     *
     * @var string
     */
    protected $templateGet = <<<CODE
    /**
     * Translation getter. AUTOGENERATED
     *
     * @return string
     */
    public function ____GETTER____()
    {
        return \$this->getSoftTranslation()->____GETTER____();
    }
CODE;

    /**
     * Autogenerated setter
     *
     * @var string
     */
    protected $templateSet = <<<CODE
    /**
     * Translation setter. AUTOGENERATED
     *
     * @param string \$value value to set
     *
     * @return void
     */
    public function ____SETTER____(\$value)
    {
        \$translation = \$this->getTranslation();

        if (!\$this->hasTranslation(\$translation->getCode())) {
            \$this->addTranslations(\$translation);
        }

        return \$translation->____SETTER____(\$value);
    }
CODE;

    /**
     * Autogenerated "owner" property
     *
     * @var string
     */
    protected $templateOwner = <<<CODE
    /**
     * Translation owner (relation). AUTOGENERATED
     *
     * @var ____OWNER_CLASS____
     *
     * @ManyToOne  (targetEntity="____MAIN_CLASS____", inversedBy="translations")
     * @JoinColumn (name="id", referencedColumnName="____MAIN_CLASS_ID____")
     */
    protected \$owner;
CODE;

    // {{{ Hook handelrs

    /**
     * Execute certain hook handler
     *
     * @return void
     */
    public function executeHookHandler()
    {
        // It's the metadata collected by Doctrine
        foreach ($this->getMetadata() as $main) {
            if (is_subclass_of($main->name, '\XLite\Model\Base\I18n')) {
                $node = static::getClassesTree()->find($main->name);

                // Process only certain classes
                if (
                    !$node->isTopLevelNode() 
                    && !$node->isDecorator()
                ) {
                    $translation = $this->getTranslationClass($main) ?: $this->getTranslationClassDefault($main);

                    if (!empty($translation)) {
                        $this->addReplacement($main, 'translation', $this->getTranslationSubstitutes($main, $translation));

                        // Iterate over all translatable fields
                        foreach ($this->getTranslationFields($translation) as $field) {

                            // Two iteartions: "getter" and "setter"
                            foreach ($this->getAutogeneratedMethodsList() as $method => $entry) {
                                $this->addReplacement(
                                    $main,
                                    $method,
                                    $this->getMethodSubstitutes($main, $entry, $method, $field)
                                );
                            }
                        }

                        // Add the "owner" field to the main class (if not defined manually)
                        if (!property_exists($translation, 'owner')) {
                            $this->addReplacement($translation, 'owner', $this->getOwnerSubstitutes($main));
                        }
                    }
                }
            }
        }

        // Populate changes
        $this->writeData();
    }

    // }}}

    // {{{ Replacements

    /**
     * Add code to replace
     *
     * @param \Doctrine\ORM\Mapping\ClassMetadata $data        Class metadata
     * @param string                              $template    Template to use
     * @param array                               $substitutes List of entries to substitude
     *
     * @return void
     */
    protected function addReplacement(\Doctrine\ORM\Mapping\ClassMetadata $data, $template, array $substitutes)
    {
        if (!empty($substitutes)) {

            $file = \Includes\Utils\Converter::getClassFile($data->reflClass->getName());

            if (!isset($this->replacements[$file])) {
                $this->replacements[$file] = '';
            }

            $this->replacements[$file] .= $this->substituteTemplate($template, $substitutes) . PHP_EOL . PHP_EOL;
        }
    }

    // }}}

    // {{{ "Translation"-related methods

    /**
     * Check if the "translation" field is defined manually
     *
     * @param \Doctrine\ORM\Mapping\ClassMetadata $main Main class metadata
     *
     * @return string
     */
    protected function getTranslationClass(\Doctrine\ORM\Mapping\ClassMetadata $main)
    {
        $class = null;

        if (property_exists($main, 'associationMappings') && isset($main->associationMappings['translations'])) {
            $class = $this->getMetadata(
                \Includes\Utils\Converter::getPureClassName($main->associationMappings['translations']['targetEntity'])
            );
        }

        return $class;
    }

    /**
     * Return default name for translation class
     *
     * @param \Doctrine\ORM\Mapping\ClassMetadata $main Main class metadata
     *
     * @return string
     */
    protected function getTranslationClassDefault(\Doctrine\ORM\Mapping\ClassMetadata $main)
    {
        return $this->getMetadata(\Includes\Utils\Converter::getPureClassName($main->name) . 'Translation');
    }

    /**
     * Return the array of substitutes for the "translation" template
     *
     * @param \Doctrine\ORM\Mapping\ClassMetadata $main        Current multilang model class metadata
     * @param \Doctrine\ORM\Mapping\ClassMetadata $translation Translation class metadata
     *
     * @return array
     */
    protected function getTranslationSubstitutes(
        \Doctrine\ORM\Mapping\ClassMetadata $main,
        \Doctrine\ORM\Mapping\ClassMetadata $translation
    ) {
        $result = array();

        if (!$main->reflClass->hasProperty('translations')) {
            $result['____TRANSLATION_CLASS____'] = $translation->name;
        }

        return $result;
    }

    /**
     * Return list of the translatabe fields for a class
     *
     * @param \Doctrine\ORM\Mapping\ClassMetadata $translation Translation class metadata
     *
     * @return array
     */
    protected function getTranslationFields(\Doctrine\ORM\Mapping\ClassMetadata $translation)
    {
        return array_diff(
            $translation->fieldNames,
            call_user_func(array($translation->name, 'getInternalProperties'))
        );
    }

    // }}}

    // {{{ Methods to generate getters and setters

    /**
     * Return list of getters/setters patterns
     *
     * @return array
     */
    protected function getAutogeneratedMethodsList()
    {
        return array('get' => '____GETTER____', 'set' => '____SETTER____');
    }

    /**
     * Return the array of substitutes for the getters/setters templates
     *
     * @param \Doctrine\ORM\Mapping\ClassMetadata $main   Current multilang model class metadata
     * @param string                              $entry  Entry to substitute
     * @param string                              $method "get" or "set"
     * @param string                              $field  Name of field to get or set
     *
     * @return array
     */
    protected function getMethodSubstitutes(\Doctrine\ORM\Mapping\ClassMetadata $main, $entry, $method, $field)
    {
        $result = array();

        if (!$main->reflClass->hasMethod($method .= \Includes\Utils\Converter::convertToCamelCase($field))) {
            $result[$entry] = $method;
        }

        return $result;
    }
    
    // }}}

    // {{{ "Owner"-related methods

    /**
     * Return the array of substitutes for the "owner" template
     *
     * @param \Doctrine\ORM\Mapping\ClassMetadata $main Current multilang model class metadata
     *
     * @return array
     */
    protected function getOwnerSubstitutes(\Doctrine\ORM\Mapping\ClassMetadata $main)
    {
        return array(
            '____OWNER_CLASS____'   => \Includes\Utils\Converter::getPureClassName($main->name),
            '____MAIN_CLASS____'    => \Includes\Utils\Converter::getPureClassName($main->name),
            '____MAIN_CLASS_ID____' => array_shift($main->identifier),
        );
    }

    // }}}

    // {{{ Methods to write changes

    /**
     * Put prepared code into the files
     *
     * @return void
     */
    protected function writeData()
    {
        foreach ($this->replacements as $file => $code) {
            $file = LC_DIR_CACHE_CLASSES . $file;

            \Includes\Utils\FileManager::write(
                $file,
                \Includes\Decorator\Utils\Tokenizer::addCodeToClassBody($file, $code)
            );
        }
    }

    /**
     * Substitute entries in code template
     *
     * @param string $template Template to prepare
     * @param array  $entries  List of <entry, value> pairs
     *
     * @return string
     */
    protected function substituteTemplate($template, array $entries)
    {
        return str_replace(array_keys($entries), $entries, $this->{'template' . ucfirst($template)});
    }

    // }}}

    // {{{ Auxiliary methods

    /**
     * Alias
     *
     * @param string $class Class name OPTIONAL
     *
     * @return array|\Doctrine\ORM\Mapping\ClassMetadata
     */
    protected function getMetadata($class = null)
    {
        return \Includes\Decorator\Plugin\Doctrine\Utils\EntityManager::getAllMetadata($class);
    }

    // }}}
}
