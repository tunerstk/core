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

namespace XLite\Model\QueryBuilder;

/**
 * Abstract query builder 
 * 
 * @see   ____class_see____
 * @since 1.0.0
 */
abstract class AQueryBuilder extends \Doctrine\ORM\QueryBuilder
{
    /**
     * Get result 
     * 
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getResult()
    {
        return $this->getQuery()->getResult();
    }

    /**
     * Get single result 
     * 
     * @return \XLite\Model\AEntity|void
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getSingleResult()
    {
        try {
            $entity = $this->getQuery()->getSingleResult();

        } catch (\Doctrine\ORM\NonUniqueResultException $exception) {
            $entity = null;

        } catch (\Doctrine\ORM\NoResultException $exception) {
            $entity = null;
        }
            
        return $entity;    
    }

    /**
     * Get single scalar result 
     * 
     * @return mixed
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getSingleScalarResult()
    {
        try {
            $scalar = $this->getQuery()->getSingleScalarResult();

        } catch (\Doctrine\ORM\NonUniqueResultException $exception) {
            $scalar = null;

        } catch (\Doctrine\ORM\NoResultException $exception) {
            $scalar = null;
        }

        return $scalar;
    }

    /**
     * Execute query
     * 
     * @return mixed
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function execute()
    {
        return $this->getQuery()->execute();
    }
}
