<?php
/**
 * Block template file: gutenberg-blocks/benefits-used-block/tpl.php
 *
 * Benefits Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'benefits-used-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'benefits-used-block';
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
        <div class="wrapper__image">
					<?php
					$image_object = get_field( 'image' );
					$image_id = $image_object['ID'];
					$image_url = $image_object['url'];
					$image_alt = $image_object['alt'];
					$size = 'byou-treatment-mobile';
					$image_large_width = wp_get_attachment_image_src( $image_id, $size );
					?>
					<?php if ( $image_object ) : ?>
						<?php if ( wp_is_mobile() ) : ?>
                  <img src="<?php echo $image_large_width[0]; ?>" alt="<?php echo esc_attr( $image_alt ); ?>" class="image" />
						<?php else: ?>
                  <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" class="image" />
						<?php endif; ?>
					<?php endif; ?>
					<?php $shape = get_field( 'shape' ); ?>
					<?php if ( $shape ) : ?>
              <img src="<?php echo esc_url( $shape['url'] ); ?>" alt="<?php echo esc_attr( $shape['alt'] ); ?>" class="shape"/>
					<?php endif; ?>
        </div>
        <div class="wrapper__content">
					<div class="wrapper__content_inner">
                    <?php $title = get_field( 'title' ); ?>
					<?php if($title): ?>
                        <h4 class="title"><?php echo $title;?></h4>
					<?php endif; ?>
					<?php $text_before = get_field( 'text_before' ); ?>
					<?php if($text_before): ?>
                        <div class="text_before"><?php echo $text_before;?></div>
					<?php endif; ?>
					<div class="list one__column">
                      <?php if ( have_rows( 'benefits_one_column' ) ) : ?>
                        <?php while ( have_rows( 'benefits_one_column' ) ) : the_row(); ?>
                        <div class="list__item">
                          <div class="list__icon"><i class="fa fa-check"></i></div>
                          <?php $text = get_sub_field( 'text' ); ?>
                          <?php if($text): ?>
                              <div class="list__text">
                                <?php echo $text;?>
                              </div>
                          <?php endif; ?>
                        </div>
                        <?php endwhile; ?>
                      <?php endif; ?>
                    </div>
					<?php $text_middle = get_field( 'text_middle' ); ?>
					<?php if($text_middle): ?>
                        <div class="text_middle"><?php echo $text_middle;?></div>
					<?php endif; ?>
                    <div class="list two__column">
                      <?php if ( have_rows( 'benefits_two_column' ) ) : ?>
                        <?php while ( have_rows( 'benefits_two_column' ) ) : the_row(); ?>
                        <div class="list__item">
                          <div class="list__icon"><i class="fa fa-check"></i></div>
                            <?php $text = get_sub_field( 'text' ); ?>
                            <?php if($text): ?>
                            <div class="list__text">
                              <?php echo $text;?>
                            </div>
                            <?php endif; ?>
                      </div>
                        <?php endwhile; ?>
                      <?php endif; ?>
                    </div>
					<?php $text_after = get_field( 'text_after' ); ?>
					<?php if($text_after): ?>
                        <div class="text_after"><?php echo $text_after;?></div>
					<?php endif; ?>
                    </div>
        </div>
    </div>
</div>
<?php endif; ?>