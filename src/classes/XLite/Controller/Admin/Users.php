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
 * PHP version 5.3.0
 *
 * @category  LiteCommerce
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @see       ____file_see____
 * @since     1.0.0
 */

namespace XLite\Controller\Admin;

/**
 * Users list controller
 * TODO: Rewrite the search functionality using sessionCell and ItemsList
 * (in similar way as it was done for products). Remove hardcoded session cell admin_users_search
 * 
 * @see   ____class_see____
 * @since 1.0.0
 */
class Users extends \XLite\Controller\Admin\AAdmin
{
    /**
     * users 
     * 
     * @var   array
     * @see   ____var_see____
     * @since 1.0.0
     */
    protected $users = null;


    /**
     * Return the current page title (for the content area)
     *
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getTitle()
    {
        return 'Search user profiles';
    }

    /**
     * getSearchParams 
     * 
     * @param string $paramName Parameter name OPTIONAL
     *  
     * @return mixed
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getSearchParams($paramName = null)
    {
        $searchParams = \XLite\Core\Session::getInstance()->admin_users_search;

        $searchParams = isset($searchParams) ? $searchParams : new \XLite\Core\CommonCell();

        $searchParams->order_id = 0;

        if (isset($paramName)) {

            $result = isset($searchParams->$paramName) ? $searchParams->$paramName : null;

            if (
                isset($result) 
                && in_array($paramName, array('startDate', 'endDate'))
            ) {
                $result = strtotime($result);
            }
        
        } else {

            $result = $searchParams;
        }

        return $result;
    }

    /**
     * isAdvancedOptionSelected 
     * 
     * @return boolean 
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function isAdvancedOptionSelected()
    {
        $result = false;
        
        $searchParams = $this->getSearchParams();

        $fields = $this->getAdvancedSearchFields();

        foreach ($fields as $fieldName => $defaultValue) {

            if (
                isset($searchParams->$fieldName) 
                && $defaultValue != $searchParams->$fieldName
            ) {
                $result = true;

                break;
            }
        }

        return $result;
    }

    /**
     * Get users according to the search conditions
     * 
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getUsers()
    {
        $mode = (isset(\XLite\Core\Request::getInstance()->mode) ? \XLite\Core\Request::getInstance()->mode : '');

        $searchParams = $this->getSearchParams();

        if ('search' == $mode) {
            
            if (!isset($this->users)) {

                $this->users = \XLite\Core\Database::getRepo('XLite\Model\Profile')->search($searchParams);
            }
        }

        return $this->users;
    }

    /**
     * Get count of users found
     * 
     * @return integer 
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getUsersCount()
    {
        return count($this->getUsers());
    }


    /**
     * Common method to determine current location
     *
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getLocation()
    {
        return $this->t('Search user profiles');
    }

    /**
     * init 
     * 
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function doActionOrders()
    {
        $this->searchOrders();

        $this->redirect();
    }

    /**
     * Do action 'search' - save search parameters in the session
     * 
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function doActionSearch()
    {
        $postedData = \XLite\Core\Request::getInstance()->posted_data;

        $this->setSearchParams($postedData);

        $this->setReturnURL($this->buildURL('users', '', array('mode' => 'search')));
    }

    /**
     * Do action 'reset' - reset search parameters in the session
     * 
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function doActionReset()
    {
        $this->setSearchParams(null);

        $this->setReturnURL($this->buildURL('users', '', array('mode' => 'search')));
    }

    /**
     * setSearchParams 
     * 
     * @param array $data Array of search parameters in format of 'fieldName' => 'fieldValue'
     *  
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function setSearchParams($data)
    {
        $searchParams = new \XLite\Core\CommonCell(); 

        if (isset($data) && is_array($data)) {

            foreach ($data as $key => $value) {

                $searchParams->$key = $value;
            }
        }

        \XLite\Core\Session::getInstance()->admin_users_search = $searchParams;
    }

    /**
     * Returns the advanced search form fields in format 'fieldName' => 'defaultValue'
     * 
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getAdvancedSearchFields()
    {
        return array(
            'user_type'       => '',
            'membership'      => '%',
            'state'           => 0,
            'country'         => '',
            'address_pattern' => '',
            'phone'           => '',
            'date_type'       => '',
        );
    }

    /**
     * searchOrders 
     * 
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function searchOrders()
    {
        $profile = \XLite\Core\Database::getRepo('XLite\Model\Profile')
            ->find(\XLite\Core\Request::getInstance()->profile_id);

        if (isset($profile)) {

            $login = $profile->getLogin();

            $urlParams = array(
                'mode'  => 'search',
                'login' => $login,
            );

            $this->setReturnURL($this->buildURL('order_list', '', $urlParams));

        } else {

            $this->setReturnURL($this->backURL);
        }
    }
}
