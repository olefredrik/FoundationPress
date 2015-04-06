<?php
/**
 * Customize the output of menus for Foundation off-canvas menu with multi-level support
 */
if ( ! class_exists( 'FoundationPress_offcanvas_walker' ) ) :
class FoundationPress_offcanvas_walker extends Walker_Nav_Menu {

	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$element->has_children = ! empty( $children_elements[ $element->ID ] );
		$element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
		$element->classes[] = ( $element->has_children && $max_depth !== 1 ) ? 'has-submenu' : '';

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$item_html = '';
		parent::start_el( $item_html, $object, $depth, $args );

		$classes = empty( $object->classes ) ? array() : (array) $object->classes;

		if ( in_array( 'label', $classes ) ) {
			$item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html );
		}

		$output .= $item_html;
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n<ul class=\"left-submenu\">\n<li class=\"back\"><a href=\"#\">Back</a></li>\n";
	}

}
endif;
?>