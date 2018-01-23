<?php

// if ( ! function_exists ( 'elementor_icon_scripts' ) ) :
// // Enqueueing Frontend stylesheet and scripts.
// function elementor_icon_scripts() {
//     wp_enqueue_style( 'font-awesome' ); // Enqueue font awesome on all pages
// 	// if ( wp_script_is( 'booked-font-awesome', 'enqueued' ) && wp_style_is( 'font-awesome', 'enqueued' ) ) {
// 	// 	wp_dequeue_script( 'booked-font-awesome' );
// 	// }
// }
// endif;
// add_action( 'wp_enqueue_scripts', 'elementor_icon_scripts', 20 );

// ENQUEUE // Enqueueing Frontend stylesheet and scripts.
add_action( 'elementor/editor/after_enqueue_scripts', function() {
    wp_enqueue_style('custom-icons', PLUG_PATH . 'icons/icons.css');
});
// add_action( 'elementor/editor/after_enqueue_scripts', function() {
//     wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
// });

// FRONTEND // After Elementor registers all styles.
add_action( 'elementor/frontend/after_register_styles', 'icons_enqueue_after_frontend' );

function icons_enqueue_after_frontend() {
    wp_enqueue_style( 'custom-icons', PLUG_PATH . 'icons/icons.css', array(), PLUG_VERSION);
}

// EDITOR // Before the editor scripts enqueuing.
add_action( 'elementor/editor/before_enqueue_scripts', 'icons_enqueue_before_editor' );

function icons_enqueue_before_editor() {
    wp_enqueue_style( 'custom-icons', PLUG_PATH . 'icons/icons.css', array(), PLUG_VERSION);
    // JS for the Editor
    //wp_enqueue_script( 'themo-editor-js', PLUG_URL  . 'js/th-editor.js', array(), PLUG_VERSION);
}

// PREVIEW // Before the preview styles enqueuing.
// add_action( 'elementor/preview/enqueue_styles', 'th_enqueue_preview' );

// function th_enqueue_preview() {
//     wp_enqueue_style( 'themo-preview', PLUG_URL  . 'css/th-preview.css', array(), PLUG_VERSION);
//     wp_enqueue_script( 'themo-preview', PLUG_URL  . 'js/th-preview.js', array(), PLUG_VERSION);
//     wp_enqueue_script( 'themo-google-map', PLUG_URL . 'js/themo-google-maps.js', array(), PLUG_VERSION, true);

// }

// // FRONTEND // After Elementor registers all scripts.
// add_action( 'elementor/frontend/after_enqueue_scripts', 'th_enqueue_after_frontend_scripts' );

// function th_enqueue_after_frontend_scripts() {
//     // JS for the Editor
//     wp_enqueue_script( 'themo-editor-js', PLUG_URL  . 'js/th-editor.js', array(), PLUG_VERSION);

// }