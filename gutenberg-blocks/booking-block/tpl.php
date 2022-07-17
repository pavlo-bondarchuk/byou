<?php
/**
 * Block template file: gutenberg-blocks/booking-block/tpl.php
 *
 * Booking Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'booking-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'booking-block';
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
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="inner">
      <div class="column">
          <h2 class="title"><?php the_field( 'title' ); ?></h2>
      </div>
      <div class="column">
            <div class="text"><?php the_field( 'text' ); ?></div>
              <?php $button = get_field( 'button' ); ?>
              <?php if ( $button ) : ?>
                  <a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>" class="link">
                    <?php echo esc_html( $button['title'] ); ?>
                  </a>
              <?php endif; ?>
      </div>
    </div>
    <div class="image">
			<?php $image = get_field( 'image' ); ?>
			<?php if ( $image ) : ?>
          <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
			<?php endif; ?>
        <div class="shape">
            <svg width="1708" height="1590" viewBox="0 0 1708 1590" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M272 129.999C349 33.4991 560.499 52.4997 634.499 52.4997C716.797 52.7994 735.171 39.3327 798.999 26.9997C1891 -184 1836.14 923.939 1471 1230.5C536 2015.5 -349 1398 138.999 487.5C166.579 436.043 212.542 407.832 220.999 362.5C235.282 285.95 204.575 214.5 272 129.999Z" fill="#1F4A94"/>
            </svg>
        </div>
    </div>
</div>
<?php endif;?>
