<?php
/**
 * Mervin Mfg. WordPress Theme Template functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage GNU-Blog-WordPress-Theme
 * @since GNU Blog WordPress Theme 1.0.0
 */

// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
function gnu_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
	add_theme_support( 'post-formats', array( 'audio', 'video', 'chat', 'gallery', 'image', 'quote' ) );
	register_nav_menu( 'primary', 'Primary Navigation Menu' );
  register_nav_menu( 'secondary', 'Secondary Navigation Menu' );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'gnu_setup' );

if ( function_exists( 'add_image_size' ) ) {
	// thumbnail - 200x200
	// medium - 640x640
	// large - 1024x1024
    // additional image sizes
    add_image_size('square-medium', 400, 400, true);
    add_image_size('blog-feature', 600, 400, true);
}

// add shortlink button to admin blog-feature
add_action( 'admin_bar_menu', 'wp_admin_bar_shortlink_menu',90 );

// Scripts & Styles (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
function html5reset_scripts_styles() {
	global $wp_styles;
	// Load Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'html5reset_scripts_styles' );

// Romove WP emoji Scripts
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Clean up the <head>, if you so desire.
function removeHeadLinks() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
// Custom Menu
register_nav_menu( 'main_menu', 'Main Menu' );

// Navigation - update coming from twentythirteen
function post_navigation() {
    //echo '<div class="navigation">';
    //echo '  <div class="next-posts">'.get_next_posts_link('&laquo; Older Entries').'</div>';
    //echo '  <div class="prev-posts">'.get_previous_posts_link('Newer Entries &raquo;').'</div>';
    //echo '</div>';
		$next_arrow = '<div class="button"><span class="next-text">NEXT</span><span class="prev-text">PREV</span><div class="arrow"></div></div>';

    global $wp_query;
    if ( $wp_query->max_num_pages > 1 ) {
        echo '<div class="pagination">';
        $big = 999999999; // need an unlikely integer
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'mid_size' => 1,
            'prev_text' => $next_arrow,
            'next_text' => $next_arrow,
            ''
        ) );
        echo '</div>';
    }
}

// REMOVE AUTOMATED CSS MENU CLASSES, CLEAN 'EM UP!
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('menu-item', 'current-menu-item', 'boards', 'bindings', 'supplies', 'team', 'blog', 'mervin-made', 'events', 'about', 'locator')) : '';
}

// GET PAGE TITLE
function getPageTitle($pageID) {
	$title = get_post_meta($pageID, '_yoast_wpseo_title', true);
	if(!$title) {
		return get_the_title($pageID);
	} else {
		return $title;
	}
}

// get the featured image of a post in a specified size, if no featured image set grab 1st image in post, if no image return default
function get_post_image($imageSize = "thumbnail", $imageName = "") {
    global $post;
    if ($imageName == "") {
        // just getting default thumbnail for post
        if ( has_post_thumbnail() ) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $imageSize);
        }else{
            $files = get_children('post_parent='.get_the_ID().'&post_type=attachment&post_mime_type=image');
            if($files){
                $keys = array_reverse(array_keys($files));
                $j=0;
                $num = $keys[$j];
                $image = wp_get_attachment_image_src($num, $imageSize, false);
            }else{
                // if no image is found use default image
                $image = array(get_bloginfo('template_url')."/_/img/blog-stock-image.png",300,300);
            }
        }
    } else {
        // getting a specific image for the post
        $image = get_post_meta($post->ID, $imageName, true);
        $image = wp_get_attachment_image_src($image, $imageSize, false);
    }
    return $image;
}
// EXCERPT LENGTH CONTROLLERS
// Puts link in excerpts more tag
function new_excerpt_more($more) {
    global $post;
    //return '... <a class="moretag" href="'. get_permalink($post->ID) . '">Continue Reading</a>';
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
// default excerpt length
function new_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');
// custom excerpt length for home page
function gnu_excerptlength_home($length) {
    return 20;
}
// custom excerpt length for home page
function gnu_excerptlength_blog($length) {
    return 40;
}
function gnu_excerpt($length_callback='gnu_excerptlength_home') {
    global $post;
    add_filter('excerpt_length', $length_callback);
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    echo $output;
}
// removes auto paragraph wrapper
remove_filter('the_excerpt', 'wpautop');

// REWRITE WORDPRESS GALLERY FUNCTIONALITY
function gnu_gallery_shortcode($attr) {
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
    $output = apply_filters('post_gallery', '', $attr);
    if ( $output != '' )
        return $output;
    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }
    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post ? $post->ID : 0,
        'itemtag'    => 'li',
        'icontag'    => 'div',
        'captiontag' => 'div',
        'columns'    => 3,
        'size'       => 'large',
        'include'    => '',
        'exclude'    => ''
    ), $attr, 'gallery'));
    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';
    if ( !empty($include) ) {
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }
    if ( empty($attachments) )
        return '';
    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }
    $selector = "gallery-{$instance}";
    $output = "<div id=\"$selector\" class=\"gallery row container-fluid slick-theme galleryid-{$id}\">\n";
    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        // always make it grab the link to the file
        $image_output = wp_get_attachment_image( $id, $size, false, false );
        $image_meta  = wp_get_attachment_metadata( $id );
        $orientation = '';
        if ( isset( $image_meta['height'], $image_meta['width'] ) )
            $orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
        $output .= "\t\t\t\t\t\t\t<div class='gallery-item'>\n\t\t\t\t\t\t\t\t<div class='gallery-icon {$orientation}'>$image_output</div>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "\n\t\t\t<p class='gallery-caption'>" . wptexturize($attachment->post_excerpt) . "</p>";
        }
        $output .= "\n\t\t\t\t\t\t\t</div>\n";
    }
		$output .= "\n\t\t\t\t\t</div><!-- END .gallery -->\n";
		$output .= "<div id=\"\" class=\"gallery-nav slick-theme\">\n";
		foreach ($attachments as $id => $attachment ) {
			// grab image
			$image_output = wp_get_attachment_image( $id, 'thumbnail', true, false );
			$output .= "\t\t\t\t\t\t\t<div class='gallery-nav-thumb'>$image_output</div>";
		}
		$output .= "\n\t\t\t\t\t</div>";
	  return $output;
	}
add_shortcode('gallery', 'gnu_gallery_shortcode');

// custom meta box for featured posts
function sm_custom_meta() {
    add_meta_box( 'sm_meta', __( 'Featured Posts', 'sm-textdomain' ), 'sm_meta_callback', 'post' );
}
function sm_meta_callback( $post ) {
    $featured = get_post_meta( $post->ID );
    ?>

	<p>
    <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Feature this post', 'sm-textdomain' )?>
        </label>

    </div>
</p>

    <?php
}
add_action( 'add_meta_boxes', 'sm_custom_meta' );

function sm_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

 // Checks for input and saves
if( isset( $_POST[ 'meta-checkbox' ] ) ) {
    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'meta-checkbox', '' );
}

}
add_action( 'save_post', 'sm_meta_save' );

?>
