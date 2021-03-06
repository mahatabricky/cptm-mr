<?php
/**
 * Custom Post Type Manager
 *
 * @package           mahatab/cptm-mr
 * @author            Mahatab Hossain
 * @copyright         2019 Mahatab Hossain
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Post Type Manager
 * Plugin URI:        https://mahatabricky.com/custom-post-type-manager
 * Description:       Description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mahatab Hossain
 * Author URI:        https://mahatabricky.com
 * Text Domain:       cptm-mr
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if(!defined('ABSPATH')){
    die('hey , kiddo don\'t think you are over smart!!!');
}

// Require Autoload file to use class automatically

require_once dirname(__FILE__).'/vendor/autoload.php';

// Runs when Activate the plugin

function cptmmrActivate(){
   Cptmmr\Base\Activate::activate();
}

register_activation_hook(__FILE__, 'cptmmrActivate');

// Runs when deactivate the plugin

function cptmmrDeactivate(){
    Cptmmr\Base\Deactivate::deactivate();
}

register_deactivation_hook(__FILE__, 'cptmmrDeactivate');


// Start to initialize the plugin

if (class_exists('Cptmmr\\Init')){
    Cptmmr\Init::register_services();
}

?>