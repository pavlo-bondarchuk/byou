<?php
/**
 * Block template file: gutenberg-blocks/keymember-block/tpl.php
 *
 * Keymember Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'keymember-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'keymember-block';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}
?>
<?php
if( isset( $block['data']['preview_image_help'] )  ) :
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
else : ?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="inner">
		<div class="inner__wrapper">
			<div class="wrapper__content">
				<h2 class="title"><?php the_field( 'title' ); ?></h2>
				<div class="specialization"><?php the_field( 'specialization' ); ?></div>
				<div class="about"><?php the_field( 'about' ); ?></div>
			</div>
			<div class="wrapper__image">
				<div class="image">
					<?php $photo = get_field( 'photo' ); ?>
					<?php if ( $photo ) : ?>
						<img src="<?php echo esc_url( $photo['url'] ); ?>" alt="<?php echo esc_attr( $photo['alt'] ); ?>" class="img" />
					<?php endif; ?>
					<?php $shape = get_field( 'shape' ); ?>
					<?php if ( $shape ) : ?>
						<img src="<?php echo esc_url( $shape['url'] ); ?>" alt="<?php echo esc_attr( $shape['alt'] ); ?>" class="shape" />
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif;?>
