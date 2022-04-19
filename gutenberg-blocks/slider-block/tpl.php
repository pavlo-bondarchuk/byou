<?php
/**
 * Block template file: gutenberg-blocks/slider-block/tpl.php
 *
 * Slider Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'slider-block';
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
	<div class="slider__container">
        <div class="swiper-wrapper">
			<?php $images_images = get_field( 'images' ); ?>
			<?php if ( $images_images ) :  ?>
			<?php foreach ( $images_images as $images_image ): ?>
                <div class="swiper-slide">
                    <img src="<?php echo esc_url( $images_image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $images_image['alt'] ); ?>" />
                </div>
			<?php endforeach; ?>
			<?php endif; ?>
        </div>
        <div class="sliderPrev"><i class="fa fa-angle-right"></i> </div>
        <div class="sliderNext"><i class="fa fa-angle-right"></i></div>
    </div>
</div>
<?php endif;?>