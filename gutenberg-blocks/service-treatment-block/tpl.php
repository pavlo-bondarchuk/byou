<?php
/**
 * Block template file: gutenberg-blocks/sevice-treatment-block/tpl.php
 *
 * Sevice Treatment Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'service-treatment-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'service-treatment-block';
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
			<?php $title = get_field( 'title' ); ?>
			<?php if($title): ?>
                <h2 class="title"><?php echo $title;?></h2>
			<?php endif; ?>
			<?php $text_before = get_field( 'text_before' ); ?>
			<?php if($text_before): ?>
                <div class="text_before"><?php echo $text_before;?></div>
			<?php endif; ?>
            <div class="content__wrapper">
			<div class="swiper-wrapper">
              <?php if ( have_rows( 'diagnose' ) ) : ?>
				<?php while ( have_rows( 'diagnose' ) ) : the_row(); ?>
                <div class="content__item swiper-slide">
                    <?php $image = get_sub_field( 'image' ); ?>
					<?php if ( $image ) : ?>
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="content__image" />
					<?php endif; ?>
                    <?php $text = get_sub_field( 'text' ); ?>
                    <?php if($text): ?>
                        <h4 class="content__text"><?php echo $text;?></h4>
                    <?php endif; ?>
                </div>
				<?php endwhile; ?>
			<?php endif; ?>
            </div>
            <div class="content__wrapper-pagination"></div>
            </div>
			<?php $text_after = get_field( 'text_after' ); ?>
			<?php if($text_after): ?>
                <div class="text_after"><?php echo $text_after;?></div>
			<?php endif; ?>
    </div>
</div>
<?php endif; ?>
