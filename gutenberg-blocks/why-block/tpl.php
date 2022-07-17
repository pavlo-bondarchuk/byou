<?php
/**
 * Block template file: gutenberg-blocks/why-block/tpl.php
 *
 * Why Block Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'why-block-' . $block['id'];
if ( !empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'why-block';
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
    <div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
			<div class="inner">
              <div class="why__choose">
                    <?php if ( have_rows( 'why_choose' ) ) : ?>
						<?php while ( have_rows( 'why_choose' ) ) : the_row(); ?>
							<div class="content_wrapper">
                            <h2 class="title"><?php the_sub_field( 'title' ); ?></h2>
                            <div class="text"><?php the_sub_field( 'text' ); ?></div>
							<?php $button = get_sub_field( 'button' ); ?>
							<?php if ( $button ) : ?>
                                <a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>" class="button">
                                  <?php echo esc_html( $button['title'] ); ?>
                                </a>
							<?php endif; ?>
                            </div>
                            <div class="image__column">
                            <div class="image">
							<?php $image = get_sub_field( 'image' ); ?>
							<?php if ( $image ) : ?>
                                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>"/>
							<?php endif; ?>
                            </div>
                            <div class="image__shape">
                              <?php $image_shape = get_sub_field( 'image_shape' ); ?>
                              <?php if ( $image_shape ) : ?>
                                  <img src="<?php echo esc_url( $image_shape['url'] ); ?>" alt="<?php echo esc_attr( $image_shape['alt'] ); ?>" />
                              <?php endif; ?>
                            </div>
                            </div>
						<?php endwhile; ?>
					<?php endif; ?>
              </div>
              <div class="why__us">
					<?php if ( have_rows( 'why_us' ) ) : ?>
                      <?php while ( have_rows( 'why_us' ) ) : the_row(); ?>
                        <div class="title"><?php the_sub_field( 'title' ); ?></div>
                        <div class="items">
                          <div class="swiper-wrapper">
                            <?php if ( have_rows( 'item' ) ) : ?>
                              <?php while ( have_rows( 'item' ) ) : the_row(); ?>
                                    <div class="item swiper-slide slide-<?php echo get_row_index(); ?>">
                                        <div class="item__title"><?php the_sub_field( 'title' ); ?></div>
                                        <div class="item__image">
                                          <?php $shape = get_sub_field( 'shape' ); ?>
                                          <?php if ( $shape ) : ?>
                                              <img src="<?php echo esc_url( $shape['url'] ); ?>" alt="<?php echo esc_attr( $shape['alt'] ); ?>" />
                                          <?php endif; ?>
                                        </div>
                                    </div>
                              <?php endwhile; ?>
                            <?php endif; ?>
                          </div>
                            <div class="swiper-pagination"></div>
                        </div>
                      <?php endwhile; ?>
                    <?php endif; ?>
              </div>
            </div>
    </div>
<?php endif; ?>
