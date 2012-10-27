<?php if (!defined("BASEPATH")) exit('No direct script access allowed.');

/**
 * ExpressionEngine EE-PHP-GA plugin
 *
 * This file must be in your /system/third_party/phpga directory of your ExpressionEngine installation
 * Usage: {exp:phpga:trackPageview ga_account_id="UA-XXXXXXX-X" domainname="your-domainname.com" pagetitle="{title}"}
 *
 * @package     EE-PHP-GA
 * @category    Plugin
 * @author      Denver Sessink <dsessink@gmail.com>
 * @link        https://github.com/denvers/EE-PHP-GA
 * @copyright   Copyright (c) 2012 Denver Sessink
 */

//error_reporting(E_ALL);
//ini_set('display_errors', true);

require_once(dirname(__FILE__) . "/settings.php");
require_once(dirname(__FILE__) . "/autoload.php");

use UnitedPrototype\GoogleAnalytics;

$plugin_info = array(
    'pi_name' => ADDON_NAME,
    'pi_version' => ADDON_VERSION,
    'pi_author' => 'Denver Sessink',
    'pi_author_url' => 'https://github.com/denvers/EE-PHP-GA',
    'pi_description' => ADDON_DESCRIPTION,
    'pi_usage' => '{exp:phpga:trackPageview ga_account_id="UA-XXXXXXX-X" domainname="your-domainname.com" pagetitle="{title}"}',
);

/**
 * Class Phpga
 */
class Phpga
{
    /**
     * @var string
     */
    private $return_data;

    /**
     * Constructor
     *
     * @return Phpga
     */
    function Phpga()
    {
        $this->EE =& get_instance();
    }

    /**
     * Checks PHP version (needs 5.3+)
     *
     * @return bool|string
     */
    private function _runCompatibilityCheck()
    {
        if (!$this->_compatiblePhpVersion()) {
            // Show message in HTML comment
            $this->return_data = "<!-- EE-PHP-GA really needs PHP version 5.3+. You are running " . $this->_getCurrentPhpVersion() . " -->";
            return $this->return_data;
        }

        return true;
    }

    /**
     * @param $account_id
     * @param $domainname
     * @return UnitedPrototype\GoogleAnalytics\Tracker
     */
    private function _initTracker($account_id, $domainname)
    {
        return new GoogleAnalytics\Tracker($account_id, $domainname);
    }

    /**
     * trackPageview with Google Analytics
     *
     * @return string
     */
    public function trackPageview()
    {
        $this->_runCompatibilityCheck();

        try {

            // Initilize GA Tracker
            $tracker = $this->_initTracker(
                $this->EE->TMPL->fetch_param('ga_account_id'),
                $this->EE->TMPL->fetch_param('domainname')
            );

            // Assemble Page information
            $page = new GoogleAnalytics\Page($this->EE->uri->uri_string());
            $page->setTitle($this->EE->TMPL->fetch_param('pagetitle'));

            // Assemble Session information
            // (could also get unserialized from PHP session)
            $session = new GoogleAnalytics\Session();

            // Assemble Visitor information
            // (could also get unserialized from database)
            $visitor = new GoogleAnalytics\Visitor();
            $visitor->setIpAddress($_SERVER['REMOTE_ADDR']);
            $visitor->setUserAgent($_SERVER['HTTP_USER_AGENT']);
            $visitor->setScreenResolution('1024x768'); // TODO

            // Track pageview
            $tracker->trackPageview($page, $session, $visitor);
        } catch (Exception $ex) {
            $this->return_data = "<!-- EE-PHP-GA exception: " . $ex->getMessage() . " -->";
            return $this->return_data;
        }

        $this->return_data = "<!-- EE-PHP-GA: page tracking OK! -->";
        return $this->return_data;
    }

    /**
     * Checks if used PHP version is compatible with this addon
     *
     * @return bool
     */
    private function _compatiblePhpVersion()
    {
        $phpversion = $this->_getCurrentPhpVersion();
        if ($phpversion < 5.3) {
            return false;
        }

        return true;
    }

    /**
     * Find out what the current PHP version is
     *
     * @return  double (eg. 5.3.12)
     */
    private function _getCurrentPhpVersion()
    {
        defined('PHP_VERSION') || define('PHP_VERSION', phpversion());
        return PHP_VERSION;
    }

    /**
     * Plugin usage
     *
     * @return    string
     */
    function usage()
    {
        ob_start();
        ?>
    *** EXAMPLE ***
    {exp:phpga:trackPageview ga_account_id="UA-XXXXXXX-X" domainname="your-domainname.com" pagetitle="{title}"}

    <?php
        $buffer = ob_get_contents();

        ob_end_clean();

        return $buffer;
    }
}

/* End of file pi.phpga.php */