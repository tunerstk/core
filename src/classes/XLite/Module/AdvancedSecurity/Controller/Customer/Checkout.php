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

/**
 * ____description____
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class XLite_Module_AdvancedSecurity_Controller_Customer_Checkout extends XLite_Controller_Customer_Checkout implements XLite_Base_IDecorator
{
    
    function getPaymentMethods()
    {
        $methods = parent::getPaymentMethods();

        $gpg = new XLite_Module_AdvancedSecurity_Model_GPG();
        if ($gpg->get('publicKey') && $gpg->get('secretKey'))
            return $methods;

        $values = array();
        foreach ($methods as $method) {
            if ($method->get('payment_method') == "CreditCard")
                continue;

            $values[] = $method;
        }

        return $values;
    }

}