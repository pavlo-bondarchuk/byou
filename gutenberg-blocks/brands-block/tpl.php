<?php
/**
 * Block template file: gutenberg-blocks/brands-block/tpl.php
 *
 * Brands Block Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'brands-block-' . $block['id'];
if ( !empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'brands-block';
if ( !empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( !empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}

?>
<?php
    if( isset( $block['data']['preview_image_help'] )  ) :
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
else : ?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="inner">
			<?php $brands_images = get_field( 'brands' ); ?>
			<?php if ( $brands_images ) : ?>
				<?php foreach ( $brands_images as $brands_image ): ?>
              <img src="<?php echo esc_url( $brands_image['sizes']['thumbnail'] ); ?>"
                   alt="<?php echo esc_attr( $brands_image['alt'] ); ?>"/>
				<?php endforeach; ?>
			<?php endif; ?>
    </div>
</div>
<?php endif;?>
