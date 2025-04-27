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
            'name'  => __('Primary', 'storefront-child'),
            'slug'  => 'primary',
            'color' => '#0071e3',
        ),
        array(
            'name'  => __('Secondary', 'storefront-child'),
            'slug'  => 'secondary',
            'color' => '#005bb5',
        ),
        array(
            'name'  => __('Light Gray', 'storefront-child'),
            'slug'  => 'light-gray',
            'color' => '#f9f9f9',
        ),
        array(
            'name'  => __('Dark Gray', 'storefront-child'),
            'slug'  => 'dark-gray',
            'color' => '#333',
        ),
    ));

    // Add support for custom font sizes
    add_theme_support('editor-font-sizes', array(
        array(
            'name' => __('Small', 'storefront-child'),
            'size' => 14,
            'slug' => 'small',
        ),
        array(
            'name' => __('Normal', 'storefront-child'),
            'size' => 17,
            'slug' => 'normal',
        ),
        array(
            'name' => __('Large', 'storefront-child'),
            'size' => 36,
            'slug' => 'large',
        ),
        array(
            'name' => __('Huge', 'storefront-child'),
            'size' => 48,
            'slug' => 'huge',
        ),
    ));
}
add_action('after_setup_theme', 'syccase_child_gutenberg_support');
