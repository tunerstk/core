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
 * @category   LiteCommerce
 * @package    XLite
 * @subpackage Logger
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

require_once LC_EXT_LIB_DIR . 'Log.php';

/**
 * Client's browser logger
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class XLite_Logger_Client extends Log
{
    /**
     * Constructor
     *
     * @param string  $logName Log name
     * @param string  $ident   Identifier
     * @param boolean $conf    Configuration
     *
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function __construct($logName, $ident = '', $conf = false)
    {
        $this->ident = $ident;
    }

    /**
     * Add log
     *
     * @param string $message  Message
     * @param string $priority Priority code
     *
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function log($message, $priority = LOG_INFO)
    {
        printf(
            '>>> %s %s [%s] %s<br />' . "\n",
            strftime('%b %d %H:%M:%S %Y'),
            $this->ident,
            Log::priorityToString($priority),
            $message
        );
    }
}
