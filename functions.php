<?php

// Add block template support
add_theme_support('block-templates');

// Enqueue parent and child theme styles
function syccase_child_enqueue_styles() {
    // Enqueue parent theme's style.css
    wp_enqueue_style('kiosko-parent-style', get_template_directory_uri() . '/style.css');
    
    // Enqueue child theme's style.css
    wp_enqueue_style('syccase-child-style', get_stylesheet_directory_uri() . '/style.css', array('kiosko-parent-style'), wp_get_theme()->get('Version'));
    
}
add_action('wp_enqueue_scripts', 'syccase_child_enqueue_styles');



add_filter('posts_orderby', function($orderby, $query) {
    if (is_admin() || !$query->is_main_query() || !is_page('syccase-shop')) return $orderby;

    global $wpdb;
    return "{$wpdb->posts}.post_name ASC";
}, 10, 2);



function mytheme_enqueue_custom_js() {
    wp_enqueue_script(
        'my-custom-script', // Handle
        get_stylesheet_directory_uri() . '/js/custom-script.js', // Path to the JS file
        array(), // Dependencies (e.g., array('jquery') if needed)
        null, // Version (optional, use `filemtime` for cache busting if desired)
        true // Load in footer
    );
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_custom_js');
