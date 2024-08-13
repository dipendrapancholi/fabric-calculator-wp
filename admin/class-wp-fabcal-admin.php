<?php if ( ! defined( 'ABSPATH' ) ) { die; } // If this file is called directly, abort.

use Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://dipendrapancholi.in/
 * @since      1.0.0
 *
 * @package    WP_FABCAL
 * @subpackage WP_FABCAL/admin
 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
 */
class Wp_Fabcal_Admin {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @package    WP_FABCAL
	 * @subpackage WP_FABCAL/admin
	 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
	 */
	public function __construct() {

	}

	/**
	 * Add setting menu
	 * 
	 * @since      1.0.0
	 * @package    WP_FABCAL/admin
	 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
	 */
	function wpfabcal_fabric_calculator_settings_menu() {
	    add_menu_page(
			__( 'Fabric Calculator', 'fabric-calculator-wp' ),
			__( 'Fabric Calculator', 'fabric-calculator-wp' ),
			'manage_options',
			'wpfabcal-settings',
			[$this, 'wpfabcal_fabric_calculator_settings_page'],
			'dashicons-screenoptions'
	    );
	}

	/**
	 * Add setting menu page content
	 * 
	 * @since      1.0.0
	 * @package    WP_FABCAL/admin
	 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
	 */
	function wpfabcal_fabric_calculator_settings_page() {

	    if (!current_user_can('manage_options')) {
	        return;
	    }

	    // WP Fabric Calculator Options
	    $wpfabcal_options = get_option( 'wpfabcal_options' );

	    ?>
	    <div class="wrap">
	        <h1><?php esc_html_e( 'Fabric Calculator Settings', 'wc-ofua' ) ?></h1>
	        <form method="post">
	            <table class="form-table">
	            	<?php 
					
					wp_nonce_field( 'wpfabcal_save_settings', 'wpfabcal_setting_fields' );
					
					/*
	            	<tr>
	                    <th scope="row">
	                    	<label for="wpfabcal_options_enable_heading"><?php esc_html_e( 'Enable Heading', 'fabric-calculator-wp') ?></label>
	                    </th>
	                    <td><?php 
	                    	
	                    	$checked = '';
	                    	if( !empty( $wpfabcal_options['enable_heading'] ) ) {
	                    		$checked = 'checked="checked"';
	                    	}
	                    	?>
	                    	
	                    	<input type="checkbox" value="1" name="wpfabcal_options[enable_heading]" id="wpfabcal_options_enable_heading" <?php echo $checked;?> > <?php echo __( 'Enable Heading', 'fabric-calculator-wp' );?>
	                    </td>
	                </tr>
	                */?>

	                <tr>
	                    <th scope="row">
	                    	<label for="wpfabcal_options_heading"><?php esc_html_e( 'Form Heading', 'fabric-calculator-wp') ?></label>
	                    </th>
	                    <td>
	                    	<input name="wpfabcal_options[heading]" type="text" id="wpfabcal_options_heading" value="<?php echo isset( $wpfabcal_options['heading'] ) ? esc_attr( $wpfabcal_options['heading'] ) : ''; ?>" class="regular-text"/>
	                    	<br/><i><?php esc_html_e('Example: Fabric Calculator', 'fabric-calculator-wp') ?></i>
	                    </td>
	                </tr>

	                <tr>
	                    <th scope="row">
	                    	<label for="wpfabcal_options_measurement"><?php esc_html_e( 'Measurement', 'fabric-calculator-wp') ?></label>
	                    </th>
	                    <td>
	                    	<input name="wpfabcal_options[measurement]" type="text" id="wpfabcal_options_measurement" value="<?php echo isset( $wpfabcal_options['measurement'] ) ? esc_attr( $wpfabcal_options['measurement'] ) : ''; ?>" />
	                    	<br/><i><?php esc_html_e('Example: Meter, CM, Inch, Feet etc', 'fabric-calculator-wp') ?></i>
	                    </td>
	                </tr>

	                <tr>
	                    <th scope="row">
	                    	<label for="wpfabcal_options_material_width"><?php esc_html_e( 'Default Material Width', 'fabric-calculator-wp') ?></label>
	                    </th>
	                    <td>
	                    	<input name="wpfabcal_options[material_width]" type="number" id="wpfabcal_options_material_width" value="<?php echo isset( $wpfabcal_options['material_width'] ) ? esc_attr( $wpfabcal_options['material_width'] ) : ''; ?>" class="small-text"/>
	                    </td>
	                </tr>

	                <tr>
	                    <th scope="row">
	                    	<label for="wpfabcal_options_material_height"><?php esc_html_e( 'Default Material Height', 'fabric-calculator-wp') ?></label>
	                    </th>
	                    <td>
	                    	<input name="wpfabcal_options[material_height]" type="number" id="wpfabcal_options_material_height" value="<?php echo isset( $wpfabcal_options['material_height'] ) ? esc_attr( $wpfabcal_options['material_height'] ) : ''; ?>" class="small-text"/>
	                    </td>
	                </tr>

	                <tr>
	                    <th scope="row">
	                    	<label for="wpfabcal_options_piece_width"><?php esc_html_e( 'Default Piece Width', 'fabric-calculator-wp') ?></label>
	                    </th>
	                    <td>
	                    	<input name="wpfabcal_options[piece_width]" type="number" id="wpfabcal_options_piece_width" value="<?php echo isset( $wpfabcal_options['piece_width'] ) ? esc_attr( $wpfabcal_options['piece_width'] ) : ''; ?>" class="small-text"/>
	                    </td>
	                </tr>

	                <tr>
	                    <th scope="row">
	                    	<label for="wpfabcal_options_piece_height"><?php esc_html_e( 'Default Piece Height', 'fabric-calculator-wp') ?></label>
	                    </th>
	                    <td>
	                    	<input name="wpfabcal_options[piece_height]" type="number" id="wpfabcal_options_piece_height" value="<?php echo isset( $wpfabcal_options['piece_height'] ) ? esc_attr( $wpfabcal_options['piece_height'] ) : ''; ?>" class="small-text"/>
	                    </td>
	                </tr>

	                <tr>
	                    <th scope="row">
	                    	<label for="wpfabcal_options_result_text"><?php esc_html_e( 'Result Text', 'fabric-calculator-wp') ?></label>
	                    </th>
	                    <td>
	                    	<textarea rows="5" class="regular-text" name="wpfabcal_options[result_text]" id="wpfabcal_options_result_text"><?php echo isset( $wpfabcal_options['result_text'] ) ? esc_attr( $wpfabcal_options['result_text'] ) : ''; ?></textarea>
	                    	
	                    	<br/><i><?php esc_html_e( '{totalPieces}: Best possible number of piece', 'fabric-calculator-wp' ) ?></i>
	                    	<br/><i><?php esc_html_e( '{bestPieceWidth}: Best piece width', 'fabric-calculator-wp' ) ?></i>
	                    	<br/><i><?php esc_html_e( '{bestPieceHeight}: Best piece height', 'fabric-calculator-wp' ) ?></i>
	                    </td>
	                </tr>

	                
	            </table>
	            
	            <!-- Add more settings as needed -->
	            <p class="submit">
	            	<input type="submit" name="wpfabcal_save_settings" id="wpfabcal_save_settings" class="button button-primary" value="Save Changes">
	            </p>
	        </form>
	    </div>
	    <?php
	}

	/**
	 * Setting options register
	 * 
	 * @since      1.0.0
	 * @package    WP_FABCAL/admin
	 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
	 */
	function wpfabcal_fabric_calculator_save_settings() {

	    if( !empty($_POST['wpfabcal_save_settings'] ) && ( !empty($_POST['wpfabcal_options'] ) ) ) {

			if ( ! isset( $_POST['wpfabcal_setting_fields'] ) || ! wp_verify_nonce( $_POST['wpfabcal_setting_fields'], 'wpfabcal_save_settings' ) ) {
				wp_die( esc_html( __( 'Sorry, your nonce did not verify.', 'fabric-calculator-wp' ) ) );
			} else {
	        	update_option( 'wpfabcal_options', $_POST['wpfabcal_options'] );
			}
	    }
	}

	/**
	 * Add Actions/Hooks
	 *
	 * @since      1.0.0
	 * @package    WP_FABCAL
	 * @subpackage WP_FABCAL/admin
	 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
	 */
	public function add_actions() {

		// Add file upload settings in backend
		add_action( 'admin_menu', [$this, 'wpfabcal_fabric_calculator_settings_menu'] );
		add_action( 'admin_init', [$this, 'wpfabcal_fabric_calculator_save_settings'] );
	}

} // End Of Class