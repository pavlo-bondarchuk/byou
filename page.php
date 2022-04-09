<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package byou
 */

get_header();
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
<?php endif;
get_footer();
