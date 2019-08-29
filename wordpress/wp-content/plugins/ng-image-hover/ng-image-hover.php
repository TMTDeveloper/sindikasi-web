<?php
/*
 * Plugin Name: NG Image Hover Effect
 * Plugin URI: https://www.nosegraze.com/image-hover-effect-wordpress/
 * Description: Simple shortcode that shows hidden text when you hover over an image.
 * Version: 1.0
 * Author: Nose Graze
 * Author URI: https://www.nosegraze.com
 * License: GPL2
 * 
 * @package ng-image-hover
 * @copyright Copyright (c) 2015, Nose Graze Ltd.
 * @license GPL2+
*/

/**
 * Shortcode
 *
 * Creates our shortcode for the image hover effect.
 *
 * @param array  $atts    Attributes for this shortcode.
 * @param string $content Content in between the shortcode tags.
 *
 * @return string
 */
function ng_image_hover_shortcode( $atts, $content = '' ) {
	$atts = shortcode_atts( array(
		'image' => '',
		'alt'   => ''
	), $atts, 'hover-effect' );

	ob_start();
	?>
	<div class="ng-image-hover">
		<img src="<?php echo esc_url( $atts['image'] ); ?>" alt="<?php echo esc_attr( $atts['alt'] ); ?>">

		<div class="ng-image-hover-text">
			<?php echo do_shortcode( $content ); ?>
		</div>
	</div>
	<?php
	return ob_get_clean();

}

add_shortcode( 'hover-effect', 'ng_image_hover_shortcode' );

/**
 * Add CSS
 *
 * Includes our stylesheet on the front-end of the site.
 *
 * @return void
 */
function ng_image_hover_css() {
	wp_enqueue_style( 'ng-image-hover', plugins_url( 'ng-image-hover.css', __FILE__ ), array(), '1.0.0' );
}

add_action( 'wp_enqueue_scripts', 'ng_image_hover_css' );