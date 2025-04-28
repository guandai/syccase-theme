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



function my_custom_homepage_template($template) {
    if (is_front_page()) {
        // Get the page ID of the homepage
        $homepage_id = get_option('page_on_front');
        
        // Retrieve the template selected for the homepage from the page editor
        $selected_template = get_post_meta($homepage_id, '_wp_page_template', true);
        
        // If a template is selected for the page, use it instead of the default
        if ($selected_template && $selected_template !== 'front-page.php') {
            $template = locate_template($selected_template);
        }
    }
    return $template;
}

add_filter('template_include', 'my_custom_homepage_template');
