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
 * Mail images parser
 * TODO: full refactoring is required
 */
class MailImageParser extends \XLite\Core\FlexyCompiler
{
    /**
     * webdir
     *
     * @var string
     */
    public $webdir;

    /**
     * images
     *
     * @var array
     */
    public $images;

    /**
     * counter
     *
     * @var integer
     */
    public $counter;


    /**
     * Constructor
     * FIXME - we must found anoither way... now it is antipattern Public Morozov
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * flexy
     *
     * @return void
     */
    public function flexy()
    {
    }

    /**
     * postprocess
     *
     * @return void
     */
    public function postprocess()
    {
        $this->images = array();

        $this->counter = 1;

        // find images, e.g. background=..., src=..., style="...url('...')"
        for ($i = 0; count($this->tokens) > $i; $i++) {

            $token = $this->tokens[$i];

            if ('attribute' == $token['type']) {

                $name = strtolower($token['name']);

            } elseif ('attribute-value' == $token['type']) {

                $val = $this->getTokenText($i);

                if ('style' == $name) {

                    $pos = strpos($val, 'url(');

                    if (false !== $pos) {

                        $this->substImage(
                            $pos + 5 + $token['start'],
                            strpos($val, ')') + $token['start'] - 1
                        );

                    }

                } elseif ('background' == $name || 'src' == $name) {

                    $this->substImage($token['start'], $token['end']);
                }

                $name = '';

            } else {
                $name = '';
            }
        }

        $this->result = $this->substitute();
    }

    /**
     * substImage
     *
     * @param mixed $start ____param_comment____
     * @param mixed $end   ____param_comment____
     *
     * @return void
     */
    public function substImage($start, $end)
    {
        $img = substr($this->source, $start, $end-$start);

        if (strcasecmp(substr($img, 0, 2), '//') === 0) {
            $img = 'http:' . $img;
        }

        if (
            strcasecmp(substr($img, 0, 5), 'http:') !== 0
            && strcasecmp(substr($img, 0, 6), 'https:') !== 0
        ) {
            $img = $this->webdir . $img; // relative URL
        }

        $img = str_replace('&amp;', '&', $img);
        $img = str_replace(' ', '%20', $img);

        $this->subst($start, $end, $this->getImgSubstitution($img));
    }

    /**
     * getImgSubstitution
     *
     * @param mixed $img ____param_comment____
     *
     * @return void
     */
    public function getImgSubstitution($img)
    {
        if (!isset($this->images[$img])) {

            // fetch image

            if (($fd = @fopen($img, 'rb'))) {

                $image = '';

                while (!feof($fd)) {

                    $image .= fgets($fd, 10000);
                }

                fclose($fd);

                $path = tempnam(LC_DIR_COMPILE, 'mailimage');
                file_put_contents($path, $image);

                $info = getimagesize($img);

                $this->images[$img] = array(
                    'name' => basename($img),
                    'path' => $path,
                    'mime' => $info['mime']
                );

                $this->counter++;

            } else {

                // can't fetch
                return $img;
            }
        }

        return 'cid:' . $this->images[$img]['name'] . '@mail.lc';
    }

    /**
     * Removes any images that were parsed
     *
     * @return void
     */
    public function unlinkImages()
    {
        foreach ($this->images as $image) {

            \Includes\Utils\FileManager::deleteFile($image['path']);
        }
    }
}
