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

namespace XLite\View\Payment;

/**
 * Payment method
 * 
 * @see   ____class_see____
 * @since 1.0.0
 *
 * @ListChild (list="admin.center", zone="admin")
 */
class Method extends \XLite\View\Dialog
{
    /**
     * Return list of targets allowed for this widget
     *
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function getAllowedTargets()
    {
        $result = parent::getAllowedTargets();
        $result[] = 'payment_method';

        return $result;
    }

    /**
     * Check widget visible 
     * 
     * @return boolean
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function isVisible()
    {
        return parent::isVisible()
            && $this->getPaymentMethod()
            && $this->getPaymentMethod()->getProcessor()->getSettingsWidget();
    }

    /**
     * Get payment method 
     * 
     * @return \XLite\Model\Payment\Metho
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getPaymentMethod()
    {
        return \XLite\Core\Database::getRepo('XLite\Model\Payment\Method')
            ->find(\XLite\Core\Request::getInstance()->method_id);
    }

    /**
     * Check - is settings widget is widget class or not
     * 
     * @return boolean
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function isWidgetSettings()
    {
        $widget = $this->getPaymentMethod()->getProcessor()->getSettingsWidget();

        return 0 === strpos($widget, '\XLite\View\\')
            || 0 === strpos($widget, '\XLite\Module\\');
    }

    
    /**
     * Return title
     *
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getHead()
    {
        return $this->getPaymentMethod()
            ? $this->getPaymentMethod()->getServiceName() . ' settings'
            : 'Payment method settings';
    }

    /**
     * Return templates directory name
     *
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getDir()
    {
        return 'payment' . LC_DS . 'method';
    }
}
