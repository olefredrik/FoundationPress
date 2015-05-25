<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

register_nav_menus(array(
	'top-bar-l' => 'Left Top Bar', // Registers the menu in the WordPress admin menu editor.
	'top-bar-r' => 'Right Top Bar',
	'mobile-off-canvas' => 'Mobile',
));


/**
 * Left top bar
 * http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'foundationpress_top_bar_l' ) ) {
	function foundationpress_top_bar_l() {
	    wp_nav_menu(array(
	        'container' => false,                           // Remove nav container
	        'container_class' => '',                        // Class of container
	        'menu' => '',                                   // Menu name
	        'menu_class' => 'top-bar-menu left',            // Adding custom nav class
	        'theme_location' => 'top-bar-l',                // Where it's located in the theme
	        'before' => '',                                 // Before each link <a>
	        'after' => '',                                  // After each link </a>
	        'link_before' => '',                            // Before each link text
	        'link_after' => '',                             // After each link text
	        'depth' => 5,                                   // Limit the depth of the nav
	        'fallback_cb' => false,                         // Fallback function (see below)
	        'walker' => new Foundationpress_Top_Bar_Walker(),
	    ));
	}
}

/**
 * Right top bar
 */
if ( ! function_exists( 'foundationpress_top_bar_r' ) ) {
	function foundationpress_top_bar_r() {
	    wp_nav_menu(array(
	        'container' => false,                           // Remove nav container
	        'container_class' => '',                        // Class of container
	        'menu' => '',                                   // Menu name
	        'menu_class' => 'top-bar-menu right',           // Adding custom nav class
	        'theme_location' => 'top-bar-r',                // Where it's located in the theme
	        'before' => '',                                 // Before each link <a>
	        'after' => '',                                  // After each link </a>
	        'link_before' => '',                            // Before each link text
	        'link_after' => '',                             // After each link text
	        'depth' => 5,                                   // Limit the depth of the nav
	        'fallback_cb' => false,                         // Fallback function (see below)
	        'walker' => new Foundationpress_Top_Bar_Walker(),
	    ));
	}
}

/**
 * Mobile off-canvas
 */
if ( ! function_exists( 'foundationpress_mobile_off_canvas' ) ) {
	function foundationpress_mobile_off_canvas() {
	    wp_nav_menu(array(
	        'container' => false,                           // Remove nav container
	        'container_class' => '',                        // Class of container
	        'menu' => '',                                   // Menu name
	        'menu_class' => 'off-canvas-list',              // Adding custom nav class
	        'theme_location' => 'mobile-off-canvas',        // Where it's located in the theme
	        'before' => '',                                 // Before each link <a>
	        'after' => '',                                  // After each link </a>
	        'link_before' => '',                            // Before each link text
	        'link_after' => '',                             // After each link text
	        'depth' => 5,                                   // Limit the depth of the nav
	        'fallback_cb' => false,                         // Fallback function (see below)
	        'walker' => new Foundationpress_Offcanvas_Walker(),
	    ));
	}
}

/**
 * Add support for buttons in the top-bar menu:
 * 1) In WordPress admin, go to Apperance -> Menus.
 * 2) Click 'Screen Options' from the top panel and enable 'CSS CLasses' and 'Link Relationship (XFN)'
 * 3) On your menu item, type 'has-form' in the CSS-classes field. Type 'button' in the XFN field
 * 4) Save Menu. Your menu item will now appear as a button in your top-menu
*/
if ( ! function_exists( 'foundationpress_add_menuclass' ) ) {
	function foundationpress_add_menuclass($ulclass) {
	    $find = array('/<a rel="button"/', '/<a title=".*?" rel="button"/');
	    $replace = array('<a rel="button" class="button"', '<a rel="button" class="button"');

	    return preg_replace( $find, $replace, $ulclass, 1 );
	}
	add_filter( 'wp_nav_menu','foundationpress_add_menuclass' );
}

?>
