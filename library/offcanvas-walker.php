<?php
/**
 * Customize the output of menus for Foundation off-canvas menu with multi-level support
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker

if ( ! class_exists( 'Foundationpress_Offcanvas_Walker' ) ) :
class Foundationpress_Offcanvas_Walker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"vertical nested menu\">\n";
	}
}
endif;
?>
