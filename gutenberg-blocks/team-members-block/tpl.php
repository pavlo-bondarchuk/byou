<?php
/**
 * Block template file: gutenberg-blocks/team-members-block/tpl.php
 *
 * Team Members Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'team-members-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'team-members-block';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
	/* Add styles that use ACF values here */
	}
</style>
<?php
if( isset( $block['data']['preview_image_help'] )  ) :
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
else : ?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="inner">
		<div class="title"><?php the_field( 'title' ); ?></div>
		<div class="members__wrapper">
			<?php if ( have_rows( 'member' ) ) : ?>
				<?php while ( have_rows( 'member' ) ) : the_row(); ?>
					<div class="member">
						<div class="image">
                          <?php $photo = get_sub_field( 'photo' ); ?>
                          <?php if ( $photo ) : ?>
                              <img src="<?php echo esc_url( $photo['url'] ); ?>" alt="<?php echo esc_attr( $photo['alt'] ); ?>" />
                          <?php endif; ?>
                        </div>
						<div class="specialization"><?php the_sub_field( 'specialization' ); ?></div>
						<div class="name"><?php the_sub_field( 'name' ); ?></div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endif;?>