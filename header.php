<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package byou
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="page-container">

	<header class="header">
        <div class="inner">
            <nav class="header__menu">
							<?php
							wp_nav_menu(
									array(
											'theme_location' => 'header',

									)
							);
							?>
            </nav>
            <div class="logo">
							<?php
							the_custom_logo();
							if ( is_front_page() && is_home() ) :
								?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							else :
								?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
							endif;
							$byou_description = get_bloginfo( 'description', 'display' );
							if ( $byou_description || is_customize_preview() ) :
								?>
                  <p class="site-description"><?php echo $byou_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
							<?php endif; ?>
            </div>
            <div class="addition">
                <a href="">Shop</a>
                <a href="">Contact Us</a>
                <a href="" class="btn">Book Free Consultation</a>
            </div>
        </div>
	</header>
