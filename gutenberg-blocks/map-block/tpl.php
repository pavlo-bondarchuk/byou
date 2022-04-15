<?php
/**
 * Block template file: gutenberg-blocks/map-block/tpl.php
 *
 * Map Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'map-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'map-block';
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
<?php if( isset( $block['data']['preview_image_help'] )  ) :
echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
else : ?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<?php the_field( 'map' ); ?>
	<div class="inner">
        <div class="over">
					<?php if ( have_rows( 'overlay' ) ) : ?>
						<?php while ( have_rows( 'overlay' ) ) : the_row(); ?>
							<div class="title"><?php the_sub_field( 'title' ); ?></div>
							<div class="items">
                              <?php if ( have_rows( 'item' ) ) : ?>
                                <?php while ( have_rows( 'item' ) ) : the_row(); ?>
                                  <div class="item">
                                    <?php if ( have_rows( 'addres' ) ) : ?>
                                      <?php while ( have_rows( 'addres' ) ) : the_row(); ?>
                                        <div class="column__contact">
                                          <div class="title"><?php the_sub_field( 'title' ); ?></div>
                                          <div class="address"><?php the_sub_field( 'address' ); ?></div>
                                          <div class="phone"><?php the_sub_field( 'phone' ); ?></div>
                                          <div class="email"><?php the_sub_field( 'email' ); ?></div>
                                        </div>
                                      <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php if ( have_rows( 'open_hours' ) ) : ?>
                                      <?php while ( have_rows( 'open_hours' ) ) : the_row(); ?>
                                        <div class="column__open_hours">
                                            <div class="title"><?php the_sub_field( 'title' ); ?></div>
                                            <div class="date"><?php the_sub_field( 'date' ); ?></div>
                                        </div>
                                      <?php endwhile; ?>
                                    <?php endif; ?>
                                  </div>
                                <?php endwhile; ?>
                              <?php endif; ?>
                            </div>
						<?php endwhile; ?>
					<?php endif; ?>
        </div>
    </div>
</div>
<?php endif;?>