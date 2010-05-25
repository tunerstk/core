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
 * @subpackage Model
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
class XLite_Module_Nochex_Model_PaymentMethod_Nochex extends XLite_Model_PaymentMethod_CreditCard
{
    public $configurationTemplate = "modules/Nochex/config.tpl";
    public $formTemplate = "modules/Nochex/checkout.tpl";
    public $processorName = "Nochex";
    
    function handleRequest(XLite_Model_Cart $order)
    {
        require_once LC_MODULES_DIR . 'Nochex' . LC_DS . 'encoded.php';
        PaymentMethod_nochex_handleRequest($order,$this);
    }
    
    function getReturnURL($cart)
    {
        return $this->xlite->getShopUrl("cart.php?target=checkout&action=return&order_id=".$cart->get('order_id'));
    }

    function getResponderURL($cart)
    {
        return $this->xlite->getShopUrl("classes/modules/Nochex/callback.php?order_id=".$cart->get('order_id'));
    }

    function getTotal($cart)
    {
        return sprintf("%.02f", doubleval($cart->get('total')));
    }
}