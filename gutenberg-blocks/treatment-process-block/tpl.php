<?php
/**
 * Block template file: gutenberg-blocks/treatment-process-block/tpl.php
 *
 * Treatment Process Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'treatment-process-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'treatment-process-block';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}
?>

<?php
if ( isset( $block['data']['preview_image_help'] ) ) :
	echo '<img src="' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
else : ?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="inner">
        <div class="process__slider">
		<div class="wrapper swiper-wrapper">
          <?php if ( have_rows( 'treatment_process' ) ) : ?>
            <?php while ( have_rows( 'treatment_process' ) ) : the_row(); ?>
              <div class="item swiper-slide">
                <?php $image = get_sub_field( 'image' ); ?>
                <?php if ( $image ) : ?>
                <div class="image">
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                </div>
                <?php endif; ?>
                <?php $text = get_sub_field( 'text' ); ?>
                <?php if ( $text ) : ?>
					<div class="text"><?php echo $text; ?></div>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
            <div class="treatmentProcessSlider-pagination"></div>
        </div>
	</div>
</div>
<?php endif; ?>