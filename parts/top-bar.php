<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class="top-bar" id="top-bar-menu">

  <!-- Display the off-canvas menu on small breakpoints -->
  <div class="top-bar-left show-for-small-only">
		<ul class="menu">
      <li><button class="menu-icon" type="button" data-toggle="offCanvas<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>"></button></li>
      <li class="name"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></li>
		</ul>
	</div>

  <!-- Display the regular top-bar menu on medium up breakpoints -->
  <div class="top-bar-left show-for-medium">
    <ul class="menu">
      <li class="name"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></li>
    </ul>
  </div>

  <div class="top-bar-right show-for-medium">
      <?php foundationpress_top_bar_r(); ?>
  </div>

</div>
