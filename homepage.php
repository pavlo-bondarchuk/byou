<?php
/** Template Name: Homepage */
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