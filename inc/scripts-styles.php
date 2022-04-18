<?php
/**
 * Enqueue scripts and styles.
 */
function byou_scripts() {
	wp_enqueue_style( 'byou-style', get_template_directory_uri() . '/assets/dist/css/styles.css', array(), _S_VERSION );
	wp_enqueue_style( 'byou-swear-display', 'https://use.typekit.net/kbw6qxr.css', array(), _S_VERSION );
	wp_enqueue_style( 'byou-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap', array(), _S_VERSION );

	wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css', array(), _S_VERSION);
//	wp_enqueue_style( 'starter-fa', 'https://use.fontawesome.com/releases/v5.10.2/css/all.css' ); //Font Awesome - remove if not needed

	wp_enqueue_script( 'byou-script', get_template_directory_uri() . '/assets/dist/js/app.min.js', array( 'jquery' ), _S_VERSION, true );
	wp_localize_script( 'byou-script', 'ajax_posts', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' )
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'byou_scripts' );