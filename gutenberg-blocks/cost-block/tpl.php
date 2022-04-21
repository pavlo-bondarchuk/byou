<?php
/**
 * Block template file: gutenberg-blocks/cost-block/tpl.php
 *
 * Cost Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cost-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'cost-block';
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
			<?php $title = get_field( 'title' ); ?>
			<?php if($title): ?>
            <h3 class="title"><?php echo $title;?></h3>
			<?php endif; ?>
			<?php $description = get_field( 'description' ); ?>
			<?php if($description): ?>
                <div class="description"><?php echo $description;?></div>
			<?php endif; ?>
			<div class="cost__wrapper">
              <?php if ( have_rows( 'item' ) ) : ?>
                <div class="swiper-wrapper">
                <?php while ( have_rows( 'item' ) ) : the_row(); ?>
                  <div class="cost__item swiper-slide">
                    <div class="cost__item_content">
                      <?php $title = get_sub_field( 'title' ); ?>
                      <?php if($title): ?>
                          <h4 class="title"><?php echo $title;?></h4>
                      <?php endif; ?>
                      <?php $text = get_sub_field( 'text' ); ?>
                      <?php if($text): ?>
                          <div class="text"><?php echo $text;?></div>
                      <?php endif; ?>
                    </div>
                    <div class="cost__item_cost">
                      <?php $cost = get_sub_field( 'cost' ); ?>
                      <?php if($cost): ?>
                          <div class="cost"><?php echo $cost;?></div>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endwhile; ?>
                </div>
              <div class="cost__pagination"></div>
              <?php endif; ?>
            </div>
    </div>
</div>
<?php endif;?>