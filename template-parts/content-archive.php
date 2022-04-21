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

?>
<div class="archive__wrapper">
    <h1 class="archive__title"><?php single_post_title(); ?></h1>
    <div class="post__wrapper">
	<?php while ( have_posts() ) : the_post(); ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <div class="post__image"> <?php echo get_the_post_thumbnail(); ?></div>
              <h2 class="post__title"><?php the_title(); ?></h2>
              <div class="post__excerpt"> <?php echo get_the_excerpt(); ?></div>
              <a href="<?php echo get_permalink(); ?>" class="post__link">
                  <span class="post__link_text">READ MORE</span>
                  <span class="post__link_icon"></span>
              </a>
          </div>
    <?php endwhile; ?>
    </div>
</div>
<?php
$post = get_queried_object();
if ( has_blocks( $post->post_content ) ) :
	$blocks = parse_blocks( $post->post_content );
	foreach ( $blocks as $block ) : ?>
		<?php if ( strpos( $block["blockName"], 'core' ) !== false ) : ?>
          <section class="default-block-container default-space page-content">
              <div class="container-fluid">
                  <div class="editor">
										<?php echo apply_filters( 'the_content', render_block( $block ) ); ?>
                  </div>
              </div>
          </section>
		<?php else : ?>
			<?php echo render_block( $block ); ?>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
