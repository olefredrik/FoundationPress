<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class="top-bar title-bar">
  <div class="top-bar-left">
    <ul class="menu">
      <li><button class="menu-icon" type="button" data-open="offCanvas<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>"></button></li>
      <li class="name"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></li>
    </ul>
  </div>

  <div class="top-bar-right">
    <?php foundationpress_top_bar_r(); ?>
  </div>
</div>



<!--
<div class="top-bar-container contain-to-grid">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area top-bar-<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>">
            <li class="name">
                <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
        </ul>
        <section class="top-bar-section">
            <?php foundationpress_top_bar_l(); ?>
            <?php foundationpress_top_bar_r(); ?>
        </section>
    </nav>
</div>
-->
