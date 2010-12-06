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
 * @subpackage Controller
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

namespace XLite\Module\CDev\PayPalPro\Controller\Customer;

// FIXME - must be completely revised

/**
 * Profile
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class Profile extends \XLite\Controller\Customer\Profile implements \XLite\Base\IDecorator
{
    /**
     * Handles the request. Parses the request variables if necessary. Attempts to call the specified action function 
     * 
     * @return void
     * @access public
     * @since  3.0.0
     */
/*    public function handleRequest()
    {
        if (
            'modify' == \XLite\Core\Request::getInstance()->mode
            && 'paypalpro_express' == $this->getCart()->getComplex('PaymentMethod.payment_method')
        ) {
            $expressCheckout = new \XLite\Module\CDev\PayPalPro\Controller\Customer\ExpressCheckout();
            $expressCheckout->callActionProfile();
        }

        parent::handleRequest();
    }*/
}