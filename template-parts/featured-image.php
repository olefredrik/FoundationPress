<?php

// If a feature image is set, get the id, so it can be injected as a css background property
if (has_post_thumbnail($post->ID) ) :

    $feat_img_id = get_post_thumbnail_id();
    $hero_img_alt = get_post_meta($feat_img_id, '_wp_attachment_image_alt', true); // get alt attribute

    /* Use ID to get the attachment object */
    $lg_hero_array = wp_get_attachment_image_src($feat_img_id, 'fp-large', true); // Large Hero
    $md_hero_array = wp_get_attachment_image_src($feat_img_id, 'fp-medium', true); // Medium Hero
    $sm_hero_array = wp_get_attachment_image_src($feat_img_id, 'fp-small', true); // Mobile Hero

    /* Grab the url from the attachment object */
    $hero_lg = $lg_hero_array[0]; // Large Hero
    $hero_md = $md_hero_array[0]; // Medium Hero
    $hero_sm = $sm_hero_array[0]; // Mobile Hero

    ?>

    <header id="featured-hero" role="banner"
            data-interchange="[<?php echo $hero_lg; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]">
    </header>

<?php endif;
