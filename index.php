<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package byou
 */

get_header();
?>

    <main class="main__page">

		<?php
        if ( have_posts() ) :

          get_template_part( 'template-parts/content' );

        endif;
		?>

    </main>

<?php
get_footer();
