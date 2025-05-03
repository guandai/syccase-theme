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


add_filter('posts_orderby', 'sort_products_by_real_slug', 10, 2);
function sort_products_by_real_slug($orderby, $query) {
    if (is_admin() || !$query->is_main_query()) return $orderby;
    
    if ((is_shop() || is_product_category() || is_product_tag()) && is_post_type_archive('product')) {
        global $wpdb;
        return "{$wpdb->posts}.post_name ASC";
    }
    return $orderby;
}
