<?php
/**
 * Template part for off canvas menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<aside class="<?php echo $GLOBALS['offcanvasposition'];?>-off-canvas-menu" aria-hidden="true">
    <?php foundationpress_mobile_off_canvas($GLOBALS['offcanvasposition']); ?>
</aside>
