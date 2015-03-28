<?php

// The Header-image
	$defaults = array(

	'default-image'   => '',
	'width'           => 0,
	'height'          => 0,
	'flex-width'      => false,
	'flex-height'     => false,
	'uploads'         => true,
	'random-default'  => false,
	'header-text'     => false,
	'default-text-color'  => '',
	'wp-head'             => '',
	'admin-head-callback' => '',
	'admin-preview-callback' => '',
);

	add_theme_support( 'custom-header', $defaults );

	?>