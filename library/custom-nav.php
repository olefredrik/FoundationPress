<?php
/**
 * Allow users to select Topbar or Offcanvas menu. Adds body class of offcanvas or topbar based on which they choose.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'wpt_register_theme_customizer' ) ) :
function wpt_register_theme_customizer( $wp_customize ) {

	// Create custom panels
	$wp_customize->add_panel( 'mobile_menu_settings', array(
		'priority'       => 1000,
		'theme_supports' => '',
		'title'          => __( 'Mobile Menu Settings', 'foundationpress' ),
		'description'    => __( 'Controls the mobile menu', 'foundationpress' ),
	) );

	// Create custom field for mobile navigation layout
	$wp_customize->add_section( 'mobile_menu_layout' , array(
		'title'    => __('Mobile navigation layout','foundationpress'),
		'panel'    => 'mobile_menu_settings',
		'priority' => 1000,
	));

	// Set default navigation layout
	$wp_customize->add_setting(
		'wpt_mobile_menu_layout',
		array(
			'default' => __( 'topbar', 'foundationpress' ),
		)
	);

	// Add options for navigation layout
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'mobile_menu_layout',
			array(
				'type'     => 'radio',
				'section'  => 'mobile_menu_layout',
				'settings' => 'wpt_mobile_menu_layout',
				'choices'  => array(
					'topbar'    => 'Topbar',
					'offcanvas' => 'Offcanvas',
				),
			)
		)
	);

}

add_action( 'customize_register', 'wpt_register_theme_customizer' );

// Add class to body to help w/ CSS
add_filter( 'body_class', 'mobile_nav_class' );
function mobile_nav_class( $classes ) {
	if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) :
		$classes[] = 'offcanvas';
	elseif ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) :
		$classes[] = 'topbar';
	endif;
	return $classes;
}
endif;
