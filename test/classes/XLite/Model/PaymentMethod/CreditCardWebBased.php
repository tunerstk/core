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
 * CreditCard-based  / web-based payment method
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
abstract class XLite_Model_PaymentMethod_CreditCardWebBased extends XLite_Model_PaymentMethod_CreditCard
{
    /**
     * Form template
     *
     * @var    string
     * @access public
     * @see    ____var_see____
     * @since  3.0.0
     */
    public $formTemplate = 'checkout/credit_card_builder.tpl';

    /**
     * Get form URL 
     * 
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    abstract public function getFormURL();

    /**
     * Get form method (POST / GET)
     * 
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getFormMethod()
    {
        return 'POST';
    }

    /**
     * Get form fields 
     *
     * @param XLite_Model_Cart $cart $cart
     * 
     * @return array
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    abstract protected function getFields(XLite_Model_Cart $cart);

    /**
     * Get default return URL 
     * 
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getReturnURL()
    {
        return $this->buildUrl('callback', 'callback', array('order_id_name' => 'cartId'));
    }

    /**
     * Get client IP 
     * 
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getClientIP()
    {
        $result = null;

        if (
            isset($_SERVER['REMOTE_ADDR'])
            && preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/Ss', $_SERVER['REMOTE_ADDR'])
        ) {
            $result = $_SERVER['REMOTE_ADDR'];
        }

        return $result;
    }

    /**
     * Check total (cart total and transaction total from gateway response)
     * 
     * @param XLite_Model_Cart $cart  Cart
     * @param float            $total Total from gateway response
     *  
     * @return boolean
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function checkTotal(XLite_Model_Cart $cart, $total)
    {
        $result = true;

        if ($total && $this->getComplex('params.check_total') && $cart->get('total') != $total) {
            $this->setDetailsField($cart, 'error', 'Error', 'Hacking attempt!');
            $this->setDetailsField(
                $cart,
                'errorDescription',
                'Hacking attempt details',
                'Total amount doesn\'t match. Order total: ' . $cart->get('total')
                . '; payment gateway amount: ' . $total
            );
            $result = false;
        }

        return $result;
    }

    /**
     * Check currency (payment method curreny and transaction response currency)
     * 
     * @param XLite_Model_Cart $cart     Cart
     * @param string           $currency Transaction response currency code
     *  
     * @return boolean
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function checkCurrency(XLite_Model_Cart $cart, $currency)
    {
        $result = true;

        $paymentCurrency = $this->getComplex('params.currency');

        if ($currency && $this->getComplex('params.check_currency') && $paymentCurrency != $currency) {
            $this->setDetailsField($cart, 'error', 'Error', 'Hacking attempt!');
            $this->setDetailsField(
                $cart,
                'errorDescription',
                'Hacking attempt details',
                'Currency code doesn\'t match. Order currency: ' . $paymentCurrency
                . '; payment gateway currency: ' . $currency
            );

            $result = false;
        }

        return $result;
    }

    /**
     * Display return page 
     * 
     * @param XLite_Model_Cart $cart Cart_
     *  
     * @return void
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function displayReturnPage(XLite_Model_Cart $cart)
    {
        $backUrl = $this->xlite->getShopUrl(
            XLite_Core_Converter::buildURL(
                'checkout',
                'return',
                array('order_id' => $cart->get('order_id'))
            ),
            $this->config->Security->customer_security
        );


        $page = <<<HTML
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<body onload="javascript: document.location = '$backUrl;';">
If you are not redirected within 5 seconds, please <a href="$backUrl">click here to return to the shopping cart</a>.
</body>
</html>
HTML;

        echo ($page);

        exit (0);
    }
}