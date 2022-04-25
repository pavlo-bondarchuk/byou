<?php
/**
 * Block template file: gutenberg-blocks/tabs-block/tpl.php
 *
 * Tabs Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'tabs-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'tabs-block';
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
      <div class="tab__wrapper">
          <ul class="horizontal">
			<?php if ( have_rows( 'tabs' ) ) : ?>
			<?php $i = 1; ?>
				<?php while ( have_rows( 'tabs' ) ) : the_row(); ?>
                    <li class="tab__button">
                        <a href="#tab-<?php echo $i;?>" class="tab__link"><?php the_sub_field( 'tab_title' ); ?></a>
                    </li>
                     <?php $i++;?>
				<?php endwhile; ?>
          </ul>
				<?php $i = 1; ?>
				<?php while ( have_rows( 'tabs' ) ) : the_row(); ?>
                    <div class="tab__content" id="tab-<?php echo $i;?>">
                      <div class="wrapper__content">
                        <?php $tab_text = get_sub_field( 'tab_text' ); ?>
                        <?php if($tab_text): ?>
                            <div class="text"><?php echo $tab_text;?></div>
                        <?php endif; ?>
                      </div>
                      <div class="wrapper__image">
                        <?php $tab_image = get_sub_field( 'tab_image' ); ?>
                        <?php if ( $tab_image ) : ?>
                            <img src="<?php echo esc_url( $tab_image['url'] ); ?>" alt="<?php echo esc_attr( $tab_image['alt'] ); ?>" class="image" />
                        <?php endif; ?>
                        <?php $tab_shape = get_sub_field( 'tab_shape' ); ?>
                        <?php if ( $tab_shape ) : ?>
                            <img src="<?php echo esc_url( $tab_shape['url'] ); ?>" alt="<?php echo esc_attr( $tab_shape['alt'] ); ?>" class="shape" />
                        <?php endif; ?>
                      </div>
                    </div>
					<?php $i++;?>
				<?php endwhile; ?>
      </div>
			<?php endif; ?>
    </div>
</div>
<?php endif; ?>