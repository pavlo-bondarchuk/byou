<?php
/**
 * Block template file: gutenberg-blocks/book-form-block/tpl.php
 *
 * Book Form Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'book-form-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'book-form-block';
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
		<div class="columns">
            <div class="column column__content">
                <div class="image">
                  <?php $image = get_field( 'image' ); ?>
                  <?php if ( $image ) : ?>
                      <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="illustration" />
                  <?php endif; ?>
                  <?php $shape_one = get_field( 'shape_one' ); ?>
                  <?php if ( $shape_one ) : ?>
                      <img src="<?php echo esc_url( $shape_one['url'] ); ?>" alt="<?php echo esc_attr( $shape_one['alt'] ); ?>" class="shape_one" />
                  <?php endif; ?>
                  <?php $shape_two = get_field( 'shape_two' ); ?>
                  <?php if ( $shape_two ) : ?>
                      <img src="<?php echo esc_url( $shape_two['url'] ); ?>" alt="<?php echo esc_attr( $shape_two['alt'] ); ?>" class="shape_two" />
                  <?php endif; ?>
                </div>
            </div>
            <div class="column column__form">
				<div class="form">
                  <?php
                  $form_object = get_field( 'form' );
				    gravity_form($form_object['id']);
                  ?>
                </div>
            </div>
        </div>
	</div>
</div>
<?php endif;?>