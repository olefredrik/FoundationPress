<?php
/**
 * PHPUnit bootstrap file
 *
 * @package FoundationPress
 */

$_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL;
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Registers theme
 */
function _register_theme() {

	$theme_dir = dirname( __DIR__ );
	$current_theme = basename( $theme_dir );
	$theme_root = dirname( $theme_dir );

	add_filter( 'theme_root', function() use ( $theme_root ) {
		return $theme_root;
	} );

	register_theme_directory( $theme_root );

	add_filter( 'pre_option_template', function() use ( $current_theme ) {
		return $current_theme;
	});
	add_filter( 'pre_option_stylesheet', function() use ( $current_theme ) {
		return $current_theme;
	});
}
tests_add_filter( 'muplugins_loaded', '_register_theme' );


// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';
