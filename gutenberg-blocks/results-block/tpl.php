<?php
/**
 * Block template file: gutenberg-blocks/results-block/tpl.php
 *
 * Results Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'results-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'results-block';
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
		<div class="wrapper">
            <div class="wrapper__title">
              <?php $title = get_field( 'title' ); ?>
              <?php if ( $title ) : ?>
                  <h2 class="title"><?php echo $title;?></h2>
              <?php endif; ?>
            </div>
            <div class="wrapper__content">
              <?php $text = get_field( 'text' ); ?>
              <?php if ( $text ) : ?>
                  <div class="text"><?php echo $text;?></div>
              <?php endif; ?>
              <?php $button = get_field( 'button' ); ?>
              <?php if ( $button ) : ?>
                  <a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>" class="link">
                    <?php echo esc_html( $button['title'] ); ?>
                  </a>
              <?php endif; ?>
            </div>
        </div>
	</div>
	<div class="background__image">
      <?php $background_image = get_field( 'background_image' ); ?>
      <?php if ( $background_image ) : ?>
          <img src="<?php echo esc_url( $background_image['url'] ); ?>" alt="<?php echo esc_attr( $background_image['alt'] ); ?>" class="image" />
      <?php endif; ?>
    </div>
    <div class="shape">
        <?php if( wp_is_mobile() ): ?>
            <svg width="375" height="585" viewBox="0 0 375 585" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 106.5C36.5 7.99998 213.5 -40.5 375 45V585H0V106.5Z" fill="#1F4A94"/>
            </svg>
			<?php else: ?>
            <svg width="699" height="692" viewBox="0 0 699 692" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M542.5 24.5C616 24.5 671.5 0 699 0V691.5H33.5001C25.0001 674 3.69466e-05 633.805 0 569C-5.64419e-05 470 101.5 402 119 348C136.5 294 119.5 230 140.5 164C151.715 128.751 177 85.5 247 47C334 -0.849998 455.5 24.5 542.5 24.5Z" fill="#1F4A94"/>
            </svg>
		<?php endif; ?>
    </div>
</div>
<?php endif; ?>
