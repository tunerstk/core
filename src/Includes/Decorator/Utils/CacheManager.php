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
 * @subpackage Decorator
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    GIT: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      1.0.0
 */

namespace Includes\Decorator\Utils;

/**
 * CacheManager 
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   1.0.0
 */
abstract class CacheManager extends \Includes\Decorator\Utils\AUtils
{
    /**
     * Text to display while working with cache 
     */
    const MESSAGE = 'Re-building cache, please wait...';

    /**
     * Available hooks
     */

    const HOOK_BEFORE_CLEANUP  = 'before_cleanup';
    const HOOK_BEFORE_DECORATE = 'before_decorate';
    const HOOK_BEFORE_WRITE    = 'before_write';
    const HOOK_STEP_FIRST      = 'step_first';
    const HOOK_STEP_SECOND     = 'step_second';
    const HOOK_STEP_THIRD      = 'step_third';


    /**
     * List of cache building steps 
     * 
     * @var    array
     * @access protected
     * @see    ____var_see____
     * @since  1.0.0
     */
    protected static $steps = array(
        self::STEP_FIRST,
        self::STEP_SECOND,
        self::STEP_THIRD,
    );

    /**
     * List of cache directories 
     * 
     * @var    array
     * @access protected
     * @see    ____var_see____
     * @since  1.0.0
     */
    protected static $cacheDirs = array(
        LC_COMPILE_DIR,
        LC_LOCALE_DIR,
        LC_DATACACHE_DIR,
        LC_TMP_DIR,
    );


    // ------------------------------ Dispaly message routines -

