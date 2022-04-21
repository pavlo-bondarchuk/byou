<?php
/**
 * Block template file: gutenberg-blocks/share-block/tpl.php
 *
 * Share Block Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'post__share' . $block['id'];
if ( !empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'post__share';
if ( !empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( !empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}
?>
<?php
if ( isset( $block['data']['preview_image_help'] ) ) :
	echo '<img src="' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
else : ?>
    <div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
			<?php $share_text = get_field( 'share_text' ) ?: __( 'Share:', 'byou' ); ?>
        <div class="post__share_text"><?php echo $share_text; ?></div>
			<?php if ( have_rows( 'social' ) ) : ?>
          <div class="post__share_wrapper">
						<?php while ( have_rows( 'social' ) ) : the_row(); ?>
							<?php
							if ( get_sub_field( 'social_choice' ) == 'instagram' ) :?>
<a target="_blank" onclick="window.open(this.href,'targetWindow', 'toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>&picture=<?php echo get_the_post_thumbnail_url(); ?>&title=<?php echo get_the_title(); ?>&amp;description=<?php echo get_the_excerpt(); ?>" class="link"><i class="fa-brands fa-instagram"></i></a>
							<?php endif;
							if ( get_sub_field( 'social_choice' ) == 'facebook' ) :?>
<a target="_blank" onclick="window.open(this.href,'targetWindow', 'toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>&picture=<?php echo get_the_post_thumbnail_url(); ?>&title=<?php echo get_the_title(); ?>&amp;description=<?php echo get_the_excerpt(); ?>" class="link"><i class="fa-brands fa-facebook-f"></i></a>
							<?php endif;
							if ( get_sub_field( 'social_choice' ) == 'twitter' ) :?>
<a target="_blank" onclick="window.open(this.href,'targetWindow', 'toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;" href="https://twitter.com/intent/tweet?text=<?php echo get_the_excerpt(); ?>" class="link"><i class="fa-brands fa-twitter"></i></a>
							<?php endif;
							?>
						<?php endwhile; ?>
          </div>
			<?php endif; ?>
    </div>
    </div>
<?php endif; ?>