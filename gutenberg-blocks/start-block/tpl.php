<?php
/**
 * Block template file: gutenberg-blocks/start-block/tpl.php
 *
 * start Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'start-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'start-block';
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
					<h1 class="title"><?php the_field( 'title' ); ?></h1>
					<?php $text = get_field( 'text' ); ?>
	                <?php if ( $text ) : ?>
                        <div class="text"><?php echo $text; ?></div>
					<?php endif; ?>
					<?php $link = get_field( 'link' ); ?>
					<?php if ( $link ) : ?>
                        <a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>" class="link">
                          <?php echo esc_html( $link['title'] ); ?>
                        </a>
					<?php endif; ?>
                </div>
                <div class="wrapper__image">
					<?php $image = get_field( 'image' ); ?>
					<?php if ( $image ) : ?>
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="image" />
					<?php endif; ?>
					<?php $shape = get_field( 'shape' ); ?>
					<?php if ( $shape ) : ?>
                    <div class="shape">
                        <img src="<?php echo esc_url( $shape['url'] ); ?>" alt="<?php echo esc_attr( $shape['alt'] ); ?>" />
                    </div>
					<?php endif; ?>
                </div>
            </div>
    </div>
</div>
<?php endif;?>
