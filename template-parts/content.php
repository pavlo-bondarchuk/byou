<?php
/**
 * Template part for displaying posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package byou
 */

?>

<?php
	if ( is_home() && !is_front_page() ) :
		get_template_part( 'template-parts/content', 'archive' );
	endif;

	if ( is_single( 'post' ) ) :
		get_template_part( 'template-parts/content', 'post' );
	endif;?>

