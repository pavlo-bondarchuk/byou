<?php
/**
 * Block template file: gutenberg-blocks/find-block/tpl.php
 *
 * Find Block Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'find-block-' . $block['id'];
if ( !empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'find-block';
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
	<?php
	$background_color_object = get_field_object( 'background_color' );
	$background_color = $background_color_object['value'] ? ' style="background-color:' . $background_color_object['value'] . '"' : ' style="background-color:' . $background_color_object['default_value'] . '"';
	?>
    <div id="<?php echo esc_attr( $id ); ?>"
         class="<?php echo esc_attr( $classes ); ?>" <?php echo $background_color; ?>>
        <div class="inner">
            <div class="wrapper">
							<?php $title = get_field( 'title' ); ?>
							<?php if ( $title ) : ?>
                                <h2 class="main-title"><?php echo $title; ?></h2>
							<?php endif; ?>
							<?php $text = get_field( 'text' ); ?>
							<?php if ( $text ) : ?>
                                <div class="main-text"><?php echo $text; ?></div>
							<?php endif; ?>
							<?php if ( have_rows( 'treatments' ) ) : ?>
                            <div class="wrapper__treatments">
                              <div class="swiper-wrapper">
                                <?php while ( have_rows( 'treatments' ) ) : the_row(); ?>
                                    <div class="treatment__item swiper-slide">
                                      <?php $image = get_sub_field( 'image' ); ?>
                                      <?php if ( $image ) : ?>
                                          <div class="treatment__image">
                                              <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>"/>
                                          </div>
                                      <?php endif; ?>
                                      <?php $title = get_sub_field( 'title' ); ?>
                                      <?php if ( $title ) : ?>
                                          <h4 class="treatment__title"><?php echo $title; ?></h4>
                                      <?php endif; ?>
                                      <?php $text = get_sub_field( 'text' ); ?>
                                      <?php if ( $text ) : ?>
                                          <div class="treatment__text"><?php echo $text; ?></div>
                                      <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                              </div>
                              <div class="wrapper__treatments-pagination"></div>
                            </div>
							<?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
