<?php

// Add block template support
add_theme_support('block-templates');

// Enqueue parent and child theme styles
function syccase_child_enqueue_styles() {
    
    // Enqueue child theme's style.css
    // wp_enqueue_style('syccase-child-style', get_stylesheet_directory_uri() . '/style.css', array('kiosko-parent-style'), wp_get_theme()->get('Version'));
    
    // Enqueue parent theme's style.css
    wp_enqueue_style('kiosko-parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'syccase_child_enqueue_styles');
