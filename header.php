<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
  <head>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/app.css" />
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
  
<?php wp_head(); ?>

  </head>
  <body <?php body_class(); ?>>

  <div class="off-canvas-wrap">
  <div class="inner-wrap">

  <nav class="tab-bar show-for-small-only">
    <section class="left-small">
      <a class="left-off-canvas-toggle menu-icon" ><span></span></a>
    </section>
    <section class="middle tab-bar-section">
      <h1 class="title"><?php bloginfo( 'name' ); ?></h1>
    </section>
  </nav>

  <aside class="left-off-canvas-menu">
      <?php
          wp_nav_menu( array(
              'theme_location' => 'primary',
              'container' => false,
              'depth' => 0,
              'items_wrap' => '<ul class="off-canvas-list">%3$s</ul>',
              'fallback_cb' => 'FoundationPress_menu_fallback', // workaround to show a message to set up a menu
              'walker' => new FoundationPress_walker( array(
                  'in_top_bar' => true,
                  'item_type' => 'li',
                  'menu_type' => 'main-menu'
              ) ),
          ) );
      ?>
  </aside>
  
  <div class="contain-to-grid">
    <nav class="top-bar show-for-medium-up" data-topbar>
      <ul class="title-area">
        <li class="name">
          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        </li>
      </ul>
   
      <section class="top-bar-section">

      <?php
          wp_nav_menu( array(
              'theme_location' => 'primary',
              'container' => false,
              'depth' => 0,
              'items_wrap' => '<ul class="right">%3$s</ul>',
              'fallback_cb' => 'FoundationPress_menu_fallback', // workaround to show a message to set up a menu
              'walker' => new FoundationPress_walker( array(
                  'in_top_bar' => true,
                  'item_type' => 'li',
                  'menu_type' => 'main-menu'
              ) ),
          ) );
      ?>

      </section>
    </nav>
  </div>

<header class="row" role="banner">
  <div class="small-12 columns">
    <h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
    <h4 class="subheader"><?php bloginfo('description'); ?></h4>
    <hr/>
  </div>
</header>

<section class="container" role="document">
  <div class="row">