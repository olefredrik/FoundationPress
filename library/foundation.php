<?php
/**
 * Foundation PHP template
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

// Pagination.
if ( ! function_exists( 'foundationpress_pagination' ) ) :
	function foundationpress_pagination() {
		global $wp_query;

		$big = 999999999; // This needs to be an unlikely integer

		// For more options and info view the docs for paginate_links()
		// http://codex.wordpress.org/Function_Reference/paginate_links
		$paginate_links = paginate_links(
			array(
				'base'      => str_replace( $big, '%#%', html_entity_decode( get_pagenum_link( $big ) ) ),
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
				'mid_size'  => 5,
				'prev_next' => true,
				'prev_text' => __( '&laquo;', 'foundationpress' ),
				'next_text' => __( '&raquo;', 'foundationpress' ),
				'type'      => 'list',
			)
		);

		$paginate_links = str_replace( "<ul class='page-numbers'>", "<ul class='pagination text-center' role='navigation' aria-label='Pagination'>", $paginate_links );
		$paginate_links = str_replace( '<li><span class="page-numbers dots">', "<li><a href='#'>", $paginate_links );
		$paginate_links = str_replace( '</span>', '</a>', $paginate_links );
		$paginate_links = str_replace( "<li><span class='page-numbers current'>", "<li class='current'>", $paginate_links );
		$paginate_links = str_replace( "<li><a href='#'>&hellip;</a></li>", "<li><span class='dots'>&hellip;</span></li>", $paginate_links );
		$paginate_links = preg_replace( '/\s*page-numbers/', '', $paginate_links );

		// Display the pagination if more than one page is found.
		if ( $paginate_links ) {
			echo $paginate_links;
		}
	}
endif;

/**
 * A fallback when no navigation is selected by default.
 */

if ( ! function_exists( 'foundationpress_menu_fallback' ) ) :
	function foundationpress_menu_fallback() {
		echo '<div class="alert-box secondary">';
		/* translators: %1$s: link to menus, %2$s: link to customize. */
		printf(
			__( 'Please assign a menu to the primary menu location under %1$s or %2$s the design.', 'foundationpress' ),
			/* translators: %s: menu url */
			sprintf(
				__( '<a href="%s">Menus</a>', 'foundationpress' ),
				get_admin_url( get_current_blog_id(), 'nav-menus.php' )
			),
			/* translators: %s: customize url */
			sprintf(
				__( '<a href="%s">Customize</a>', 'foundationpress' ),
				get_admin_url( get_current_blog_id(), 'customize.php' )
			)
		);
		echo '</div>';
	}
endif;

// Add Foundation 'is-active' class for the current menu item.
if ( ! function_exists( 'foundationpress_active_nav_class' ) ) :
	function foundationpress_active_nav_class( $classes, $item ) {
		if ( $item->current == 1 || $item->current_item_ancestor == true ) {
			$classes[] = 'is-active';
		}
		return $classes;
	}
	add_filter( 'nav_menu_css_class', 'foundationpress_active_nav_class', 10, 2 );
endif;

/**
 * Use the is-active class of ZURB Foundation on wp_list_pages output.
 * From required+ Foundation http://themes.required.ch.
 */
if ( ! function_exists( 'foundationpress_active_list_pages_class' ) ) :
	function foundationpress_active_list_pages_class( $input ) {

		$pattern = '/current_page_item/';
		$replace = 'current_page_item is-active';

		$output = preg_replace( $pattern, $replace, $input );

		return $output;
	}
	add_filter( 'wp_list_pages', 'foundationpress_active_list_pages_class', 10, 2 );
endif;

/**
 * Enable Foundation responsive embeds for WP video embeds
 */

if ( ! function_exists( 'foundationpress_responsive_video_oembed_html' ) ) :
	function foundationpress_responsive_video_oembed_html( $html, $url, $attr, $post_id ) {

		// Whitelist of oEmbed compatible sites that **ONLY** support video.
		// Cannot determine if embed is a video or not from sites that
		// support multiple embed types such as Facebook.
		// Official list can be found here https://codex.wordpress.org/Embeds
		$video_sites = array(
			'youtube', // first for performance
			'collegehumor',
			'dailymotion',
			'funnyordie',
			'ted',
			'videopress',
			'vimeo',
		);

		$is_video = false;

		// Determine if embed is a video
		foreach ( $video_sites as $site ) {
			// Match on `$html` instead of `$url` because of
			// shortened URLs like `youtu.be` will be missed
			if ( strpos( $html, $site ) ) {
				$is_video = true;
				break;
			}
		}

		// Process video embed
		if ( true == $is_video ) {

			// Find the `<iframe>`
			$doc = new DOMDocument();
			$doc->loadHTML( $html );
			$tags = $doc->getElementsByTagName( 'iframe' );

			// Get width and height attributes
			foreach ( $tags as $tag ) {
				$width  = $tag->getAttribute( 'width' );
				$height = $tag->getAttribute( 'height' );
				break; // should only be one
			}

			$class = 'responsive-embed'; // Foundation class

			// Determine if aspect ratio is 16:9 or wider
			if ( is_numeric( $width ) && is_numeric( $height ) && ( $width / $height >= 1.7 ) ) {
				$class .= ' widescreen'; // space needed
			}

			// Wrap oEmbed markup in Foundation responsive embed
			return '<div class="' . $class . '">' . $html . '</div>';

		} else { // not a supported embed
			return $html;
		}

	}
	add_filter( 'embed_oembed_html', 'foundationpress_responsive_video_oembed_html', 10, 4 );
endif;

/**
 * Get mobile menu ID
 */

