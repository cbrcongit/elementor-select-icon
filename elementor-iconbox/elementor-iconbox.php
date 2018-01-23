<?php
/**
 * Plugin Name: Custom Elementor IconBox
 * Description: Override Elementor's 'Icon' control to include custom icon packs.
 * Author: @cbrcongit, @albionselimaj, @ryanlabelle
 * Version: 0.2
 * Site: https://github.com/pojome/elementor/issues/110
 */

// Define the plugin directory structure etc
define( 'PLUG_VERSION', '0.2');
define( 'PLUG__FILE__', __FILE__ );
define( 'PLUG_PLUGIN_BASE', plugin_basename( PLUG__FILE__ ) );
define( 'PLUG_URL', plugins_url( '/', PLUG__FILE__ ) );
define( 'PLUG_PATH', plugin_dir_path( PLUG__FILE__ ) );
// define( 'PLUG_ASSETS_URL', PLUG_URL . 'assets/' );

// $plug_theme = wp_get_theme(); // get theme info and save theme name as constant.
// if($plug_theme->get( 'Name' ) > ""){
//     $plug_theme_name_arr = explode("-", $plug_theme->get( 'Name' ), 2); // clean up child theme name
//     $plug_theme_name_arr2 = explode(" ", trim($plug_theme_name_arr[0]), 2); // clean up child theme name
//     $plug_theme_name = trim(strtolower($plug_theme_name_arr2[0]));
//     define( "PLUG_CURRENT_THEME", $plug_theme_name );
// };

// Run Setup
require_once PLUG_PATH . 'inc/setup.php';
require_once PLUG_PATH . 'inc/icon-control.php';
// require_once (__DIR__ .'/inc/setup.php');

// add_action( 'elementor/loaded', function() { 
// 	require_once (__DIR__ .'/inc/icon-control.php'); 
// });
// require_once dirname( __FILE__ ) . '/inc/setup.php';
// require_once dirname( __FILE__ ) . '/inc/icon-control.php';

/* Code above here. */
?>