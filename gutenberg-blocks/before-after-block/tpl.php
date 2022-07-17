<?php
/**
 * Block template file: gutenberg-blocks/before-after-block/tpl.php
 *
 * Before After Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'before-after-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'before-after-block';
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
      <?php $title = get_field( 'title' ); ?>
      <?php if($title): ?>
          <h2 class="main__title"><?php echo $title;?></h2>
      <?php endif; ?>
			<?php $hashtag = get_field( 'hashtag' ); ?>
			<?php if($hashtag): ?>
          <div class="main__hashtag"><?php echo $hashtag;?></div>
			<?php endif; ?>
			<?php $text = get_field( 'text' ); ?>
			<?php if($text): ?>
          <div class="main__text"><?php echo $text;?></div>
			<?php endif; ?>
        <div class="services__wrapper">
            <div class="items swiper-wrapper">
              <?php if ( have_rows( 'services' ) ) : ?>
                <?php while ( have_rows( 'services' ) ) : the_row(); ?>
                      <div class="item swiper-slide slide-<?php echo get_row_index(); ?> no-swiping">
                        <?php $image_before = get_sub_field( 'image_before' ); ?>
                        <?php $image_after = get_sub_field( 'image_after' ); ?>
                          <div class="image-compare">
                              <img src="<?php echo esc_url( $image_before['url'] ); ?>">
                              <img src="<?php echo esc_url( $image_after['url'] ); ?>">
                          </div>
                          <div class="content_wrapper">
                              <div class="service_name"><?php the_sub_field( 'service_name' ); ?></div>
                              <div class="title"><?php the_sub_field( 'title' ); ?></div>
                          </div>
                      </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
<?php endif;?>
