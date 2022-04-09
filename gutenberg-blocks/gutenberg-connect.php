<?php

if (function_exists('acf_register_block_type')) {
	add_action('acf/init', 'register_acf_block_type');
}

function builder_blocks($categories, $post)
{
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'byou-blocks',
				'title' => __('Blocks', 'byou'),
			),
		)
	);
}

add_filter('block_categories', 'builder_blocks', 10, 2);

function register_acf_block_type()
{
	acf_register_block_type(array(
		'name' => 'intro-block',
		'title' => __('Intro Block', 'byou'),
		'category' => 'byou-blocks',
		'icon' => 'admin-home',
		'keywords' => array('intro'),
		'post_types' => array('page'),
		'mode' => 'preview',
		'align' => 'full',
		'supports' => array(
			'align' => true,
			'jsx' => true,
			'anchor' => true
		),
		'render_template' => 'gutenberg-blocks/intro-block/tpl.php',
		'enqueue_style' => get_template_directory_uri() . '/assets/dist/css/intro-block/style.css',
		//'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/intro-block/script.js',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'is_preview' => true,
					'preview_image_help' => IT_URL . '/gutenberg-blocks/previews/intro-section.jpg'
				)
			)
		)
	));
}
