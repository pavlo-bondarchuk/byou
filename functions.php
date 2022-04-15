<?php
/**
 * byou functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package byou
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

define( 'IT_URL', get_template_directory_uri() );
define( 'IT_DIR', get_template_directory() );
define( 'IT_CSS', get_template_directory_uri() . '/assets/dist/css/' );
define( 'IT_JS', get_template_directory_uri() . '/assets/dist/js/' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
require get_template_directory() . '/inc/after-theme-setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/register-widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/scripts-styles.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Register Gutenberg Blocks
 */
require IT_DIR . '/gutenberg-blocks/gutenberg-connect.php';

/**
 * Images and Iframes lazyload
 */
require IT_DIR . '/inc/lazy-load.php';

/**
 * Custom Menu Walker
 */
require IT_DIR . '/inc/walker.php';