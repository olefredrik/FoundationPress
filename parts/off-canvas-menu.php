<?php
/**
 * Template part for off canvas menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<nav class="tab-bar">
  <section class="<?php echo $GLOBALS['offcanvasposition'];?>-small">
    <a class="<?php echo $GLOBALS['offcanvasposition'];?>-off-canvas-toggle menu-icon" href="#"><span></span></a>
  </section>
  <section class="middle tab-bar-section">

    <h1 class="title">
      <?php bloginfo( 'name' ); ?>
    </h1>

  </section>
</nav>

<aside class="<?php echo $GLOBALS['offcanvasposition'];?>-off-canvas-menu" aria-hidden="true">
    <?php foundationpress_mobile_off_canvas($GLOBALS['offcanvasposition']); ?>
</aside>
