<?php


function FoundationPress_scripts() {
	wp_enqueue_script( 'bower-modernizr', get_template_directory_uri() . '/bower_components/modernizr/modernizr.js', array(), '1.0.0', false );
	wp_enqueue_script( 'bower-jquery', get_template_directory_uri() . '/bower_components/jquery/jquery.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'bower-foundation', get_template_directory_uri() . '/bower_components/foundation/js/foundation.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array(), '1.0.0', true );
	wp_deregister_script( 'jquery' );

}

add_action( 'wp_enqueue_scripts', 'FoundationPress_scripts' );

?>