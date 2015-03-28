<?php

/**
 * Start cleanup functions
 * ----------------------------------------------------------------------------
 */



if ( ! function_exists( 'foundationpress_start_cleanup' ) ) :
function foundationpress_start_cleanup() {

	// launching operation cleanup
	add_action( 'init', 'foundationpress_cleanup_head' );

	// remove WP version from RSS
	add_filter( 'the_generator', 'foundationpress_remove_rss_version' );

	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'foundationpress_remove_wp_widget_recent_comments_style', 1 );

	// clean up comment styles in the head
	add_action( 'wp_head', 'foundationpress_remove_recent_comments_style', 1 );

	// clean up gallery output in wp
	add_filter( 'foundationpress_gallery_style', 'foundationpress_gallery_style' );

	// additional post related cleaning
	add_filter( 'get_foundationpress_image_tag_class', 'foundationpress_image_tag_class', 0, 4 );
	add_filter( 'get_image_tag', 'foundationpress_image_editor', 0, 4 );
	add_filter( 'the_content', 'img_unautop', 30 );

}
add_action( 'after_setup_theme','foundationpress_start_cleanup' );
endif;
/**
 * Clean up head
 * ----------------------------------------------------------------------------
 */

if ( ! function_exists( 'foundationpress_cleanup_head' ) ) :
function foundationpress_cleanup_head() {

	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );

	// Category feed links
	remove_action( 'wp_head', 'feed_links_extra', 3 );

	// Post and comment feed links
	remove_action( 'wp_head', 'feed_links', 2 );

	// Windows Live Writer
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// Index link
	remove_action( 'wp_head', 'index_rel_link' );

	// Previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

	// Start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

	// Canonical
	remove_action( 'wp_head', 'rel_canonical', 10, 0 );

	// Shortlink
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

	// Links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

	// WP version
	remove_action( 'wp_head', 'wp_generator' );

	// Remove WP version from css
	add_filter( 'style_loader_src', 'foundationpress_remove_wp_ver_css_js', 9999 );

	// Remove WP version from scripts
	add_filter( 'script_loader_src', 'foundationpress_remove_wp_ver_css_js', 9999 );

	// Prevent unneccecary info from being displayed
	add_filter( 'login_errors',create_function( '$a', 'return null;' ) );

}
endif;

// remove WP version from RSS
if ( ! function_exists( 'foundationpress_remove_rss_version' ) ) :
function foundationpress_remove_rss_version() { return ''; }
endif;

if ( ! function_exists( 'foundationpress_remove_wp_ver_css_js' ) ) :
// remove WP version from scripts
function foundationpress_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src ); }
	return $src;
}
endif;

// remove injected CSS for recent comments widget
if ( ! function_exists( 'foundationpress_remove_wp_widget_recent_comments_style' ) ) :
function foundationpress_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
	  remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}
endif;

// remove injected CSS from recent comments widget
if ( ! function_exists( 'foundationpress_remove_recent_comments_style' ) ) :
function foundationpress_remove_recent_comments_style() {
	global $wp_widget_factory;
	if ( isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments']) ) {
	remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}
endif;

// remove injected CSS from gallery
if ( ! function_exists( 'foundationpress_gallery_style' ) ) :
function foundationpress_gallery_style($css) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}
endif;

/**
 * Clean up image tags
 * ----------------------------------------------------------------------------
 */


// Remove default inline style of wp-caption


if ( ! function_exists( 'foundationpress_fixed_img_caption_shortcode' ) ) :
add_shortcode( 'wp_caption', 'foundationpress_fixed_img_caption_shortcode' );
add_shortcode( 'caption', 'foundationpress_fixed_img_caption_shortcode' );
function foundationpress_fixed_img_caption_shortcode($attr, $content = null) {
	if ( ! isset( $attr['caption'] ) ) {
		if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
			$content = $matches[1];
			$attr['caption'] = trim( $matches[2] );
		}
	}
	$output = apply_filters( 'img_caption_shortcode', '', $attr, $content );
	if ( $output != '' ) {
		return $output; }
	extract(shortcode_atts(array(
		'id'    => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => '',
		'class'   => '',
	), $attr));
	if ( 1 > (int) $width || empty($caption) ) {
		return $content; }

	$markup = '<figure';
	if ( $id ) { $markup .= ' id="' . esc_attr( $id ) . '"'; }
	if ( $class ) { $markup .= ' class="' . esc_attr( $class ) . '"'; }
	$markup .= '>';
	$markup .= do_shortcode( $content ) . '<figcaption>' . $caption . '</figcaption></figure>';
	return $markup;
}
endif;

// Clean the output of attributes of images in editor
if ( ! function_exists( 'foundationpress_image_tag_class' ) ) :
function foundationpress_image_tag_class($class, $id, $align, $size) {
	$align = 'align' . esc_attr( $align );
	return $align;
}
endif;

// Remove width and height in editor, for a better responsive world.
if ( ! function_exists( 'foundationpress_image_editor' ) ) :
function foundationpress_image_editor($html, $id, $alt, $title) {
	return preg_replace(array(
			'/\s+width="\d+"/i',
			'/\s+height="\d+"/i',
			'/alt=""/i',
		),
		array(
			'',
			'',
			'',
			'alt="' . $title . '"',
		),
		$html);
}
endif;

// Wrap images with figure tag - Credit: Robert O'Rourke - http://bit.ly/1q0WHFs
if ( ! function_exists( 'img_unauto' ) ) :
function img_unautop($pee) {
	$pee = preg_replace( '/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee );
	return $pee;
}
endif;

?>
