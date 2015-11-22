<?php
/**
 * Template part for off canvas menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<nav class="vertical menu off-canvas position-<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>" id="offCanvas<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>" data-off-canvas data-position="<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>" data-accordion-menu role="navigation">
  <?php foundationpress_mobile_off_canvas( apply_filters('filter_mobile_nav_position', 'mobile_nav_position') ); ?>
</nav>
