<?php if (!defined("BASEPATH")) exit('No direct script access allowed.');

//error_reporting(E_ALL);
//ini_set('display_errors', true);

require_once(dirname(__FILE__) . "/settings.php");
require_once(dirname(__FILE__) . "/autoload.php");

use UnitedPrototype\GoogleAnalytics;

$plugin_info       = array(
    'pi_name'        => ADDON_NAME,
    'pi_version'     => ADDON_VERSION,
    'pi_author'      => 'Denver Sessink',
    'pi_author_url'  => '',
    'pi_description' => ADDON_DESCRIPTION,
    'pi_usage'       => '{exp:phpga:trackPageView ga_account_id="" domainname="denver.com"}',
);

/**
 * Extension File for php-ga
 *
 * This file must be in your /system/third_party/phpga directory of your ExpressionEngine installation
 * Usage: {exp:phpga:trackPageView ga_account_id="UA-XXXXXXX-X" domainname="your-domainname.com" pagetitle="{title}"}
 *
 * @package             com.denversessink.phpga
 * @author              Denver Sessink (dsessink@gmail.com)
 * @copyright           Copyright (c) 2012 Denver Sessink
 */
class Phpga
{
    public $return_data = '';

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
     * trackPageView with Google Analytics
     *
     * @return string
     */
    public function trackPageView()
    {
        if (!$this->compatiblePhpVersion())
        {
            // Show message in HTML comment
            $this->return_data = "<!-- php-ga really needs PHP version 5.3+. You are running ".$this->getCurrentPhpVersion()." -->";
            return $this->return_data;
        }

        try {
            $ga_account_id = $this->EE->TMPL->fetch_param('ga_account_id');
            $domainname = $this->EE->TMPL->fetch_param('domainname');
            $pagetitle = $this->EE->TMPL->fetch_param('pagetitle');

            // Initilize GA Tracker
            $tracker = new GoogleAnalytics\Tracker($ga_account_id, $domainname);

            // Assemble Visitor information
            // (could also get unserialized from database)
            $visitor = new GoogleAnalytics\Visitor();
            $visitor->setIpAddress($_SERVER['REMOTE_ADDR']);
            $visitor->setUserAgent($_SERVER['HTTP_USER_AGENT']);
            $visitor->setScreenResolution('1024x768'); // TODO

            // Assemble Session information
            // (could also get unserialized from PHP session)
            $session = new GoogleAnalytics\Session();

            // Assemble Page information
            $page = new GoogleAnalytics\Page($this->EE->uri->uri_string());
            $page->setTitle($pagetitle);

            // Track page view
            $tracker->trackPageview($page, $session, $visitor);
        }
        catch( Exception $ex )
        {
            $this->return_data = "<!-- php-ga exception: ".$ex->getMessage()." -->";
            return $this->return_data;
        }

        $this->return_data = "<!-- php-ga: Current page tracked. -->";
        return $this->return_data;
    }

    /**
     * Checks if used PHP version is compatible with this addon
     *
     * @return bool
     */
    private function compatiblePhpVersion()
    {
        $phpversion = $this->getCurrentPhpVersion();
        if ( $phpversion < 5.3 )
        {
            return false;
        }

        return true;
    }

    /**
     * Find out what the current PHP version is
     *
     * @return  double (eg. 5.3.12)
     */
    private function getCurrentPhpVersion()
    {
        defined('PHP_VERSION') || define('PHP_VERSION', phpversion());
        return PHP_VERSION;
    }

    /**
     * Plugin usage
     *
     * @return	string
     */
    function usage()
    {
        ob_start();
        ?>
    *** EXAMPLE ***
    {exp:phpga:trackPageView ga_account_id="" domainname="denver.com"}

    <?php
        $buffer = ob_get_contents();

        ob_end_clean();

        return $buffer;
    }
}

/* End of file ext.phpga.php */