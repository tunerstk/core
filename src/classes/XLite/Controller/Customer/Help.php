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
class XLite_Controller_Customer_Help extends XLite_Controller_Customer_Abstract
{
    public $params = array('target', "mode");


    /**
     * Add the base part of the location path
     * 
     * @return void
     * @access protected
     * @since  3.0.0
     */
    protected function addBaseLocation()
    {
        parent::addBaseLocation();

        $this->locationPath->addNode(new XLite_Model_Location('Help zone'));
    }

    /**
     * Common method to determine current location 
     * 
     * @return array
     * @access protected 
     * @since  3.0.0
     */
    protected function getLocation()
    {
        $location = parent::getLocation();

        switch ($this->get('mode')) {
            case 'terms_conditions':
                $location = 'Terms & Conditions';
                break;
            case 'privacy_statement':
                $location = 'Privacy statement';
                break;
            case 'contactus':
                $location = 'Contact us';
                break;
        }

        return $location;
    }


    /**
     * Get page title
     *
     * @return string
     * @access public
     * @since  3.0.0
     */
    public function getTitle()
    {
        return 'Help section';
    }



    function fillForm()
    {
        if ($this->get('mode') == "contactus" ) {
            if ($this->auth->is('logged')) {
                // fill in contact us form with default values
                $this->set('email', $this->auth->getComplex('profile.login'));
                $this->set('firstname', $this->auth->getComplex('profile.billing_firstname'));
                $this->set('lastname', $this->auth->getComplex('profile.billing_lastname'));
                $this->set('address', $this->auth->getComplex('profile.billing_address'));
                $this->set('zipcode', $this->auth->getComplex('profile.billing_zipcode'));
                $this->set('city', $this->auth->getComplex('profile.billing_city'));
                $this->set('contactus_state', $this->auth->getComplex('profile.billing_state'));
                $this->set('contactus_custom_state', $this->auth->getComplex('profile.billing_custom_state'));
                $this->set('contactus_country', $this->auth->getComplex('profile.billing_country'));
                $this->set('phone', $this->auth->getComplex('profile.billing_phone'));
                $this->set('fax', $this->auth->getComplex('profile.billing_fax'));
            } else {
                $this->set('contactus_state', $this->config->getComplex('General.default_state'));
                $this->set('contactus_country', $this->config->getComplex('General.default_country'));
            }
        }
    }

    function getState()
    {
        $s = new XLite_Model_State($this->get('state_id'));
        return $s->get('state');
    }

    function getCountry()
    {
        $c = new XLite_Model_Country($this->get('country_id'));
        return $c->get('country');
    }
    
    function action_contactus()
    {
        $mailer = new XLite_Model_Mailer();
        $mailer->mapRequest();
        $st = new XLite_Model_State($_REQUEST['contactus_state']);
        if ($st->get('state_id') == -1) {
            $st->set('state', $_REQUEST['contactus_custom_state']);
        }
        $mailer->set('state', $st->get('state')); // fetch state name
        $cn = new XLite_Model_Country($_REQUEST['contactus_country']);
        $mailer->set('country', $cn->get('country')); // fetch country name
        $mailer->set('charset', $cn->get('charset'));
        $mailer->compose($this->get('email'), $this->config->getComplex('Company.support_department'), "contactus");
        $mailer->send();
        $this->set('mode', "contactusMessage");
    }

    function getCountriesStates()
    {
        if (!isset($this->_profileDialog)) {
            $this->_profileDialog = new XLite_Controller_Customer_Profile();
        }
        return $this->_profileDialog->getCountriesStates();
    }
}