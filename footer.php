<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package byou
 */

?>

<footer class="footer">
    <div class="inner">
        <div class="columns">
            <div class="column__one">
              <?php if ( have_rows( 'subscribe', 'option' ) ) : ?>
                <div class="subscribe">
                <?php while ( have_rows( 'subscribe', 'option' ) ) : the_row(); ?>
                    <div class="title"><?php the_sub_field( 'title' ); ?></div>
                    <div class="text"><?php the_sub_field( 'text' ); ?></div>
                    <form class="subscribe__form">
                        <input type="email" placeholder="name@address.com">
                    </form>
                <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
            <div class="column__two">
              <?php if ( have_rows( 'menu', 'option' ) ) : ?>
                <nav class="footer__menu">
                    <ul class="footer__menu_list">
                <?php while ( have_rows( 'menu', 'option' ) ) : the_row(); ?>
                  <?php $link = get_sub_field( 'link' ); ?>
                  <?php if ( $link ) : ?>
                        <li class="menu-item">
                            <a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>">
                              <?php echo esc_html( $link['title'] ); ?>
                            </a>
                        </li>
                  <?php endif; ?>
                <?php endwhile; ?>
                    </ul>
                </nav>
              <?php endif; ?>
            </div>
            <div class="column__three">
              <?php if ( have_rows( 'locations', 'option' ) ) : ?>
                <div class="contacts">
                  <?php while ( have_rows( 'locations', 'option' ) ) : the_row(); ?>
                    <div class="title"><?php the_sub_field( 'title' ); ?></div>
                    <?php if ( have_rows( 'contact' ) ) : ?>
                      <?php while ( have_rows( 'contact' ) ) : the_row(); ?>
                        <div class="contacts_item">
							<?php the_sub_field( 'item' ); ?>
                        </div>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
				<?php endif; ?>
            </div>
        </div>
        <div class="middle">
          <?php if ( have_rows( 'follow_us_on', 'option' ) ) : ?>
            <div class="follow">
            <?php while ( have_rows( 'follow_us_on', 'option' ) ) : the_row(); ?>
              <div class="title"><?php the_sub_field( 'title' ); ?></div>
              <div class="socials">
                <?php if ( have_rows( 'socials' ) ) : ?>
                  <?php while ( have_rows( 'socials' ) ) : the_row(); ?>
                        <a href="<?php echo get_sub_field( 'link' ); ?>"><i class="fa-brands fa-<?php echo get_sub_field( 'social_icon' )['value']; ?> icon"></i></a>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="bottom">
          <?php if ( have_rows( 'copyright', 'option' ) ) : ?>
            <?php while ( have_rows( 'copyright', 'option' ) ) : the_row(); ?>
              <div class="copyright"><?php the_sub_field( 'text' ); ?></div>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php if ( have_rows( 'additional_links', 'option' ) ) : ?>
            <div class="additional">
              <?php while ( have_rows( 'additional_links', 'option' ) ) : the_row(); ?>
                <?php if ( have_rows( 'item' ) ) : ?>
                  <?php while ( have_rows( 'item' ) ) : the_row(); ?>
                    <?php $link = get_sub_field( 'link' ); ?>
                    <?php if ( $link ) : ?>
                              <a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>" class="item">
                                <?php echo esc_html( $link['title'] ); ?>
                              </a>
                    <?php endif; ?>
                  <?php endwhile; ?>
                <?php endif; ?>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>
<div class="menuMobile">
    <div class="menu__close"><span></span></div>
    <div class="logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
					$logo_white     = get_field( 'logo_white', 'option' );
					if ( $logo_white ) {
						echo '<img src="' . esc_url( $logo_white['url'] ) . '" alt="' . $logo_white['alt'] . '" class="logo__white">';
					} elseif ( has_custom_logo() ) {
						echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
					} else {
						echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
					}
					?>
        </a>
    </div>
	<?php
	wp_nav_menu(
			array(
					'theme_location'  => 'services-mobile',
					'container'       => 'nav',
					'container_class' => 'services__menu_mobile',
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
					'depth'           => 2
			)
	);
	wp_nav_menu(
			array(
					'theme_location'  => 'header-mobile',
					'container'       => 'nav',
					'container_class' => 'header__menu_mobile',
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
					'depth'           => 2
			)
	);
	?>
    <div class="social">
        <a href="" class="icon"><i class="fa-brands fa-instagram"></i> </a>
        <a href="" class="icon"><i class="fa-brands fa-facebook-f"></i> </a>
        <a href="" class="icon"><i class="fa-brands fa-twitter"></i> </a>
        <a href="" class="icon"><i class="fa-brands fa-pinterest"></i> </a>
    </div>
    <div class="buttons">
        <a href="" class="button button__white">FREE CONSULTATION</a>
        <a href="" class="button button__bordered_white">CALL US</a>
    </div>
</div>
<div class="floatMenu">
    <div class="buttons">
        <?php $free_consultation_button = get_field( 'free_consultation_button', 'option' ); ?>
        <?php if ( $free_consultation_button ) : ?>
            <a href="<?php echo esc_url( $free_consultation_button['url'] ); ?>" target="<?php echo $free_consultation_button['target']?:'_self'; ?>" class="button button_blue">
              <?php echo esc_html( $free_consultation_button['title'] ); ?>
            </a>
	    <?php endif; ?>
		<?php $call_us_button = get_field( 'call_us_button', 'option' ); ?>
		<?php if ( $call_us_button ) : ?>
            <a href="<?php echo esc_url( $call_us_button['url'] ); ?>" target="<?php echo $call_us_button['target']?:'_self'; ?>" class="button button_blue_bordered">
              <?php echo esc_html( $call_us_button['title'] ); ?>
            </a>
		<?php endif; ?>
    </div>
	<?php $shop_now_button = get_field( 'shop_now_button', 'option' ); ?>
	<?php if ( $shop_now_button ) : ?>
      <a href="<?php echo esc_url( $shop_now_button['url'] ); ?>" target="<?php echo $shop_now_button['target']?:'_self'; ?>" class="button_black">
        <?php echo esc_html( $shop_now_button['title'] ); ?>
      </a>
	<?php endif; ?>
</div>
</body>
</html>