    /**
     * Get plain text notice block
     * 
     * @return string
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function getPlainMessage()
    {
        return self::MESSAGE . "\n";
    }

    /**
     * getHTMLMessageContent 
     * 
     * @return string
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function getHTMLMessageContent()
    {
        return '<table><tr><td><img src="'
            . \Includes\Utils\URLManager::getShopURL('skins/progress_indicator.gif')
            . '" alt="" /></td><td>' . self::MESSAGE . '</td></tr></table>';
    }

    /**
     * Get HTML notice block
     * 
     * @return string
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function getHTMLMessage()
    {
        return '<script type="text/javascript">document.write(\''
            . static::getHTMLMessageContent() . '\');</script>' . "\n"
            . '<html>' . "\n" . '<body>' . "\n"
            . '<noscript>' . static::getHTMLMessageContent() . '</noscript>' . "\n";
    }

    /**
     * Text to display while working with cache
     * 
     * @return null
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function showMessage()
    {
        \Includes\Utils\Operator::flush(LC_IS_CLI_MODE ? static::getPlainMessage() : static::getHTMLMessage());
    }


    // ------------------------------ Cache state indicator routines -

    /**
     * Clean up the cache rebuild indicator
     *
     * @return null
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function cleanupRebuildIndicator()
    {
        \Includes\Utils\FileManager::delete(static::getRebuildIndicatorFileName());
    }

    /**
     * Clean up the cache validity indicators
     *
     * @return null
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function cleanupCacheIndicators()
    {
        // "Step is completed" indicators
        foreach (static::getCacheStateFiles() as $file) {
            \Includes\Utils\FileManager::delete($file);
        }

        // "Step is running" indicator
        static::cleanupRebuildIndicator();
    }

    /**
     * Check and (if needed) remove the rebuild indicator file
     *
     * @return boolean
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function checkRebuildIndicatorState()
    {
        $name    = static::getRebuildIndicatorFileName();
        $content = \Includes\Utils\FileManager::read($name);

        // Only the process created the file can delete
        static::getRebuildIndicatorFileContent() != $content ?: \Includes\Utils\FileManager::delete($name);

        return (bool) $content;
    }

    /**
     * Remove cache validity indicator
     *
     * @param string $step current step name
     *
     * @return void
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function clear($step)
    {
        !($file = static::getCacheStateIndicatorFileName($step)) ?: \Includes\Utils\FileManager::delete($file);
    }

    /**
     * Return name of the file, which indicates the cache state
     *
     * @param string $step current step name
     *
     * @return string
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function getCacheStateIndicatorFileName($step)
    {
        return LC_COMPILE_DIR . '.cacheGenerated.' . $step . '.step';
    }

    /**
     * Return name of the file, which indicates if the build process started
     *
     * @return string
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function getRebuildIndicatorFileName()
    {
        return LC_VAR_DIR . '.rebuildStarted';
    }

    /**
     * Data to write into the "step completed" file indicator
     * 
     * @return string
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function getCacheStateIndicatorFileContent()
    {
        return date('r');
    }

    /**
     * Data to write into the "step started" file indicator
     *
     * @return string
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function getRebuildIndicatorFileContent()
    {
        return getmypid();
    }

    /**
     * Check if cache rebuild process is already started
     *
     * @return boolean
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function checkIfRebuildStarted()
    {
        if (static::checkRebuildIndicatorState()) {
            \Includes\ErrorHandler::fireError('Cache rebuild is already started, please wait');
        }
    }

    /**
     * Return list of cache state indicator files
     *
     * @return array
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function getCacheStateFiles()
    {
        return array_map(array('static', 'getCacheStateIndicatorFileName'), static::$steps);
    }


    // ------------------------------ Common routines to run step handlers -

    /**
     * Step started
     *
     * @param string $step current step
     *
     * @return void
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function startStep($step)
    {
        static::$step = $step;

        // Put the indicator file
        \Includes\Utils\FileManager::write(
            static::getRebuildIndicatorFileName(),
            static::getRebuildIndicatorFileContent()
        );

        static::showMessage();
    }

    /**
     * Step completed
     *
     * @param string $step current step
     *
     * @return void
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function completeStep($step)
    {
        // "Step completed" indicator
        \Includes\Utils\FileManager::write(
            static::getCacheStateIndicatorFileName($step),
            static::getCacheStateIndicatorFileContent()
        );

        // Remove the "rebuilding cache" indicator file
        static::checkRebuildIndicatorState();

        // Perform redirect (needed for two-step cache generation)
        \Includes\Utils\Operator::refresh();
    }

    /**
     * Run a step callback
     *
     * @param string $step Step name
     *
     * @return array
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function getStepCallback($step)
    {
        return array(get_called_class(), 'executeStepHandler' . ucfirst($step));
    }

    /**
     * Run a step
     * 
     * @param string $step Step name
     *  
     * @return null
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function runStep($step)
    {
        // To prevent multiple processes execution
        static::checkIfRebuildStarted();

        // Write indicator files and show the message
        static::startStep($step);

        // Perform step-specific actions
        \Includes\Utils\Operator::executeWithCustomMaxExecTime(
            \Includes\Utils\ConfigParser::getOptions(array('decorator', 'time_limit')),
            static::getStepCallback($step)
        );

        // (Un)Set indicator files and redirect
        static::completeStep($step);
    }

    /**
     * Run a step
     *
     * @param string $step Step name
     *
     * @return null
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function runStepConditionally($step)
    {
        if (static::isRebuildNeeded($step)) {
            static::runStep($step);
        }
    }


    // ------------------------------ Step handlers -

    /**
     * Run handler for the current step
     *
     * NOTE: method is public since it's called from
     * \Includes\Utils\Operator::executeWithCustomMaxExecTime()
     * 
     * @return null
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function executeStepHandlerFirst()
    {
        // Invoke plugins
        \Includes\Decorator\Utils\PluginManager::invokeHook(self::HOOK_BEFORE_CLEANUP);

        // Delete cache folders
        static::cleanupCache();

        // Load classes from "classes" (do not use cache)
        \Includes\Autoloader::switchLcAutoloadDir();

        // Invoke plugins
        \Includes\Decorator\Utils\PluginManager::invokeHook(self::HOOK_BEFORE_DECORATE);

        // Main procedure: build decorator chains
        static::getClassesTree()->walkThrough(array('\Includes\Decorator\Utils\Operator', 'decorateClass'));

        // Invoke plugins
        \Includes\Decorator\Utils\PluginManager::invokeHook(self::HOOK_BEFORE_WRITE);

        // Write class files to FS
        static::getClassesTree()->walkThrough(array('\Includes\Decorator\Utils\Operator', 'writeClassFile'));

        // Invoke plugins
        \Includes\Decorator\Utils\PluginManager::invokeHook(self::HOOK_STEP_FIRST);
    }

    /**
     * Run handler for the current step
     *
     * NOTE: method is public since it's called from
     * \Includes\Utils\Operator::executeWithCustomMaxExecTime()
     *
     * @return null
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function executeStepHandlerSecond()
    {
        // Invoke plugins
        \Includes\Decorator\Utils\PluginManager::invokeHook(self::HOOK_STEP_SECOND);
    }

    /**
     * Run handler for the current step
     *
     * NOTE: method is public since it's called from
     * \Includes\Utils\Operator::executeWithCustomMaxExecTime()
     *
     * @return null
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function executeStepHandlerThird()
    {
        // Invoke plugins
        \Includes\Decorator\Utils\PluginManager::invokeHook(self::HOOK_STEP_THIRD);
    }


    // ------------------------------ Top-level methods -

    /**
     * Main public method: rebuild classes cache
     *
     * @return null
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function rebuildCache()
    {
        foreach (static::$steps as $step) {
            static::runStepConditionally($step);
        }
    }

    /**
     * Return current step identifier
     * 
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function getCurrentStep()
    {
        return static::$step;
    }

    /**
     * Check if cache rebuild is needed
     *
     * @param string $step Current step name OPTIONAL
     *
     * @return boolean
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function isRebuildNeeded($step = null)
    {
        if (!isset($step)) {
            $step = static::getCurrentStep();
        }

        return $step ? !\Includes\Utils\FileManager::isExists(static::getCacheStateIndicatorFileName($step)) : false;
    }

    /**
     * Clean up the cache
     *
     * @return null
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected static function cleanupCache()
    {
        array_walk(static::$cacheDirs, array('\Includes\Utils\FileManager', 'unlinkRecursive'));
    }
}
