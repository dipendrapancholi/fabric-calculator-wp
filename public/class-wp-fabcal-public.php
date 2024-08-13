<?php if ( ! defined( 'ABSPATH' ) ) { die; } // If this file is called directly, abort.

/**
 * The public-specific functionality of the plugin.
 *
 * @link       https://dipendrapancholi.in/
 * @since      1.0.0
 *
 * @package    WP_FABCAL
 * @subpackage WP_FABCAL/public
 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
 */
class Wp_Fabcal_Public {
	
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @package    WP_FABCAL
	 * @subpackage WP_FABCAL/public
	 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
	 */
	public function __construct() {

	}

	/**
	 * Display uploads and approval form on the order details page
	 * 
	 * @since      1.0.0
	 * @package    WP_FABCAL/public
	 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
	 */ 
	function wcofua_fabric_calculator_shortcode( $atts, $content = "" ) {

		$wpfabcal_options = get_option( 'wpfabcal_options' );
		$wcofua_atts = shortcode_atts( $wpfabcal_options, $atts, 'fabric_calculator' );
		wp_enqueue_style( 'wpfabcal-css' );
		wp_enqueue_script( 'wpfabcal-js' );

		ob_start();
		?>

	    <div id="wcofua-fabric-calculator" class="fabric-calculator-container">
	    	
	    	<!-- Heading -->
	    	<?php if( !empty( $wcofua_atts['heading'] ) ) { ?>
	        	<h2 class="fabric-calculator-heading"><?php echo esc_html( $wcofua_atts['heading'] );?></h2>
	    	<?php }?>
	        
	        <form id="wcofua-fabric-calculator-form" class="fabric-calculator-form">

	        	<!-- Form -->
	        	<div class="form-group">
		            <label for="wcofua-material-width" class="form-label"><?php echo esc_html( __( 'Material Width', 'fabric-calculator-wp' ) . '(' . $wcofua_atts['measurement'] . '):' );?></label>
		            <input value="<?php echo esc_attr( $wcofua_atts['material_width'] );?>" type="number" id="wcofua-material-width" name="wcofua-material-width" class="form-input" required>
		        </div>
	            
		        <div class="form-group">
		            <label for="wcofua-material-height" class="form-label"><?php echo esc_html( __( 'Material Height', 'fabric-calculator-wp' ) . '(' . $wcofua_atts['measurement'] . '):' );?></label>
		            <input value="<?php echo esc_attr( $wcofua_atts['material_height'] );?>" type="number" id="wcofua-material-height" name="wcofua-material-height" class="form-input" required>
		            <br>
		        </div>

		        <div class="form-group">
		            <label for="wcofua-piece-width" class="form-label"><?php echo esc_html( __( 'Piece Width', 'fabric-calculator-wp' ) . '(' . $wcofua_atts['measurement'] . '):' );?></label>
		            <input value="<?php echo esc_attr( $wcofua_atts['piece_width'] );?>" type="number" id="wcofua-piece-width" name="wcofua-piece-width" class="form-input" required>
		            <br>
		        </div>

		        <div class="form-group">
		            <label for="wcofua-piece-height" class="form-label"><?php echo esc_html( __( 'Piece Height', 'fabric-calculator-wp' ) . '(' . $wcofua_atts['measurement'] . '):' );?></label>
		            <input value="<?php echo esc_attr( $wcofua_atts['piece_height'] );?>" type="number" id="wcofua-piece-height" name="wcofua-piece-height" class="form-input" required>
		            <br>
		        </div>

	            <div class="form-group">
	            	<button type="submit" class="form-button"><?php echo esc_html( __( 'Calculate', 'fabric-calculator-wp' ) );?></button>
	        	</div>

	            <input type="hidden" name="wcofua_measurement" id="wcofua-measurement" value="<?php echo esc_attr( $wcofua_atts['measurement'] );?>">
	            <input type="hidden" name="wcofua_measurement" id="wcofua-result-text" value="<?php echo esc_attr( $wcofua_atts['result_text'] );?>">
	        </form>

	        <!-- Result Section -->
	        <div id="wcofua-fabric-calculator-result" class="fabric-calculator-result">
	            <h3 class="result-heading"><?php echo esc_html( __( 'Result', 'fabric-calculator-wp' ) );?>:</h3>
	            <div id="wcofua-fabric-calculator-result-text" class="result-text"></div>
	            <canvas height="0" width="0" id="wcofua-fabric-preview" class="fabric-preview"></canvas>
	        </div>
	    </div><?php 
	    
	    return ob_get_clean();
	}
	
	/**
	 * Add Actions/Hooks
	 *
	 * @since      1.0.0
	 * @package    WP_FABCAL
	 * @subpackage WP_FABCAL/public
	 * @author     Dipendra Pancholi <dipendra.pancholi@gmail.com>
	 */
	public function add_actions() {

		// Display uploads and approval form on the order details page
		add_shortcode( 'fabric_calculator', [$this, 'wcofua_fabric_calculator_shortcode'] );
	}

} // End Of Class