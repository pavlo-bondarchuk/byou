<?php
/**
 * Block template file: gutenberg-blocks/intro-fullscreen-block/tpl.php
 *
 * Intro Block Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'intro-fullscreen-block-' . $block['id'];
if ( !empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'intro-fullscreen-block';
if ( !empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( !empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}
?>
<?php
if( isset( $block['data']['preview_image_help'] )  ) :
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
else : ?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="content__wrapper">
            <div class="content__col">
                <h1 class="title"><?php the_field( 'title' ); ?></h1>
                <div class="text text__main text__white text__mb_medium"><?php the_field( 'text' ); ?></div>
                <?php $button = get_field( 'button' ); ?>
			    <?php if ( $button ) : ?>
                    <a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>" class="button button__blue">
                      <?php echo esc_html( $button['title'] ); ?>
                    </a>
			    <?php endif; ?>
            </div>
    </div>
    <div class="background__image">
			<?php $background_image = get_field( 'background_image' ); ?>
			<?php if ( $background_image ) : ?>
          <img class="background__image" src="<?php echo esc_url( $background_image['url'] ); ?>"
               alt="<?php echo esc_attr( $background_image['alt'] ); ?>"/>
			<?php endif; ?>
    </div>
</div>
<?php endif;?>
