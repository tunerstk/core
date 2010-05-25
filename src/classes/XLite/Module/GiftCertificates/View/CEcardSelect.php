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
 * @subpackage View
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

/**
 * Select e-card (customer)
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class XLite_Module_GiftCertificates_View_CEcardSelect extends XLite_View_Abstract
{
    const PARAM_GCID  = 'gcid';

    /**
     * E-cards list
     * 
     * @var    array of XLite_Module_GiftCertificates_Model_ECard
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     */
    protected $ecards = null;

    /**
     * Define widget parameters
     *
     * @return void
     * @access protected
     * @since  1.0.0
     */
    protected function defineWidgetParams()
    {
        parent::defineWidgetParams();

        $this->widgetParams += array(
            self::PARAM_GCID => new XLite_Model_WidgetParam_String('Gift certificate id', ''),
        );
    }

    /**
     * Get e-cards list
     * 
     * @return array of XLite_Module_GiftCertificates_Model_ECard
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getECards()
    {
        if (is_null($this->ecards)) {
            $eCard = new XLite_Module_GiftCertificates_Model_ECard();
            $this->ecards = $eCard->findAll('enabled = 1');
        }

        return $this->ecards;
    }

    /**
     * Get gift certificate 
     * 
     * @return XLite_Module_GiftCertificates_Model_GiftCertificate
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getGC()
    {
        if (is_null($this->gc)) {
            $this->gc = new XLite_Module_GiftCertificates_Model_GiftCertificate(
                $this->getParam(self::PARAM_GCID)
            );
        }

        return $this->gc;
    }

    /**
     * Return widget default template
     *
     * @return string
     * @access protected
     * @since  3.0.0
     */
    protected function getDefaultTemplate()
    {
        if ($this->xlite->GiftCertificates_wysiwyg_work) {
            $result = 'modules/GiftCertificates/ecards.tpl';

        } elseif (XLite::isAdminZone()) {
            $result = 'modules/GiftCertificates/ecard_select.tpl';

        } else {
            $result = 'modules/GiftCertificates/ecards.tpl';
        }

        return $result;
    }

}