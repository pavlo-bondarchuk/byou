<?php
/**
 * Block template file: gutenberg-blocks/qa-block/tpl.php
 *
 * Qa Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'qa-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'qa-block';
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
		<div class="wrapper__content">
			<?php $title = get_field( 'title' ); ?>
			<?php if ( $title ) : ?>
              <h4 class="title"><?php echo $title; ?></h4>
			<?php endif; ?>
          <div class="qa__wrapper">
            <?php if ( have_rows( 'question' ) ) : ?>
              <?php while ( have_rows( 'question' ) ) : the_row(); ?>
                <div class="qa__item">
                  <div class="qa__item_question"><?php the_sub_field( 'question' ); ?></div>
                    <div class="qa__item_answer" style="display: none"><?php the_sub_field( 'answer' ); ?></div>
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
            <?php $shape_top = get_field( 'shape_top' ); ?>
            <?php if ( $shape_top ) : ?>
                <img src="<?php echo esc_url( $shape_top['url'] ); ?>" alt="<?php echo esc_attr( $shape_top['alt'] ); ?>" class="shape_top" />
            <?php endif; ?>
            <?php $shape_bottom = get_field( 'shape_bottom' ); ?>
            <?php if ( $shape_bottom ) : ?>
                <img src="<?php echo esc_url( $shape_bottom['url'] ); ?>" alt="<?php echo esc_attr( $shape_bottom['alt'] ); ?>" class="shape_bottom" />
            <?php endif; ?>
        </div>
	</div>
</div>
<?php endif; ?>