if ( ! function_exists( 'foundationpress_mobile_menu_id' ) ) :
	function foundationpress_mobile_menu_id() {
		if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) {
			echo 'off-canvas-menu';
		} else {
			echo 'mobile-menu';
		}
	}
endif;

/**
 * Get title bar responsive toggle attribute
 */

if ( ! function_exists( 'foundationpress_title_bar_responsive_toggle' ) ) :
	function foundationpress_title_bar_responsive_toggle() {
		if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) {
			echo 'data-responsive-toggle="mobile-menu"';
		}
	}
endif;

/**
 * Custom markup for Wordpress gallery
 */
if ( ! function_exists( 'foundationpress_gallery' ) ) :
	function foundationpress_gallery($attr) {

		$post = get_post();
		static $instance = 0;
		$instance++;

		if ( ! empty( $attr['ids'] ) ) {
			// 'ids' is explicitly ordered, unless you specify otherwise.
			if ( empty( $attr['orderby'] ) )
				$attr['orderby'] = 'post__in';
			$attr['include'] = $attr['ids'];
		}

		// Allow plugins/themes to override the default gallery template.
		$output = apply_filters('post_gallery', '', $attr, $instance);
		if ( $output != '' )
			return $output;

		// Let's make sure it looks like a valid orderby statement
		if ( isset( $attr['orderby'] ) ) {
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
				unset( $attr['orderby'] );
		}

		$atts = shortcode_atts(array(
			'order'         => 'ASC',
			'orderby'       => 'menu_order ID',
			'id'            => $post ? $post->ID : 0,
			'itemtag'       => 'figure',
			'icontag'       => 'div',
			'captiontag'    => 'figcaption',
			'columns-small' => 2, // set default columns for small screen
			'columns-medium'=> 4, // set default columns for medium screen
			'columns'       => 3, // set default columns for large screen (3 = wordpress default)
			'size'          => 'thumbnail',
			'include'       => '',
			'exclude'       => ''
		), $attr, 'gallery');

		$id = intval($atts['id']);

		if ( !empty($atts['include']) ) {
			$_attachments = get_posts( array('include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby']) );

			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif ( !empty($atts['exclude']) ) {
			$attachments = get_children( array('post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby']) );
		} else {
			$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby']) );
		}

		if ( empty($attachments) )
			return '';

		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment )
				$output .= wp_get_attachment_link($att_id, $atts['size'], true) . "\n";
			return $output;
		}

		$item_tag = tag_escape($atts['itemtag']);
		$caption_tag = tag_escape($atts['captiontag']);
		$icon_tag = tag_escape($atts['icontag']);
		$valid_tags = wp_kses_allowed_html( 'post' );

		if ( ! isset( $valid_tags[ $item_tag ] ) )
			$item_tag = 'figure';
		if ( ! isset( $valid_tags[ $caption_tag ] ) )
			$caption_tag = 'figcaption';
		if ( ! isset( $valid_tags[ $icon_tag ] ) )
			$icon_tag = 'div';

		$columns = intval($atts['columns']);
		$columns_small = intval($atts['columns-small']);
		$columns_medium = intval($atts['columns-medium']);
		$selector = "gallery-{$instance}";
		$size_class = sanitize_html_class( $atts['size'] );

		// Edit this line to modify the default number of grid columns for the small and medium sizes. The large size is passed in the WordPress gallery settings.
		$output = "<div id='$selector' class='fp-gallery galleryid-{$id} gallery-size-{$size_class} grid-x grid-margin-x small-up-{$columns_small} medium-up-{$columns_medium} large-up-{$columns}'>";

		foreach ( $attachments as $id => $attachment ) {

			// Check if destination is file, nothing or attachment page.
			if ( isset($attr['link']) && $attr['link'] == 'file' ){
				$link = wp_get_attachment_link($id, $size_class, false, false, false,array('class' => '', 'id' => "imageid-$id"));

				// Edit this line to implement your html params in <a> tag with use a custom lightbox plugin.
				$link = str_replace('<a href', '<a class="thumbnail fp-gallery-lightbox" data-gall="fp-gallery-'. $post->ID .'" data-title="'. wptexturize($attachment->post_excerpt) .'" title="'. wptexturize($attachment->post_excerpt) .'" href', $link);

			} elseif ( isset($attr['link']) && $attr['link'] == 'none' ){
				$link = wp_get_attachment_image($id,$size_class,false, array('class' => "thumbnail attachment-$size_class size-$size_class", 'id' => "imageid-$id"));
			} else {
				$link = wp_get_attachment_link($id, $size_class, true, false, false,array('class' => '', 'id' => "imageid-$id"));
				$link = str_replace('<a href', '<a class="thumbnail" title="'. wptexturize($attachment->post_excerpt) .'" href', $link);
			}

			$image_meta  = wp_get_attachment_metadata( $id );
			$orientation = '';
			if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
				$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
			}
			$output .= "<{$item_tag} class='fp-gallery-item cell'>";
			$output .= "
		        <{$icon_tag} class='fp-gallery-icon {$orientation}'>
		            $link
		        </{$icon_tag}>";

			// Uncomment if you wish to display captions inline on gallery.
			/*
			if ( $caption_tag && trim($attachment->post_excerpt) ) {
				$output .= "
		            <{$caption_tag} class='wp-caption-text gallery-caption'>
		            " . wptexturize($attachment->post_excerpt) . "
		            </{$caption_tag}>";
			}
			*/

			$output .= "</{$item_tag}>";

		}
		$output .= "</div>\n";

		return $output;
	}
	add_shortcode('gallery', 'foundationpress_gallery');
endif;
