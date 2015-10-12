<?php

// Create Slider Post Type
require( get_stylesheet_directory() . '/inc/slider/slider_post_type.php' );
// Create Slider
require( get_stylesheet_directory() . '/inc/slider/slider.php' );

// Slider Image
add_image_size('slider', 1080, 405, true);
// Except Thumbnail
add_image_size('excerpt-thumbnail', 150, 150, true);

/**
 * Adds "Read more link" for custom & automatic excerpts and removes the "[]" in automatic excerpts
 */

function change_excerpt_more()
{
  function new_excerpt_more($more)
    {		
    // Use .read-more to style the link
      return '...<span class="continue-reading"> <a href="' . get_permalink() . '">'.'Continue Reading &rarr;' . '</a></span>';
    }
  add_filter('excerpt_more', 'new_excerpt_more');
}
add_action('after_setup_theme', 'change_excerpt_more');

// Unregisters the TwentyThirteen Sidebars
function nbcradio_unregister_sidebar(){

	unregister_sidebar( 'sidebar-1' );
	unregister_sidebar( 'sidebar-2' );
}
add_action( 'widgets_init', 'nbcradio_unregister_sidebar', 11 );


// Registers two widget areas.
function nbcradio_widgets_init() {

register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'twentythirteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'twentythirteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the footer section of the site.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
	
add_action( 'widgets_init', 'nbcradio_widgets_init', 12 );

// S2Member fix for Theme My Login
add_filter("ws_plugin__s2member_login_header_styles", "__return_false");

// Overlapping Sidebar Fix
function nbcradio_scripts_styles() {
// Loads JavaScript file with functionality specific to Twenty Thirteen.
wp_dequeue_script ('twentythirteen-script');
wp_enqueue_script( 'nbcradio-script', get_stylesheet_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-08-27', true );
}
add_action( 'wp_enqueue_scripts', 'nbcradio_scripts_styles', 13 );

?>