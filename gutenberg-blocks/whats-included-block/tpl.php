<?php
/**
 * Block template file: gutenberg-blocks/whats-included-block/tpl.php
 *
 * Whats Included Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'whats-included-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'whats-included-block';
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
	<div class="inner">
        <div class="inner__wrapper">
            <div class="wrapper__content">
              <div class="title"><?php the_field( 'title' ); ?></div>
              <div class="item__wrapper">
					<?php if ( have_rows( 'item' ) ) : ?>
					<?php while ( have_rows( 'item' ) ) : the_row(); ?>
                        <div class="item">
                            <div class="icon"><i class="fa-solid fa-check"></i></div>
							<div class="text"><?php the_sub_field( 'text' ); ?></div>
                        </div>
                      <?php endwhile; ?>
                    <?php endif; ?>
              </div>
            </div>
			<div class="wrapper__image">
              <?php $image = get_field( 'image' ); ?>
              <?php if ( $image ) : ?>
                  <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="image" />
              <?php endif; ?>
              <?php $shape = get_field( 'shape' ); ?>
              <?php if ( $shape ) : ?>
                  <img src="<?php echo esc_url( $shape['url'] ); ?>" alt="<?php echo esc_attr( $shape['alt'] ); ?>" class="shape" />
              <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif;?>