<?php if ( ! defined( 'ABSPATH' ) ) { die; } // If this file is called directly, abort.

/**
 * The script-specific functionality of the plugin.
 *
 * @link       https://dipendrapancholi.in/
 * @since      1.0.0
 *
 * @package    WP_FABCAL
 * @subpackage WP_FABCAL/script
 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
 */
class Wp_Fabcal_Script {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @package    WP_FABCAL
	 * @subpackage WP_FABCAL/script
	 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
	 */
	public function __construct() {

	}

	/**
	 * Enqueue AJAX script for comment handling
	 * 
	 * @since      1.0.0
	 * @package    WP_FABCAL/script
	 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
	 */

	function wpfabcal_enqueue_scripts() {
	    
	    $wpfabcal_options = get_option( 'wpfabcal_options' );

		wp_register_style( 'wpfabcal-css', WP_FABCAL_PUBLIC_URL . '/assets/css/fabric-calculator.css', null, WP_FABCAL_VERSION );
		wp_register_script( 'wpfabcal-js', WP_FABCAL_PUBLIC_URL . '/assets/js/fabric-calculator.js', array( 'jquery' ), WP_FABCAL_VERSION, true);
	}

	/**
	 * Add Actions/Hooks
	 *
	 * @since      1.0.0
	 * @package    WP_FABCAL
	 * @subpackage WP_FABCAL/script
	 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
	 */
	public function add_actions() {

		// Enqueue JS & CSS in WordPress Frontend
		add_action( 'wp_enqueue_scripts', [$this, 'wpfabcal_enqueue_scripts'] );
	}

} // End Of Class