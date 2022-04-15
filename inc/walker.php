<?php
function add_menu_description( $item_output, $item, $depth, $args ) {
	global $parent_item;
	$parent_item = $item->ID;
	return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'add_menu_description', 10, 4 );

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

	/**
	 * Starts the element output.
	 *
	 * @param string   $output Passed by reference. Used to append additional content.
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @param int      $id     Current item ID.
	 *
	 * @see   Walker::start_el()
	 *
	 * @since 3.0.0
	 * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
	 *
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<div' . $id . $class_names . '>';

		$atts           = array();
		$atts['title']  = !empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = !empty( $item->target ) ? $item->target : '';
		$atts['rel']    = !empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = !empty( $item->url ) ? $item->url : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( !empty( $value ) ) {
				$value      = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		if ( $depth == 1 ) {
			$item_output = $args->before;

			$image       = get_field( 'image', $item );
			$image_on    = get_field( 'image_description_onoff', $item );
			$title_onoff = get_field( 'title_onoff', $item ) == true ? ' style="display:none;"' : ' style="display:block;"';
			if ( $image ) {
				$item_output .= '<div class="sub-menu__image">';
				$item_output .= $args->link_before . $args->link_after;
				$item_output .= '<img src="' . $image['url'] . '">';
				if ( $image_on ) {
					$item_output .= '<div class="sub-menu__image_title">' . $item->title . '</div>';
				}
				$item_output .= '</div>';
			} else {
				$item_output .= '<div class="sub-menu__title"'.$title_onoff.'>';
				$item_output .= $args->link_before . $title . $args->link_after;
				$item_output .= '</div>';
			}

			$item_output .= $args->after;
		} else {
			$item_output = $args->before;
			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . $title . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
		}

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$output .= "</div>{$n}";
	}

	/**
	 * @param $output
	 * @param $depth
	 * @param $args
	 *
	 * @return void
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		global $parent_item;
		$post_id = get_post_meta( $parent_item, '_menu_item_object_id', true );
		if ( $depth == 1 ) {
			$output .= "\n$indent<div class='sub-menu__wrapper depth-{$depth}'><div class='sub-menu'><div class='columns'><div class='menu__items'> \n";
		} else {
			$output .= "\n$indent<div class='sub-menu'><div class='sub-menu__wrapper depth-{$depth}'><div class='columns'> \n";
		}
	}

	/**
	 * @param $output
	 * @param $depth
	 * @param $args
	 *
	 * @return void
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		global $parent_item;
		$post_id    = get_post_meta( $parent_item, '_menu_item_object_id', true );
		$post_image = get_the_post_thumbnail( $post_id, 'full' );
		if ( $depth == 1 ) {
			$output .= "$indent</div></div></div></div>\n";
		} else {
			$output .= "$indent</div></div></div>\n";
		}

	}
}

/**
 * @param $items
 * @param $args
 *
 * @return mixed
 */
//function my_wp_nav_menu_objects( $items, $args ) {
//
//	// loop
//	foreach ( $items as &$item ) {
//
//		// vars
//		$image = get_field( 'image', $item );
//		if ( $image ) {
//			$item->title .= '<div>';
//			$item->title .= ' <img src="' . $image['url'] . '">';
//			$item->title .= '</div>';
//		}
//
//	}
//
//
//	// return
//	return $items;
//
//}
//
//add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2 );