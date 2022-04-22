<?php
/**
 * Block template file: gutenberg-blocks/video-block/tpl.php
 *
 * Video Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'video-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'video-block';
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
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>" <?php echo $background_color;?>>
	<div class="inner">
			<?php $title = get_field( 'title' ); ?>
			<?php if($title): ?>
                <h4 class="title"><?php echo $title; ?></h4>
			<?php endif;?>
			<?php
			$iframe = get_field('video_link');
			preg_match('/src="(.+?)"/', $iframe, $matches);
			$src = $matches[1];
			$params = array(
					'controls'  => 0,
					'hd'        => 1,
					'autohide'  => 1
			);
			$new_src = add_query_arg($params, $src);
			$iframe = str_replace($src, $new_src, $iframe);

			$attributes = 'frameborder="0"';
			$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
			?>
	        <?php if($title): ?>
			<div class="video">
              <?php echo $iframe; ?>
            </div>
			<?php endif;?>
    </div>
</div>
<?php endif;?>