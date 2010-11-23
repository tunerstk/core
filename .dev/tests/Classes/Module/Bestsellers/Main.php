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
 * @package    Tests
 * @subpackage Classes
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

class XLite_Tests_Module_Bestsellers_Main extends XLite_Tests_TestCase
{
    public function testGetDescription()
    {
        $this->assertEquals('This module enables bestsellers list', $this->getMain()->getDescription(), 'Wrong description');
    }

    public function testGetVersion()
    {
        $this->assertEquals('1.0', $this->getMain()->getVersion(), 'Wrong version');
    }


    public function testShowSettingsForm()
    {
        $this->assertTrue($this->getMain()->showSettingsForm(), 'Wrong flag to show settings form');
    }

    public function testGetModuleType()
    {
        $this->assertEquals(\XLite\Module\Bestsellers\Main::MODULE_GENERAL, $this->getMain()->getModuleType(), 'Wrong module type');
    }

    protected function getMain()
    {
        return new \XLite\Module\Bestsellers\Main;
    }

}
