<?php

namespace BarrelDirectory;

use BarrelDirectory\Includes\Api\Api_Profile;
use BarrelDirectory\Includes\Db as DB;
use BarrelDirectory\Includes\Cpt\Cpt;
use BarrelDirectory\Includes\Carbon\Fields\Members;
use BarrelDirectory\Includes\Carbon\Carbon;
use BarrelDirectory\Includes\Shortcode\Shortcode;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/*
 *
 * This file is read by WordPress to generate the plugin information in the
 * plugin admin area. This file also includes all of the dependencies used by
 * the plugin, registers the activation and deactivation functions, and defines
 * a function that starts the plugin.
 *
 * @since             0.1.0
 * @package           BarrelDirectory
 *
 * @wordpress-plugin
 * Plugin Name: Barrel Directory
 * Plugin URI: 
 * Description: A plugin that manages a directory of organization members and allows for location, position and other meta data per person/location.
 * Version: 0.1
 * Author: BarrelNY
 * Author URI: https://www.barrelny.com/
 * Text Domain: 
 * Domain Path: 
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


// Define a constant for URIs
define( 'BARREL_DIRECTORY_PATH', __DIR__ );
define( 'ENTRY_TABLE_NAME', 'directory_entries' );

// Activation/Deactivation/Delete hooks create or drop DB tables
register_activation_hook(__FILE__, array('BarrelDirectory\Includes\Db\Db_Setup', 'on_activation'));
register_deactivation_hook(__FILE__, array('BarrelDirectory\Includes\Db\Db_Setup', 'on_deactivation'));
register_uninstall_hook(__FILE__, array('BarrelDirectory\Includes\Db\Db_Setup', 'on_uninstall'));

// Include the autoloader so we can dynamically include classes.
require_once( 'autoload.php' );

// Prefix the callback with the namespace or it won't be found
add_action( 'plugins_loaded', 'BarrelDirectory\barrel_directory_init' );

// Starts the plugin by initializing classes, setting up hooks and more
function barrel_directory_init() {
	// Instantiate things (TODO: reduce this list by making a setup class)
	new Api_Profile();
	new Cpt();
	new Shortcode();
	new Carbon();
}

// Include some css (can be overridden by the theme)
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('directory_css',site_url().'/wp-content/plugins/barrel-directory/dist/bundle.css');
});
// add_action('wp_enqueue_scripts', function(){
	// wp_enqueue_script('directory_js',site_url().'/wp-content/plugins/barrel-directory/dist/bundle.js');
// });
/*
phpcs: Request workspace/configuration failed with message: Unable to locate phpcs. 
Please add phpcs to your global path or use composer dependency manager to install it in your project locally.
*/