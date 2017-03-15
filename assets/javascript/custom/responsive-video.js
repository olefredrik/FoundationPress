jQuery(document).ready(function () {
    var videos = jQuery('iframe[src*="vimeo.com"], iframe[src*="youtube.com"]');

    videos.each(function () {
        var el = jQuery(this);
        el.wrap('<div class="responsive-embed widescreen"/>');
    });
});
