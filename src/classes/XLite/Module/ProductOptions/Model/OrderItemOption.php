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

namespace XLite\Module\ProductOptions\Model;

/**
 * Order item options
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 * @Entity (repositoryClass="XLite\Module\ProductOptions\Model\Repo\OrderItemOption")
 * @Table (name="order_item_options")
 */
class OrderItemOption extends \XLite\Model\AEntity
{
    /**
     * Saved option unique id 
     * 
     * @var    integer
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     * @Id
     * @GeneratedValue (strategy="AUTO")
     * @Column (type="integer")
     */
    protected $id;

    /**
     * Order item unique id 
     * 
     * @var    integer
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     * @Column (type="string", length="255")
     */
    protected $item_id;

    /**
     * Order unique id 
     * 
     * @var    integer
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     * @Column (type="integer")
     */
    protected $order_id;

    /**
     * Option unique id 
     * 
     * @var    integer
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     * @Column (type="integer")
     */
    protected $option_id = 0;

    /**
     * Group option unique id 
     * 
     * @var    integer
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     * @Column (type="integer")
     */
    protected $group_id;

    /**
     * Saved option name 
     * 
     * @var    string
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     * @Column (type="string", length="255")
     */
    protected $name;

    /**
     * Saved option value
     * 
     * @var    string
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     * @Column (type="string", length="65535", nullable="false")
     */
    protected $value = '';

    /**
     * @OneToOne(targetEntity="Shipping")
     * @JoinColumn(name="shipping_id", referencedColumnName="id")
     */

    /**
     * Option group (relation)
     * 
     * @var    \XLite\Module\ProductOptions\Model\OptionGroup
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     * @OneToOne (targetEntity="XLite\Module\ProductOptions\Model\OptionGroup")
     * @JoinColumn (name="group_id", referencedColumnName="group_id")
     */
    protected $group;

    /**
     * Option (relation)
     * 
     * @var    \XLite\Module\ProductOptions\Model\Option
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     * @OneToOne (targetEntity="XLite\Module\ProductOptions\Model\Option")
     * @JoinColumn (name="option_id", referencedColumnName="option_id")
     */
    protected $option;

    /**
     * Get actual selected option name 
     * 
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getActualName()
    {
        return $this->getGroup()
            ? $this->getGroup()->getName()
            : $this->getName();
    }

    /**
     * Get actual selected option value 
     * 
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getActualValue()
    {
        return $this->getOption()
            ? $this->getOption()->getName()
            : $this->getValue();
    }
}