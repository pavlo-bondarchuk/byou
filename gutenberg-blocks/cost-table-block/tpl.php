<?php
/**
 * Block template file: gutenberg-blocks/cost-table-block/tpl.php
 *
 * Cost Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cost-table-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'cost-table-block';
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
			<div class="cost_table__wrapper">
              <div class="swiper-wrapper">
              <?php if ( have_rows( 'item' ) ) : ?>
                <?php while ( have_rows( 'item' ) ) : the_row(); ?>
                  <div class="cost_table__item swiper-slide">
                    <div class="cost_table__body">
                        <div class="name_of_treatment">
                          <?php $name_of_treatment = get_sub_field( 'name_of_treatment' ); ?></h6>
                          <?php if($name_of_treatment): ?>
                              <h5 class="title"><?php echo $name_of_treatment;?></h5>
                          <?php endif; ?>
                        </div>
                        <div class="session__wrapper">
                            <div>
							<?php if ( have_rows( 'single_session' ) ) : ?>
                              <?php while ( have_rows( 'single_session' ) ) : the_row(); ?>
                                    <div class="cost_table__head">
                                        <div class="cost_table__head_row first">
                                            <h6 class="cost_table__head_row_title"><?php echo get_sub_field( 'single_session_title' ); ?></h6>
                                        </div>
                                    </div>
                                <div class="single_session">
                                    <div class="cost"><?php the_sub_field( 'cost' ); ?></div>
                                </div>
                              <?php endwhile; ?>
                            <?php endif; ?>
                            </div>
                            <div>
							<?php if ( have_rows( 'package_of_3_sessions' ) ) : ?>
                              <?php while ( have_rows( 'package_of_3_sessions' ) ) : the_row(); ?>
                                    <div class="cost_table__head">
                                        <div class="cost_table__head_row second">
                                            <h6 class="cost_table__head_row_title"><?php echo get_sub_field( 'package_of_3_sessions_title' ); ?></h6>
                                        </div>
                                    </div>
                                <div class="package_of_3_sessions">
                                <div class="price">
                                    <div class="cost"><?php the_sub_field( 'cost' ); ?></div>
                                    <div class="discount"><?php the_sub_field( 'discount' ); ?></div>
                                </div>
                                </div>
                              <?php endwhile; ?>
                            <?php endif; ?>
                            </div>
                            <div>
							<?php if ( have_rows( 'package_of_5_sessions' ) ) : ?>
                              <?php while ( have_rows( 'package_of_5_sessions' ) ) : the_row(); ?>
                                    <div class="cost_table__head">
                                        <div class="cost_table__head_row third">
                                            <h6 class="cost_table__head_row_title"><?php echo get_sub_field( 'package_of_5_sessions_title' ); ?></h6>
                                        </div>
                                    </div>
                                    <div class="package_of_5_sessions">
                                    <div class="price">
                                        <div class="cost"><?php the_sub_field( 'cost' ); ?></div>
                                        <div class="discount"><?php the_sub_field( 'discount' ); ?></div>
                                    </div>
                                    </div>
                              <?php endwhile; ?>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
              </div>
              <div class="cost__pagination"></div>
            </div>
    </div>
</div>
<?php endif;?>