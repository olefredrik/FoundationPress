<?php
/**
 * Configure responsive images sizes
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 2.2.0
 */

 // Add additional image sizes
 add_image_size( 'fp-small', 640 );
 add_image_size( 'fp-medium', 1024 );
 add_image_size( 'fp-large', 1200 );
 add_image_size( 'fp-xlarge', 1440 );

 // Register the new image sizes for use in the add media modal in wp-admin
 add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
 function wpshout_custom_sizes( $sizes ) {
     return array_merge( $sizes, array(
       'fp-small' => __( 'FP Small' ),
       'fp-medium' => __( 'FP Medium' ),
       'fp-large' => __( 'FP Large' ),
       'fp-xlarge' => __( 'FP X-Large' ),
     ) );
 }

// Add custom image sizes attribute to enhance responsive image functionality for content images
function foundationpress_adjust_image_sizes_attr( $sizes, $size ) {
   $sizes = '
     (max-width: 640px) 85vw,
     (max-width: 1024px) 67vw,
     (max-width: 1200px) 62vw,
     (max-width: 1440px) 58vw, 1200px';
   return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'foundationpress_adjust_image_sizes_attr', 10 , 2 );


// Add custom image sizes attribute to enhance responsive image functionality for post thumbnails
function foundationpress_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar() && $attr['sizes'] = '
    (max-width: 640px) 85vw,
    (max-width: 1024px) 67vw,
    (max-width: 1200px) 60vw,
    (max-width: 1440px) 62vw, 1024px';

		! is_active_sidebar() && $attr['sizes'] = '
      (max-width: 640px) 85vw,
      (max-width: 1024px) 67vw,
      (max-width: 1440px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'foundationpress_post_thumbnail_sizes_attr', 10 , 3 );

?>
