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
 * DB-based driver
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class XLite_Core_TranslationDriver_Db extends XLite_Core_TranslationDriver_ATranslationDriver
{
    /**
     * Translations 
     * 
     * @var    array
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     */
    protected $translations = array();

    /**
     * Translate label
     * 
     * @param string $name Label name
     * @param string $code Language code
     *  
     * @return string or null
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function translate($name, $code)
    {
        if (!isset($this->translations[$code])) {
            $this->translations[$code] = XLite_Core_Database::getRepo('XLite_Model_LanguageLabel')->findLabelsByCode($code);
        }

        return isset($this->translations[$code][$name]) ? $this->translations[$code][$name] : null;
    }

    /**
     * Check - valid driver or not
     * 
     * @return boolean
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function isValid()
    {
        return true;
    }

    /**
     * Reset language driver
     * 
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function reset()
    {
        $this->translations = array();
    }

}