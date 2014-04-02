<?php
function foundationpress_sidebars_widgets() {
    $sidebars = array('Sidebar');
    foreach ($sidebars as $sidebar) {
        register_sidebar(array(
            'name'=> $sidebar,
            'id'=> 'foundationpress_sidebar',
            'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
            'after_widget' => '</div></article>',
            'before_title' => '<h6><strong>',
            'after_title' => '</strong></h6>'
        ));
    }
    do_action('framework_sidebars');
}
add_action( 'widgets_init', 'foundationpress_sidebars_widgets' );

function foundationpress_footer_widgets() {
    $sidebars = array('Footer');
    foreach ($sidebars as $sidebar) {
        register_sidebar(array(
            'name'=> $sidebar,
            'id'=> 'foundationpress_footer',
            'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
            'after_widget' => '</article>',
            'before_title' => '<h6><strong>',
            'after_title' => '</strong></h6>'
        ));
    }
    do_action('framework_footerwidget');
}
add_action( 'widgets_init', 'foundationpress_footer_widgets' );
?>
