<?php
/**
 * Block template file: gutenberg-blocks/stage-block/tpl.php
 *
 * Stage Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'stage-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'stage-block';
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
<?php
	$background_color = get_field_object( 'background_color' );
	$background_color = $background_color['value'] ? ' style="background-color:'.$background_color['value'].';"' : ' style="background-color:'.$background_color['default_value'].';"';
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>"<?php echo $background_color;?>>
	<div class="inner">
		<?php $title = get_field( 'title' ); ?>
		<?php if($title): ?>
			<h2 class="title"><?php echo $title; ?></h2>
		<?php endif;?>
      <div class="stage">
		<?php if ( have_rows( 'stage' ) ) : ?>
			<?php while ( have_rows( 'stage' ) ) : the_row(); ?>
            <div class="stage__item">
            <div class="stage__number"><?php echo get_row_index(); ?></div>
            <?php $text = get_sub_field( 'text' ); ?>
            <?php if($text): ?>
                <div class="stage__text"><?php echo $text; ?></div>
            <?php endif;?>
            </div>
			<?php endwhile; ?>
		<?php endif; ?>
      </div>
	</div>
</div>
<?php endif;?>
