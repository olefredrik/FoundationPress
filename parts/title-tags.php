<?php

/**
 * Template part title tags
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

  if ( is_category() ) {
    echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
  } elseif ( is_tag() ) {
    echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
  } elseif ( is_archive() ) {
    wp_title( '' ); echo ' Archive | '; bloginfo( 'name' );
  } elseif ( is_search() ) {
    echo 'Search for &quot;'.esc_html( $s ).'&quot; | '; bloginfo( 'name' );
  } elseif ( is_home() || is_front_page() ) {
    bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
  } elseif ( is_404() ) {
    echo 'Error 404 Not Found | '; bloginfo( 'name' );
  } elseif ( is_single() ) {
    wp_title( '' );
  } else {
    echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
  }
?>