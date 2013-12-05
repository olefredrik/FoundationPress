<?php
/*
Author: Ole Fredrik Lie
URL: http://olefredrik.com
*/


// Various clean up functions
require_once('library/cleanup.php'); 

// Required for Foundation to work properly
require_once('library/foundation.php');

// Filter default WordPress menu classes
require_once('library/menu.php');

// Enqueue scripts
require_once('library/enqueue-scripts.php');


/**
 * Add theme support
 * ----------------------------------------------------------------------------
 */

function FoundationPress_theme_support() {
    // Add language support
    load_theme_textdomain('FoundationPress', get_template_directory() . '/languages');

    // Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
    add_theme_support('post-thumbnails');
    // set_post_thumbnail_size(150, 150, false);

    // rss thingy
    add_theme_support('automatic-feed-links');

    // Add post formarts support: http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

    // Add menu support: http://codex.wordpress.org/Function_Reference/register_nav_menus
    add_theme_support('menus');
    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'FoundationPress'),
        'utility' => __('Utility Navigation', 'FoundationPress')
    ));
}

add_action('after_setup_theme', 'FoundationPress_theme_support'); 


/**
 * Create widget areas in sidebar and footer
 * ----------------------------------------------------------------------------
 */

$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
        'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
        'after_widget' => '</div></article>',
        'before_title' => '<h6><strong>',
        'after_title' => '</strong></h6>'
    ));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
        'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
        'after_widget' => '</article>',
        'before_title' => '<h6><strong>',
        'after_title' => '</strong></h6>'
    ));
}

/**
 * Return entry meta information for posts, used by multiple loops
 * ----------------------------------------------------------------------------
 */

if(!function_exists('FoundationPress_entry_meta')) :
    function FoundationPress_entry_meta() {
        echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'FoundationPress'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
        echo '<p class="byline author">'. __('Written by', 'FoundationPress') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
    }
endif;

?>