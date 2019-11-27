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
    die('hey , kiddo don\'t think over smart!!!');
}

// Require Autoload file to use class automatically

require_once dirname(__FILE__).'/vendor/autoload.php';

// Define Constant

define('PLUGIN_PATH',plugin_dir_path(__FILE__));
define('PLUGIN_URL',plugin_dir_url(__FILE__));
define('PLUGIN',plugin_basename(__FILE__));


use Cptmmr\Base\Activate;
use Cptmmr\Base\Deactivate;

// Runs when Activate the plugin

function cptmmrActivate(){
   Activate::activate();
}
// Runs when deactivate the plugin

function cptmmrDeactivate(){
    Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'cptmmrActivate');
register_deactivation_hook(__FILE__, 'cptmmrDeactivate');


// Starting to initialize the plugin

if (class_exists('Cptmmr\\Init')){
    Cptmmr\Init::register_services();
}

?>