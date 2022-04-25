<?php

if ( function_exists( 'acf_register_block_type' ) ) {
	add_action( 'acf/init', 'register_acf_block_type' );
}

function builder_blocks( $categories, $post ) {
	return array_merge(
			$categories,
			array(
					array(
							'slug'  => 'byou-blocks',
							'title' => __( 'Blocks', 'byou' ),
					),
			)
	);
}

add_filter( 'block_categories', 'builder_blocks', 10, 2 );

function register_acf_block_type() {
	acf_register_block_type( array(
			'name'            => 'intro-block',
			'title'           => __( 'Intro Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'intro' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/intro-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/intro-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/intro-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/intro-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'brands-block',
			'title'           => __( 'Brands Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'brands' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/brands-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/brands-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/intro-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/brands-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'why-block',
			'title'           => __( 'Why Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'why' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/why-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/why-block/style.css',
			'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/why-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/why-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'banner-block',
			'title'           => __( 'Banner Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'banner' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/banner-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/banner-block/style.css',
			//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/why-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/banner-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'title-block',
			'title'           => __( 'Title Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'title' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/title-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/title-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/why-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/title-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'service-block',
			'title'           => __( 'Service Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'service' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/service-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/service-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/why-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/service-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'booking-block',
			'title'           => __( 'Booking Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'booking' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/booking-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/booking-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/why-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/booking-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'before-after-block',
			'title'           => __( 'Before After Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'before-after' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/before-after-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/before-after-block/style.css',
			'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/before-after-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/before-after-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'review-block',
			'title'           => __( 'Review Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'review' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/review-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/review-block/style.css',
			//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/review-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/review-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'book-form-block',
			'title'           => __( 'Book Form Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'book-form' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/book-form-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/book-form-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/review-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/book-form-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'map-block',
			'title'           => __( 'Map Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'map' ),
			'post_types'      => array( 'page', 'post' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/map-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/map-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/review-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/map-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'team-banner-block',
			'title'           => __( 'Team Banner Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'team-banner' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/team-banner-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/team-banner-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/review-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/team-banner-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'keymember-block',
			'title'           => __( 'Key Member Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'keymember' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/keymember-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/keymember-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/review-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/keymember-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'team-members-block',
			'title'           => __( 'Team Members Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'team-members' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/team-members-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/team-members-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/review-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/team-members-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'join-block',
			'title'           => __( 'Join Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'join' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/join-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/join-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/review-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/join-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'slider-block',
			'title'           => __( 'Slider Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'slider' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/slider-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/slider-block/style.css',
			'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/slider-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/slider-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'become-block',
			'title'           => __( 'Become Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'become' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/become-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/become-block/style.css',
			'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/become-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/become-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'whats-included-block',
			'title'           => __( 'What\'s Included Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'whats-included' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/whats-included-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/whats-included-block/style.css',
			//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/whats-included-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/whats-included-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'share-block',
			'title'           => __( 'Share Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'share' ),
			'post_types'      => array( 'post' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/share-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/share-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/whats-included-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/share-block.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'related-block',
			'title'           => __( 'Related Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'related' ),
			'post_types'      => array( 'post' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/related-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/related-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/whats-included-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/related-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'start-block',
			'title'           => __( 'Intro Treatment Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'start', 'intro-treatment' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/start-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/start-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/review-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/start-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'treatment-block',
			'title'           => __( 'Treatment Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'treatment' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/treatment-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/treatment-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/why-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/treatment-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'features-block',
			'title'           => __( 'Treatment Features Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'features' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/features-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/features-block/style.css',
//			'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/become-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/features-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'cost-block',
			'title'           => __( 'Treatment Cost Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'cost' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/cost-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/cost-block/style.css',
			'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/cost-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/cost-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'qa-block',
			'title'           => __( 'Q&A Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'qa' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/qa-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/qa-block/style.css',
			'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/qa-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/qa-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'video-block',
			'title'           => __( 'Video Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'video' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/video-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/video-block/style.css',
//			'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/video-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/video-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'stage-block',
			'title'           => __( 'Stage Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'stage' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/stage-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/stage-block/style.css',
//			'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/video-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/stage-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'where-block',
			'title'           => __( 'Where Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'where' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/where-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/where-block/style.css',
//			'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/why-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/where-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'service-treatment-block',
			'title'           => __( 'Service Treatment', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'service-treatment' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/service-treatment-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/service-treatment-block/style.css',
			'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/service-treatment-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/service-treatment-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'treatment-process-block',
			'title'           => __( 'Treatment Process', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'treatment-process' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/treatment-process-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/treatment-process-block/style.css',
			'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/treatment-process-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/treatment-process-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'benefits-block',
			'title'           => __( 'Benefits', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'benefits' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/benefits-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/benefits-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/treatment-process-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/benefits-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'benefits-used-block',
			'title'           => __( 'Benefits Used', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'benefits-used' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/benefits-used-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/benefits-used-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/treatment-process-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/benefits-used-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'results-block',
			'title'           => __( 'Results Guaranteed', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'results' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/results-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/results-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/treatment-process-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/results-section.jpg'
							)
					)
			)
	) );
	acf_register_block_type( array(
			'name'            => 'cost-table-block',
			'title'           => __( 'Treatment Cost Table Block', 'byou' ),
			'category'        => 'byou-blocks',
			'icon'            => 'admin-home',
			'keywords'        => array( 'cost', 'table' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'preview',
			'align'           => 'full',
			'supports'        => array(
					'align'  => true,
					'jsx'    => true,
					'anchor' => true
			),
			'render_template' => 'gutenberg-blocks/cost-table-block/tpl.php',
			'enqueue_style'   => get_template_directory_uri() . '/assets/dist/css/cost-table-block/style.css',
			'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/cost-table-block/script.js',
			'example'         => array(
					'attributes' => array(
							'mode' => 'preview',
							'data' => array(
									'is_preview'         => true,
									'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/cost-table-section.jpg'
							)
					)
			)
	) );
}
