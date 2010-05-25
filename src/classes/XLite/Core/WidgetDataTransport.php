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
 * @subpackage Core
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

/**
 * Widget data transport
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class XLite_Core_WidgetDataTransport extends XLite_Base
{
    /**
     * Handler to use
     * 
     * @var    mixed
     * @access protected
     * @since  3.0.0
     */
    protected $handler = null;


    /**
     * Save passed handler
     * 
     * @param mixed $handler passed handler
     *  
     * @return void
     * @access public
     * @since  3.0.0
     */
    public function __construct($handler)
    {
        $this->handler = $handler;
    }

    /**
     * Call handler methods
     * 
     * @param string $method method to call
     * @param array  $args   call arguments
     *  
     * @return mixed
     * @access public
     * @since  3.0.0
     */
    public function __call($method, array $args = array())
    {
        return isset($this->handler) ? call_user_func_array(array($this->handler, $method), $args) : null;
    }
}
