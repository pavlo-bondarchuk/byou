<?php
/**
 * Block template file: gutenberg-blocks/features-block/tpl.php
 *
 * Become Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'features-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'features-block';
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
	<?php
	$background_color = get_field_object( 'background_color' );
	$background_color = $background_color ? ' style="background-color:' . $background_color['value'] . ';"' : ' style="background-color:' . $background_color['default_value'] . ';"'; ?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>"<?php echo $background_color; ?>>
	<div class="inner">
			<?php $main_title = get_field( 'title' ); ?>
			<?php if ( $main_title ) : ?>
                <h4 class="main_title"><?php echo $main_title;?></h4>
			<?php endif; ?>
			<div class="inner__wrapper">
                      <?php if ( have_rows( 'item' ) ) : ?>
                        <?php while ( have_rows( 'item' ) ) : the_row(); ?>
                              <div class="item">
                                  <div class="item__icon">
                                    <?php $icon = get_sub_field( 'icon' ); ?>
                                    <?php if ( $icon ) : ?>
                                        <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                                    <?php endif; ?>
                                  </div>
                                  <div class="item__title"><?php the_sub_field( 'title' ); ?></div>
                                  <div class="item__text"><?php the_sub_field( 'text' ); ?></div>
                              </div>
                        <?php endwhile; ?>
                      <?php endif; ?>
            </div>
    </div>
</div>
<?php endif;?>