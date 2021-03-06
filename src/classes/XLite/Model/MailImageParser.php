<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * LiteCommerce
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to licensing@litecommerce.com so we can send you a copy immediately.
 * 
 * PHP version 5.3.0
 *
 * @category  LiteCommerce
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @see       ____file_see____
 * @since     1.0.0
 */

namespace XLite\Model;

/**
 * Mail images parser
 * TODO: full refactoring is required
 * 
 * @see   ____class_see____
 * @since 1.0.0
 */
class MailImageParser extends \XLite\Core\FlexyCompiler
{
    /**
     * webdir 
     * 
     * @var   string
     * @see   ____var_see____
     * @since 1.0.0
     */
    public $webdir;
    
    /**
     * images 
     * 
     * @var   array
     * @see   ____var_see____
     * @since 1.0.0
     */
    public $images;
    
    /**
     * counter 
     * 
     * @var   integer
     * @see   ____var_see____
     * @since 1.0.0
     */
    public $counter;


    /**
     * Constructor
     * FIXME - we must found anoither way... now it is antipattern Public Morozov
     * 
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * flexy 
     * 
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function flexy()
    {
    }

    /**
     * postprocess 
     * 
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
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
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function substImage($start, $end) 
    {
        $img = substr($this->source, $start, $end-$start);

        if (strcasecmp(substr($img, 0, 5), 'http:')) {

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
     * @see    ____func_see____
     * @since  1.0.0
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

                $info = getimagesize($img);

                $this->images[$img] = array(
                    'name' => basename($img),
                    'data' => $image,
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
}
