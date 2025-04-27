<?php
// filepath: /Users/zhengdai/git/syccase-theme/functions.php

// Add Gutenberg support
function syccase_child_gutenberg_support() {
    // Add support for wide and full alignments
    add_theme_support('align-wide');

    // Add support for editor styles
    add_theme_support('editor-styles');

    // Enqueue the editor styles
    add_editor_style('style-editor.css'); // This file will style the Gutenberg editor

    // Add support for custom color palette
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Primary', 'kiosko-child'),
            'slug'  => 'primary',
            'color' => '#0071e3',
        ),
        array(
            'name'  => __('Secondary', 'kiosko-child'),
            'slug'  => 'secondary',
            'color' => '#005bb5',
        ),
        array(
            'name'  => __('Light Gray', 'kiosko-child'),
            'slug'  => 'light-gray',
            'color' => '#f9f9f9',
        ),
        array(
            'name'  => __('Dark Gray', 'kiosko-child'),
            'slug'  => 'dark-gray',
            'color' => '#333',
        ),
    ));

    // Add support for custom font sizes
    add_theme_support('editor-font-sizes', array(
        array(
            'name' => __('Small', 'kiosko-child'),
            'size' => 14,
            'slug' => 'small',
        ),
        array(
            'name' => __('Normal', 'kiosko-child'),
            'size' => 17,
            'slug' => 'normal',
        ),
        array(
            'name' => __('Large', 'kiosko-child'),
            'size' => 36,
            'slug' => 'large',
        ),
        array(
            'name' => __('Huge', 'kiosko-child'),
            'size' => 48,
            'slug' => 'huge',
        ),
    ));
}
add_action('after_setup_theme', 'syccase_child_gutenberg_support');

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
