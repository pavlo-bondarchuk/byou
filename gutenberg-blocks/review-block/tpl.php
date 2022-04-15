<?php
/**
 * Block template file: gutenberg-blocks/review-block/tpl.php
 *
 * Review Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'review-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'review-block';
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
			<div class="name"><?php the_field( 'name' ); ?></div>
			<div class="review_star_rating">
              <?php
              $rating = get_field('review_star_rating');
              for ($i = 0; $i < $rating; $i++) {
                  print "<svg width=\"25\" height=\"23\" viewBox=\"0 0 25 23\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M12.5 0L15.4508 8.78522H25L17.2746 14.2148L20.2254 23L12.5 17.5704L4.77457 23L7.72542 14.2148L0 8.78522H9.54915L12.5 0Z\" fill=\"#FFB23F\"/></svg>";
              }
              ?>
            </div>
			<div class="text"><?php the_field( 'text' ); ?></div>
			<div class="link">
              <?php $review_link = get_field( 'review_link' ); ?>
              <?php if ( $review_link ) : ?>
                  <a href="<?php echo esc_url( $review_link['url'] ); ?>" target="<?php echo esc_attr( $review_link['target'] ); ?>">
                    <?php echo esc_html( $review_link['title'] ); ?>
                  </a>
              <?php endif; ?>
            </div>
    </div>
    <div class="image">
			<?php $image = get_field( 'image' ); ?>
			<?php if ( $image ) : ?>
          <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
			<?php endif; ?>
    </div>
</div>
<?php endif;?>