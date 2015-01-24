<?php

if (!function_exists('FoundationPress_scripts')) :
  function FoundationPress_scripts() {

    // deregister the jquery version bundled with wordpress
    wp_deregister_script( 'jquery' );

    // register scripts - header
    wp_register_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array(), '1.0.0', false );
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/vendor/jquery.js', array(), '1.0.0', false );


    // register scripts - footer
    wp_register_script( 'foundation', get_template_directory_uri() . '/js/foundation.js', array('jquery'), '1.0.0', true );

	/*

	wp_register_script( 'foundation.abide', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.abide.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'foundation.accordion', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.accordion.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'foundation.alert', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.alert.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'foundation.clearing', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.clearing.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'foundation.dropdown', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.dropdown.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'foundation.equalizer', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.equalizer.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'foundation.interchange', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.interchange.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'foundation.joyride', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.joyride.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'foundation.magellan', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.magellan.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'foundation.offcanvas', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.offcanvas.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'foundation.orbit', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.orbit.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'foundation.reveal', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.reveal.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'foundation.tab', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.tab.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'foundation.tooltip', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.tooltip.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'foundation.topbar', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.topbar.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'fastclick', get_template_directory_uri() . '/js/foundation/js/vendor/fastclick.js', array('jquery'), '1.0.0', true );

	*/

    // enqueue scripts
    wp_enqueue_script('modernizr');
    wp_enqueue_script('jquery');
    wp_enqueue_script('foundation');

	/*

    wp_enqueue_script('foundation.abide');
    wp_enqueue_script('foundation.accordion');
    wp_enqueue_script('foundation.alert');
    wp_enqueue_script('foundation.clearing');
    wp_enqueue_script('foundation.dropdown');
    wp_enqueue_script('foundation.equalizer');
    wp_enqueue_script('foundation.interchange');
    wp_enqueue_script('foundation.joyride');
    wp_enqueue_script('foundation.magellan');
    wp_enqueue_script('foundation.offcanvas');
    wp_enqueue_script('foundation.orbit');
    wp_enqueue_script('foundation.reveal');

    wp_enqueue_script('foundation.tab');
    wp_enqueue_script('foundation.tooltip');
    wp_enqueue_script('foundation.topbar');
    wp_enqueue_script('fastclick');


	if(is_home() || is_front_page()):
		wp_register_script( 'foundation.slider', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.slider.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script('foundation.slider');
	endif;

	*/



  }

  add_action( 'wp_enqueue_scripts', 'FoundationPress_scripts' ,5);
endif;


if (!function_exists('FoundationPress_js_script')) :
function FoundationPress_js_script() {
?>
<script type="text/javascript">

if ( undefined !== window.jQuery ) {

  jQuery( document ).ready(function( $ ) {

		(function( $ ) {

			$(document).foundation();

		})(jQuery);

	})
}

</script>
<?php
}
add_action( 'wp_footer', 'FoundationPress_js_script',10);
endif;

?>
