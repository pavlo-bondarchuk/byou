<?php
/**
 * Block template file: gutenberg-blocks/become-block/tpl.php
 *
 * Become Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'become-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'become-block';
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
			<h4 class="title"><?php the_field( 'title' ); ?></h4>
			<div class="inner__wrapper item__slider">
					<div class="swiper-wrapper">
                      <?php if ( have_rows( 'item' ) ) : ?>
                        <?php while ( have_rows( 'item' ) ) : the_row(); ?>
                              <div class="item swiper-slide">
                                  <div class="item__icon">
                                    <?php $icon = get_sub_field( 'icon' ); ?>
                                    <?php if ( $icon ) : ?>
                                        <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                                    <?php endif; ?>
                                  </div>
                                  <h2 class="item__title"><?php the_sub_field( 'title' ); ?></h2>
                                  <div class="item__text"><?php the_sub_field( 'text' ); ?></div>
                              </div>
                        <?php endwhile; ?>
                      <?php endif; ?>
                    </div>
                <div class="item__slider-pagination"></div>
            </div>
    </div>
</div>
<?php endif;?>
