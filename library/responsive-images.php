<?php
/**
 * Configure responsive images sizes
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 2.6.0
 */

 // Add additional image sizes
 add_image_size( 'fp-small', 640 );
 add_image_size( 'fp-medium', 1024 );
 add_image_size( 'fp-large', 1200 );

 // Register the new image sizes for use in the add media modal in wp-admin
 add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
 function wpshout_custom_sizes( $sizes ) {
     return array_merge( $sizes, array(
       'fp-small' => __( 'FP Small' ),
       'fp-medium' => __( 'FP Medium' ),
       'fp-large' => __( 'FP Large' ),
     ) );
 }

// Add custom image sizes attribute to enhance responsive image functionality for content images
function foundationpress_adjust_image_sizes_attr( $sizes, $size ) {
   $sizes = '
     (max-width: 640px) 640px,
     (max-width: 1024px) 1024px,
     (max-width: 1200px) 1200px,
     (min-width: 1201px) 1200px, 100vw';
   return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'foundationpress_adjust_image_sizes_attr', 10 , 2 );


// Remove inline width and height attributes for post thumbnails
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
  return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
