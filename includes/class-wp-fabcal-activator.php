<?php

/**
 * Fired during plugin activation
 *
 * @link       https://dipendrapancholi.in/
 * @since      1.0.0
 *
 * @package    WP_FABCAL
 * @subpackage WP_FABCAL/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    WP_FABCAL
 * @subpackage WP_FABCAL/includes
 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
 */

class Wp_Fabcal_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		$wpfabcal_options = get_option( 'wpfabcal_options' );

		if( empty( $wpfabcal_options ) ) {

			$wpfabcal_options = array(
							'heading'			=> __( 'Fabric Calculator', 'fabric-calculator-wp' ),
							//'enable_heading'	=> 1,
							'measurement'		=> __( 'Meter', 'fabric-calculator-wp' ),
							'material_width'	=> '500',
							'material_height'	=> '200',
							'piece_width'		=> '55',
							'piece_height'		=> '45',
							'result_text'		=> __( 'You can cut {totalPieces} pieces of {bestPieceWidth} x {bestPieceHeight} from the material.', 'fabric-calculator-wp' )
						);
			
			update_option( 'wpfabcal_options', $wpfabcal_options );
		}
	}
}