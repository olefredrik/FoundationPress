<?php
/**
 * Allow users to select Topbar or Offcanvas menu. Adds body class of offcanvas or topbar based on which they choose.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'wpt_register_theme_customizer' ) ) :
function wpt_register_theme_customizer( $wp_customize ) {
	// Create custom panels
	$wp_customize->add_panel( 'mobile_menu_settings', array(
	  'priority' => 1000,
	  'theme_supports' => '',
	  'title' => __( 'Mobile Menu Settings', 'foundationpress' ),
	  'description' => __( 'Controls the mobile menu', 'foundationpress' ),
	) );

	// Create custom field for mobile navigation layout
	$wp_customize->add_section( 'mobile_menu_layout' , array(
		'title'	=> __('Mobile navigation layout','foundationpress'),
		'panel' => 'mobile_menu_settings',
		'priority' => 1000,
	));

	// Create custom field for mobile navigation position
	$wp_customize->add_section( 'mobile_menu_position' , array(
		'title'	=> __('Mobile navigation position','foundationpress'),
		'panel' => 'mobile_menu_settings',
		'priority' => 1001,
	));

	// Set default navigation layout
	$wp_customize->add_setting(
		'wpt_mobile_menu_layout',
		array(
			'default'	=> __( 'offcanvas', 'foundationpress' ),
		)
	);

	// Set default navigation position
	$wp_customize->add_setting(
		'wpt_mobile_menu_position',
		array(
			'default'	=> __( 'left', 'foundationpress' ),
		)
	);

	// Add options for navigation layout
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'mobile_menu_layout',
			array(
				'type'		=> 'radio',
				'section' 	=> 'mobile_menu_layout',
				'settings' 	=> 'wpt_mobile_menu_layout',
		        'choices' => array(
		            'offcanvas' => 'Offcanvas',
		            'topbar' => 'Topbar',
		        ),
			)
		)
	);

	// Add options for navigation position
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'mobile_menu_position',
			array(
				'type'		=> 'radio',
				'section' 	=> 'mobile_menu_position',
				'settings' 	=> 'wpt_mobile_menu_position',
		        'choices' => array(
		            'left' => 'left',
		            'right' => 'right',
		        ),
			)
		)
	);
}

add_action( 'customize_register', 'wpt_register_theme_customizer' );

// Return the mobile nav position
add_filter( 'filter_mobile_nav_position', 'mobile_nav_position' );
function mobile_nav_position( $position ) {
	if ( ! get_theme_mod( 'wpt_mobile_menu_position' ) || get_theme_mod( 'wpt_mobile_menu_position' ) == 'left' ) :
		$position = 'left';
	elseif ( get_theme_mod( 'wpt_mobile_menu_position' ) == 'right' ) :
		$position = 'right';
	endif;
	return $position;
}

// Add class to body to help w/ CSS
add_filter( 'body_class', 'mobile_nav_class' );
function mobile_nav_class( $classes ) {
	if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) :
		$classes[] = 'offcanvas';
	elseif ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) :
		$classes[] = 'topbar';
	endif;
	return $classes;
}
endif;
?>
