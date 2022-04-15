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
            <div class="top">
                <div class="inner">
                    <button class="menu-toggle hamburger hamburger--slider" type="button" aria-controls="primary-menu"
                            aria-expanded="false">
					<span class="hamburger-box">
					    <span class="hamburger-inner"></span>
					</span>
                    </button>
									<?php
									wp_nav_menu(
											array(
													'theme_location' => 'header',
													'container'       => 'nav',
													'container_class' => 'header__menu',
													'container_id'    => '',
													'menu_class'      => 'header__menu_list',
													'menu_id'         => 'header__menu_id',
													'echo'            => true,
													'fallback_cb'     => 'wp_page_menu',
													'before'          => '',
													'after'           => '',
													'link_before'     => '',
													'link_after'      => '',
													'items_wrap'      => '%3$s',
													'depth'           => 1,
													'walker'          => new Custom_Walker_Nav_Menu()
											)
									);
									?>
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                          <?php
                          $custom_logo_id = get_theme_mod( 'custom_logo' );
                          $logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
                          $logo_white     = get_field( 'logo_white', 'option' );
                          $logo_color     = get_field( 'logo_color', 'option' );
                          if ( $logo_white || $logo_color ) {
                              echo '<img src="' . esc_url( $logo_white['url'] ) . '" alt="' . $logo_white['alt'] . '" class="logo__white">';
                              echo '<img src="' . esc_url( $logo_color['url'] ) . '" alt="' . $logo_color['alt'] . '" class="logo__color">';
                          } elseif ( has_custom_logo() ) {
                              echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                          } else {
                              echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
                          }
                          ?>
                        </a>
                    </div>
                    <div class="addition">
                        <a href="">Shop</a>
                        <a href="">Contact Us</a>
                        <a href="" class="button__blue">Book Free Consultation</a>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="bottom__main">
							<?php
							wp_nav_menu(
									array(
											'theme_location' => 'services',
											'container'       => 'nav',
											'container_class' => 'services__menu',
											'container_id'    => '',
											'menu_class'      => 'services__menu_list',
											'menu_id'         => 'services__menu_id',
											'echo'            => true,
											'fallback_cb'     => 'wp_page_menu',
											'before'          => '',
											'after'           => '',
											'link_before'     => '',
											'link_after'      => '',
											'items_wrap'      => '%3$s',
											'depth'           => 3,
											'walker'          => new Custom_Walker_Nav_Menu()
									)
							);
							?>
                </div>
            </div>
        </div>
	</header>
