<?php
/**
 * Block template file: gutenberg-blocks/team-block/tpl.php
 *
 * Team Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'team-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'team-block';
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
			<h2 class="title"><?php the_field( 'title' ); ?></h2>
              <?php $shape = get_field( 'shape' ); ?>
              <?php if ( $shape ) : ?>
                <div class="shape">
                <?php
                $filetype = wp_check_filetype($shape['url']);
                if( $filetype['ext'] =='svg' ){
                    echo file_get_contents($shape['url']);
                } else { ?>
                    <img src="<?php echo esc_url( $shape['url'] ); ?>" alt="<?php echo esc_attr( $shape['alt'] ); ?>" />
                <?php } ?>
                </div>
              <?php endif; ?>
			<div class="banner">
              <?php $image = get_field( 'image' ); ?>
              <?php if ( $image ) : ?>
                  <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
              <?php endif; ?>
            </div>
    </div>
</div>
<?php endif; ?>
