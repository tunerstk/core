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
 * @subpackage ____sub_package____
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

/**
 * XLite_Module_FeaturedProducts_Model_Product
 * 
 * @package    XLite
 * @subpackage Model
 * @since      3.0.0
 */
class XLite_Module_FeaturedProducts_Model_Product extends XLite_Model_Product implements XLite_Base_IDecorator
{
    /**
     * Delete featured product
     * 
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function delete()
    {
        $this->db->query("DELETE FROM " . XLite_Module_FeaturedProducts_Main::FEATURED_PRODUCTS_TABLE . " WHERE product_id='" . $this->get('product_id') . "'");
        parent::delete();
    }

    /**
     * Remove all unused featured product records
     * 
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function collectGarbage()
    {
        parent::collectGarbage();

        $products_table = $this->db->getTableByAlias('products');
        $sql = "SELECT f.product_id FROM " . XLite_Module_FeaturedProducts_Main::FEATURED_PRODUCTS_TABLE . " f LEFT OUTER JOIN $products_table p ON f.product_id=p.product_id WHERE p.product_id IS NULL";
        $result = $this->db->getAll($sql);

        if (is_array($result) && count($result) > 0) {
            foreach ($result as $info) {
                $this->db->query("DELETE FROM " . XLite_Module_FeaturedProducts_Main::FEATURED_PRODUCTS_TABLE . " WHERE product_id='" . $info['product_id'] . "'");
            }
        }
    }
}