<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package byou
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function byou_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'byou_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function byou_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'byou_pingback_header' );

/**
 * Enable font size & font family selects in the editor
 */
if ( ! function_exists( 'wpex_mce_buttons' ) ) {
	function wpex_mce_buttons( $buttons ) {
		array_unshift( $buttons, 'fontselect' ); // Add Font Select
		array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
		return $buttons;
	}
}
add_filter( 'mce_buttons_2', 'wpex_mce_buttons' );

/**
 * Add custom Fonts to the Fonts list
 */
if ( ! function_exists( 'wpex_mce_google_fonts_array' ) ) {
	function wpex_mce_google_fonts_array( $initArray ) {
		$initArray['font_formats'] = 'Montserrat=Montserrat, sans-serif;Playfair Display=Playfair+Display, sans-serif;Arial=Arial, sans-serif;';
		return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_google_fonts_array' );

/**
 * Add Google Scripts for use with the editor
 */
if ( ! function_exists( 'wpex_mce_google_fonts_styles' ) ) {
	function wpex_mce_google_fonts_styles() {
		$font_url = 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap';
		add_editor_style( str_replace( ',', '%2C', $font_url ) );
	}
}
add_action( 'init', 'wpex_mce_google_fonts_styles' );

/**
 * Add Adobe Scripts for use with the editor
 */
//if ( ! function_exists( 'wpex_mce_adobe_fonts_styles' ) ) {
//	function wpex_mce_adobe_fonts_styles() {
//		$font_url = 'https://use.typekit.net/kbw6qxr.css';
//		add_editor_style( str_replace( ',', '%2C', $font_url ) );
//	}
//}
//add_action( 'init', 'wpex_mce_adobe_fonts_styles' );

/**
 * Customize mce editor font sizes
 */
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
	function wpex_mce_text_sizes( $initArray ){
		$initArray['fontsize_formats'] = "9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 31px 32px 33px 34px 35px 36px 37px 38px 39px 40px";
		return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );
	
	/**
	 * Filter Gravity Forms select field display to wrap optgroups where defined
	 * USE:
	 * set the value of the select option to `optgroup` within the form editor. The
	 * filter will then automagically wrap the options following until the start of
	 * the next option group
	 */
	
	add_filter( 'gform_field_content', 'filter_gf_select_optgroup', 10, 2 );
	function filter_gf_select_optgroup( $input, $field ) {
		if ( $field->type == 'select' ) {
			$opt_placeholder_regex = strpos($input,'gf_placeholder') === false ? '' : "<\s*?option.*?class='gf_placeholder'>[^<>]+<\/option\b[^>]*>";
			$opt_regex = "/<\s*?select\b[^>]*>" . $opt_placeholder_regex . "(.*?)<\/select\b[^>]*>/i";
			$opt_group_regex = "/<\s*?option\s*?value='optgroup\b[^>]*>([^<>]+)<\/option\b[^>]*>/i";
			
			preg_match($opt_regex, $input, $opt_values);
			$split_options = preg_split($opt_group_regex, $opt_values[1]);
			$optgroup_found = count($split_options) > 1;
			
			// sometimes first item in the split is blank
			if( strlen($split_options[0]) < 1 ){
				unset($split_options[0]);
				$split_options = array_values( $split_options );
			}
			
			if( $optgroup_found ){
				$fixed_options = '';
				preg_match_all($opt_group_regex, $opt_values[1], $opt_group_match);
				if( count($opt_group_match) > 1 ){
					foreach( $split_options as $index => $option ){
						$fixed_options .= "<optgroup label='" . $opt_group_match[1][$index] . "'>" . $option . '</optgroup>';
					}
				}
				$input = str_replace($opt_values[1], $fixed_options, $input);
			}
		}
		
		return $input;
	}
