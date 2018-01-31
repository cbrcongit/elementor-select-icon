<?php

// ENQUEUE // Enqueueing Frontend stylesheet and scripts.
add_action( 'elementor/editor/after_enqueue_scripts', function() {
    wp_enqueue_style('custom-icons', PLUG_PATH . 'icons/fonts/style.css');
});

// add_action( 'elementor/editor/after_enqueue_scripts', function() {
//     wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
// });

// FRONTEND // After Elementor registers all styles.
add_action( 'elementor/frontend/after_register_styles', 'icons_enqueue_after_frontend' );

function icons_enqueue_after_frontend() {
    wp_enqueue_style( 'custom-icons', PLUG_PATH . 'icons/fonts/style.css', array(), PLUG_VERSION);
}

// EDITOR // Before the editor scripts enqueuing.
add_action( 'elementor/editor/before_enqueue_scripts', 'icons_enqueue_before_editor' );

function icons_enqueue_before_editor() {
    wp_enqueue_style( 'custom-icons', PLUG_PATH . 'icons/fonts/style.css', array(), PLUG_VERSION);
}