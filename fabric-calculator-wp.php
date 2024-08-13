<?php

/**
 * A plugin to calculate the best way to cut fabric pieces from a given material.
 * 
 * @link              https://dipendrapancholi.in/
 * @since             1.0.0
 * @package           WP_FABCAL
 *
 * @wordpress-plugin
 * Plugin Name:       Fabric Calculator WP
 * Plugin URI:        https://dipendrapancholi.in/
 * Description:       A plugin to calculate the best way to cut fabric pieces from a given material.
 * Version:           1.0.0
 * Author:            Dipendra Pancholi
 * Author URI:        https://dipendrapancholi.in/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fabric-calculator-wp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) || ! defined( 'ABSPATH' ) ) {
    die;
}

global  $wpdb;

define( 'WP_FABCAL_VERSION', '1.0.0' ); // Current Plugin Version

if( !defined( 'WP_FABCAL_URL' ) ) {
    define( 'WP_FABCAL_URL', plugin_dir_url( __FILE__ ) ); // Plugin URL
}
if( !defined( 'WP_FABCAL_DIR' ) ) {
    define( 'WP_FABCAL_DIR', dirname( __FILE__ ) ); // Plugin Directory
}
if( !defined( 'WP_FABCAL_PUBLIC_URL' ) ) {
    define( 'WP_FABCAL_PUBLIC_URL', WP_FABCAL_URL . '/public' ); // Plugin URL
}
if( !defined( 'WP_FABCAL_PUBLIC_DIR' ) ) {
    define( 'WP_FABCAL_PUBLIC_DIR', WP_FABCAL_DIR . '/public' ); // Public Directory
}
if( !defined( 'WP_FABCAL_ADMIN_DIR' ) ) {
    define( 'WP_FABCAL_ADMIN_DIR', WP_FABCAL_DIR . '/admin' ); // Admin Directory
}
if( !defined( 'WP_FABCAL_PLUGIN_BASENAME' ) ) {
    define( 'WP_FABCAL_PLUGIN_BASENAME', basename( WP_FABCAL_DIR ) ); // Plugin Basename
}

/**
 * Load Text Domain
 * 
 * This gets the plugin ready for translation.
 * 
 * @since      1.0.0
 * @package    WP_FABCAL
 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
 * 
 */
function wpfabcal_load_textdomain() {
    
    // Set filter for plugins languages directory
    $wpfabcal_lang_dir   = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
    $wpfabcal_lang_dir   = apply_filters( 'wpfabcal_languages_directory', $wpfabcal_lang_dir );
    
    // Traditional WordPress plugin locale filter
    $locale = apply_filters( 'plugin_locale',  get_locale(), 'fabric-calculator-wp' );
    $mofile = sprintf( '%1$s-%2$s.mo', 'fabric-calculator-wp', $locale );
    
    // Setup paths to current locale file
    $mofile_local   = $wpfabcal_lang_dir . $mofile;
    $mofile_global  = WP_LANG_DIR . '/' . WP_FABCAL_DIR . '/' . $mofile;
    
    if ( file_exists( $mofile_global ) ) { // Look in global /wp-content/languages/fabric-calculator-wp folder
        load_textdomain( 'fabric-calculator-wp', $mofile_global );
    } elseif ( file_exists( $mofile_local ) ) { // Look in local /wp-content/plugins/fabric-calculator-wp/languages/ folder
        load_textdomain( 'fabric-calculator-wp', $mofile_local );
    } else { // Load the default language files
        load_plugin_textdomain( 'fabric-calculator-wp', false, $wpfabcal_lang_dir );
    }
}

/**
 * Register Activation Hook
 * 
 * @since      1.0.0
 * @package    WP_FABCAL
 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
 * 
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-fabcal-activator.php
 */
function activate_wpfabcal() {

    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-fabcal-activator.php';
    Wp_Fabcal_Activator::activate();
}
register_activation_hook( __FILE__, 'activate_wpfabcal' );

/**
 * Register Deactivation Hook
 * 
 * @since      1.0.0
 * @package    WP_FABCAL
 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
 * 
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-fabcal-deactivator.php
 */
function deactivate_wpfabcal() {

    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-fabcal-deactivator.php';
    Wp_Fabcal_Deactivator::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_wpfabcal' );

/**
 * Load Plugin
 * 
 * Handles to load plugin after
 * dependent plugin is loaded
 * successfully
 * 
 * @since      1.0.0
 * @package    WP_FABCAL
 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
 * 
 */
function wpfabcal_plugin_loaded() {
    // load first plugin text domain
    wpfabcal_load_textdomain();
}
add_action( 'plugins_loaded', 'wpfabcal_plugin_loaded' );


/**
 * Include Script class file
 * 
 * @since      1.0.0
 * @package    WP_FABCAL
 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
 */
require_once ( WP_FABCAL_DIR . '/includes/class-wp-fabcal-script.php' );
$WPFABCAL_Script = new Wp_Fabcal_Script();
$WPFABCAL_Script->add_actions();

/**
 * Include Admin class file
 * 
 * @since      1.0.0
 * @package    WP_FABCAL
 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
 */
require_once ( WP_FABCAL_ADMIN_DIR . '/class-wp-fabcal-admin.php' );
$WPFABCAL_Admin = new Wp_Fabcal_Admin();
$WPFABCAL_Admin->add_actions();

/**
 * Include Public class file
 * 
 * @since      1.0.0
 * @package    WP_FABCAL
 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
 */
require_once ( WP_FABCAL_PUBLIC_DIR . '/class-wp-fabcal-public.php' );
$WPFABCAL_Public = new Wp_Fabcal_Public();
$WPFABCAL_Public->add_actions();

/**
 * Add Plugin Links
 * 
 * @since      1.0.0
 * @package    WP_FABCAL
 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
 */
function wpfabcal_add_action_links( $actions ) {

    $wpfabcal_actions[] = '<a href="' . esc_url( admin_url( 'admin.php?page=wpfabcal-settings' ) ) . '">' . esc_html__('Settings', 'fabric-calculator-wp') . '</a>';
    $wpfabcal_actions[] = '<a href="https://dipendrapancholi.in/fabric-calculator-wp" target="_blank">' . esc_html__( 'Documentation', 'fabric-calculator-wp' ) . '</a>';

    return array_merge( $wpfabcal_actions, $actions );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wpfabcal_add_action_links' );