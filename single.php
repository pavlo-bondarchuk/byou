<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package byou
 */

get_header();
?>

	<main class="main__post">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'post' );

//			if ( comments_open() || get_comments_number() ) :
//				comments_template();
//			endif;

		endwhile;
		?>

	</main>

<?php
get_footer();
