<?php
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
        'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
        'after_widget' => '</div></article>',
        'before_title' => '<h6><strong>',
        'after_title' => '</strong></h6>'
    ));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
        'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
        'after_widget' => '</article>',
        'before_title' => '<h6><strong>',
        'after_title' => '</strong></h6>'
    ));
}
?>