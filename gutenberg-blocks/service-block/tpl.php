<?php
/**
 * Block template file: gutenberg-blocks/service-block/tpl.php
 *
 * Service Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'service-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'service-block';
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
	<?php if ( get_field( 'image_leftright' ) == 1 ) : ?>
		<?php $classes .= ' image__align_left'; ?>
	<?php else : ?>
		<?php $classes .= ' image__align_right'; ?>
	<?php endif; ?>
	<?php if ( get_field( 'shape_leftright' ) == 1 ) : ?>
		<?php $classes .= ' shape__align_left'; ?>
	<?php else : ?>
		<?php $classes .= ' shape__align_right'; ?>
	<?php endif; ?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="inner">
			<div class="column__desktop">
              <div class="image">
								<?php $image = get_field( 'image' ); ?>
								<?php if ( $image ) : ?>
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
								<?php endif; ?>
              </div>
                <div class="shape">
									<?php $shape = get_field( 'shape' ); ?>
									<?php if ( $shape ) : ?>
                      <img src="<?php echo esc_url( $shape['url'] ); ?>" alt="<?php echo esc_attr( $shape['alt'] ); ?>" />
									<?php endif; ?>
                </div>
            </div>
			<div class="column__desktop">
                <div class="content_wrapper">
                    <h2 class="title"><?php the_field( 'title' ); ?></h2>
                    <div class="text"><?php the_field( 'text' ); ?></div>
									<?php $button = get_field( 'button' ); ?>
									<?php if ( $button ) : ?>
                      <a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>" class="link">
												<?php echo esc_html( $button['title'] ); ?>
                          <span class="icon"></span>
                      </a>
									<?php endif; ?>
                </div>
            </div>
        <div class="column__mobile">
            <div class="title"><?php the_field( 'title' ); ?></div>
            <div class="image">
              <?php $image = get_field( 'image' ); ?>
              <?php if ( $image ) : ?>
                  <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
              <?php endif; ?>
            </div>
            <?php $button = get_field( 'button' ); ?>
            <?php if ( $button ) : ?>
                <a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>" class="link">
                    <?php echo esc_html( $button['title'] ); ?>
                    <span class="fa fa-angle-right icon"></span>
                </a>
            <?php endif; ?>
            <div class="text"><?php the_field( 'text' ); ?></div>
        </div>
    </div>
</div>
<?php endif; ?>
