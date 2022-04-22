<?php
/**
 * Block template file: gutenberg-blocks/where-block/tpl.php
 *
 * where Block Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'where-block-' . $block['id'];
if ( !empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'where-block';
if ( !empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( !empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}
?>

    <style type="text/css">
        <?php echo '#' . $id; ?>
				{
				/* Add styles that use ACF values here */
				}
    </style>
<?php
if ( isset( $block['data']['preview_image_help'] ) ) :
	echo '<img src="' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
else : ?>
    <div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
			<div class="inner">
              <div class="where__wrapper">
                  <div class="wrapper__content">
                    <?php $title = get_field( 'title' ); ?>
                    <?php if ( $title ) : ?>
                        <h4 class="title"><?php echo $title; ?></h4>
                    <?php endif; ?>
                    <?php $text = get_field( 'text' ); ?>
                    <?php if ( $text ) : ?>
                        <div class="text"><?php echo $text; ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="wrapper__image">
                      <div class="image">
							<?php $image = get_field( 'image' ); ?>
							<?php if ( $image ) : ?>
                                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>"/>
							<?php endif; ?>
                      </div>
                      <div class="shape">
                              <?php $image_shape = get_field( 'image_shape' ); ?>
                              <?php if ( $image_shape ) : ?>
                                  <img src="<?php echo esc_url( $image_shape['url'] ); ?>" alt="<?php echo esc_attr( $image_shape['alt'] ); ?>" />
                              <?php endif; ?>
                      </div>
                  </div>
              </div>
            </div>
    </div>
<?php endif; ?>