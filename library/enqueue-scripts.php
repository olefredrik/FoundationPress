<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


if ( ! function_exists( 'foundationpress_scripts' ) ) :
	function foundationpress_scripts() {

		// Check to see if rev-manifest exists for CSS and JS static asset revisioning
		//https://github.com/sindresorhus/gulp-rev/blob/master/integration.md
		function css_asset_path($filename) {
			$manifest_path = dirname(dirname(__FILE__)) . '/dist/assets/css/rev-manifest.json';

			if (file_exists($manifest_path)) {
				$manifest = json_decode(file_get_contents($manifest_path), TRUE);
			} else {
				$manifest = [];
			}

			if (array_key_exists($filename, $manifest)) {
				return $manifest[$filename];
			}

			return $filename;
		}

		function js_asset_path($filename) {
			$manifest_path = dirname(dirname(__FILE__)) . '/dist/assets/js/rev-manifest.json';

			if (file_exists($manifest_path)) {
				$manifest = json_decode(file_get_contents($manifest_path), TRUE);
			} else {
				$manifest = [];
			}

			if (array_key_exists($filename, $manifest)) {
				return $manifest[$filename];
			}

			return $filename;
		}

		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet',  get_template_directory_uri() . '/dist/assets/css/' . css_asset_path('app.css'), array(), '2.10.4', 'all' );

		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', false );

		// Enqueue Founation scripts
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/dist/assets/js/' . js_asset_path('app.js'), array( 'jquery' ), '2.10.4', true );

		// Enqueue FontAwesome from CDN. Uncomment the line below if you don't need FontAwesome.
		//wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/5016a31c8c.js', array(), '4.7.0', true );


		// Add the comment-reply library on pages where it is necessary
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );
endif;
