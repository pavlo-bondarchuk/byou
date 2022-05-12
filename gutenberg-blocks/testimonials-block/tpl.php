<?php
/**
 * Block template file: gutenberg-blocks/testimonials-block/tpl.php
 *
 * Clients Testimonials Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonials-block-' . $block['id'];
if ( !empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'testimonials-block';
if ( !empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( !empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}
$template = array(
		array( 'core/heading', array(
				'level'   => 4,
				'content' => 'What Our Clients Say'
		) ),
);
$url      = "https://maps.googleapis.com/maps/api/place/details/json?place_id=ChIJM8xSBN3HyIARpjBpPhAMoiI&key=AIzaSyCHLpqFXcZmX_QpL55TpRwsKGJJQk4Nyzw";
$ch       = curl_init();
curl_setopt( $ch, CURLOPT_URL, $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
$result = curl_exec( $ch );
curl_close( $ch );
$res     = json_decode( $result, true );
$reviews = $res['result']['reviews'];
//foreach ( $reviews as $key => $row ) {
//	$rating[$key] = $row['rating'];
//}
//$rating = array_column( $reviews, 'rating' );
//array_multisort( $rating, SORT_DESC, $reviews );
?>
<?php
if ( isset( $block['data']['preview_image_help'] ) ) :
	echo '<img src="' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
else : ?>
    <div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
        <div class="inner">
			<?php echo '<InnerBlocks template="' . esc_attr( wp_json_encode( $template ) ) . '" />'; ?>
            <div class="testimonials__wrapper">
                <div class="swiper-wrapper">
						<?php foreach( $reviews as $review => $item ) :?>
                      <div class="swiper-slide testimonials__item">
                          <div class="inner">
                              <div class="testimonials__item_personal">
                                  <div class="testimonials__item_avatar">
                                      <img src="<?php echo $item['profile_photo_url']; ?>">
                                  </div>
                                  <div class="testimonials__item_user">
                                      <div class="testimonials__item_name">
																				<?php echo $item['author_name']; ?>
                                      </div>
                                      <div class="testimonials__item_date">
																				<?php echo date('F d, Y', $item['time']); ?>
                                      </div>
                                  </div>
                              </div>
                              <div class="testimonials__item_stars">
									<?php for ( $i = 1; $i <= $item['rating']; $i++ ) { ?>
                                        <span class="star active">&#9733;</span>
									<?php } ?>
									<?php for ( $i = $item['rating'] + 1; $i <= 5; $i++ ) { ?>
                                        <span class="star inactive">&#9733;</span>
									<?php } ?>
                              </div>
                              <div class="testimonials__item_review">
																<?php echo mb_strimwidth( $item['text'], 0, 370, '...' ); ?>
                              </div>
                          </div>
                      </div>
					<?php endforeach; ?>
                </div>
                <div class="testimonials__pagination"></div>
            </div>
        </div>
    </div>
<?php endif; ?>