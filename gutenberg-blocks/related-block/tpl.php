<?php
/**
 * Block template file: gutenberg-blocks/date-block/tpl.php
 *
 * Share Block Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'post__share' . $block['id'];
if ( !empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'post__share';
if ( !empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( !empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}
?>
<?php
if ( isset( $block['data']['preview_image_help'] ) ) :
	echo '<img src="' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
else : ?>
	<div class="post__related">
		<h2 class="post__related_title"><?php echo __( 'You Might Like Also', 'byou' ); ?></h2>
		<div class="post__related_wrapper">
			<?php
			$post = get_post();
			$args = array(
					'cat'            => get_query_var( 'cat' ),
					'post_type'      => 'post',
					'posts_per_page' => 3,
					'post__not_in'   => array( $post->ID ),
			);

			$query = new WP_Query( $args ); ?>

			<?php if ( $query->have_posts() ) : ?>

				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="post__related_post">
						<div class="post__related_post_image"><?php echo get_the_post_thumbnail(); ?></div>
						<h2 class="title"><?php the_title(); ?></h2>
						<div class="excerpt"><?php echo get_the_excerpt();?></div>
						<a href="<?php echo get_permalink(); ?>" class="link">
							<span class="text"><?php echo __('READ MORE', 'byou');?></span>
							<span class="icon"></span>
						</a>
					</div>
				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php echo __( 'No posts found', 'byou' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
