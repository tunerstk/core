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

class XLite_Tests_Model_Image_Product_Detailed extends XLite_Tests_TestCase
{
    protected $product;

    protected $images = array(
        'demo_store_p4004.jpeg',
        'demo_store_d4004_1.jpeg',
        'demo_store_d4012_1.jpeg',
    );

    protected function setUp()
    {
        parent::setUp();

        \XLite\Core\Database::getEM()->clear();
    }

    public function testCreate()
    {
        foreach ($this->getProduct()->getDetailedImages() as $n => $i) {
            $this->assertTrue(in_array($i->getPath(), $this->images), 'check path (' . $n . ')');
            $this->assertEquals($i->getPath(), $i->getAlt(), 'check path & alt equals (' . $n . ')');
            $this->assertTrue($i->getEnabled(), 'check enabled (' . $n . ')');
            $this->assertEquals(1, $i->getOrderby(), 'check orderby (' . $n . ')');
            $this->assertFalse($i->getIsZoom(), 'check zoom (' . $n . ')');

            $this->assertEquals('image/jpeg', $i->getMime(), 'check mime type (' . $n . ')');

        }

        $i = $this->getProduct()->getDetailedImages()->get(0);

        $this->assertEquals(489, $i->getWidth(), 'check width');
        $this->assertEquals(500, $i->getHeight(), 'check height');
        $this->assertEquals(115220, $i->getSize(), 'check size');
        $this->assertTrue(is_numeric($i->getDate()), 'check date');
        $this->assertEquals('13cd524a77cf8ccc8cfad5a0d261152a', $i->getHash(), 'check hash');

        $this->assertEquals(
            $this->getProduct()->getProductId(),
            $i->getProduct()->getProductId(),
            'check product equals'
        );
    }

    public function testUpdate()
    {
        $i = $this->getProduct()->getDetailedImages()->get(0);

        $i->setAlt('test2');
        $i->setOrderby(99);
        $i->setEnabled(false);
        $i->setIsZoom(true);

        $this->assertFalse($i->setMime('image/jpg'), 'check setter fail (mime)');
        $this->assertFalse($i->setWidth(1), 'check setter fail (width)');
        $this->assertFalse($i->setHeight(1), 'check setter fail (height)');
        $this->assertFalse($i->setSize(1), 'check setter fail (size)');
        $this->assertFalse($i->setDate(1), 'check setter fail (date)');
        $this->assertFalse($i->setHash('123'), 'check setter fail (hash)');
        $this->assertFalse($i->setPath($i->getPath()), 'check setter fail (path)');

        \XLite\Core\Database::getEM()->persist($i);
        \XLite\Core\Database::getEM()->flush();

        $this->assertEquals('test2', $i->getAlt(), 'check alt');
        $this->assertEquals(99, $i->getOrderby(), 'check orderby');
        $this->assertFalse($i->getEnabled(), 'check enabled');
        $this->assertTrue($i->getIsZoom(), 'check is zoom');
    }

    public function testDelete()
    {
        $i = $this->getProduct()->getDetailedImages()->get(0);

        $id = $i->getImageId();

        $this->getProduct()->getDetailedImages()->removeElement($i);

        \XLite\Core\Database::getEM()->remove($i);
        \XLite\Core\Database::getEM()->flush();

        $i = \XLite\Core\Database::getRepo('XLite\Model\Image\Product\Detailed')
            ->find($id);

        $this->assertNull($i, 'Check removed image');
    }

    protected function getProduct()
    {
        if (!isset($this->product)) {
            $list = \XLite\Core\Database::getRepo('XLite\Model\Product')->findFrame(1, 1);

            $this->product = array_shift($list);
            foreach ($list as $p) {
                $p->detach();
            }

            // Remove old detailed images
            foreach ($this->product->getDetailedImages() as $i) {
                 \XLite\Core\Database::getEM()->remove($i);
            }
            $this->product->getDetailedImages()->clear();

            \XLite\Core\Database::getEM()->persist($this->product);
            \XLite\Core\Database::getEM()->flush();

            foreach ($this->images as $path) {
                $i = new \XLite\Model\Image\Product\Detailed();

                $i->setProduct($this->product);
                $this->product->getDetailedImages()->add($i);

                $i->loadFromLocalFile(LC_ROOT_DIR . 'images' . LC_DS . 'product_detailed_images' . LC_DS . $path);
                $i->setEnabled(true);
                $i->setAlt($path);
                $i->setOrderby(1);
            }

            \XLite\Core\Database::getEM()->persist($this->product);
            \XLite\Core\Database::getEM()->flush();

        }

        return $this->product;
    }
}