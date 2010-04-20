{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Payment / shipping methods step
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}
<widget template="checkout/cart.tpl" />

<div class="shipping-estimator">
  <widget class="XLite_View_Form_Checkout_ShippingMethod" name="shipping_method" />
    <widget template="shopping_cart/delivery.tpl">
  <widget name="shipping_method" end />
</div>

<widget mode="paymentMethod" template="payment_method.tpl" />

