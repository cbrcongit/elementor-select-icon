<?php

// Adding Custom Icons for Icon Control
require_once PLUG_PATH . 'inc/icon-control.php' ;

// Include scripts
require_once PLUG_PATH . 'inc/enqueue.php';

// When plugin is installed for the first time, set global elementor settings.
if ( ! function_exists( 'icon_setup_elementor_settings' ) ) {
    function icon_setup_elementor_settings()
    {

        // Disable color schemes
        $elementor_disable_color_schemes = get_option('elementor_disable_color_schemes');
        if (empty($elementor_disable_color_schemes)) {
            update_option('elementor_disable_color_schemes', 'yes');
        }

        // Disable typography schemes
        $elementor_disable_typography_schemes = get_option('elementor_disable_typography_schemes');
        if (empty($elementor_disable_typography_schemes)) {
            update_option('elementor_disable_typography_schemes', 'yes');
        }

        // Disable global lightbox by default.
        update_option('elementor_global_image_lightbox', '');

        // Check for our custom post type, if it's not included, include it.
        $elementor_cpt_support = get_option('elementor_cpt_support');
        if (empty($elementor_cpt_support)) {
            $elementor_cpt_support = array();
        }

        if (!in_array("page", $elementor_cpt_support)) {
            array_push($elementor_cpt_support,"page");
            update_option('elementor_cpt_support', $elementor_cpt_support);
        }

        if (!in_array("post", $elementor_cpt_support)) {
            array_push($elementor_cpt_support,"post");
            update_option('elementor_cpt_support', $elementor_cpt_support);
        }
        // // Add more of your Custom Post Types using format below, for default Elementor editing
        // if (!in_array("replace_with_your_cpt_here", $elementor_cpt_support)) {
        //     array_push($elementor_cpt_support,"replace_with_your_cpt_here");
        //     update_option('elementor_cpt_support', $elementor_cpt_support);
        // }

    }
}