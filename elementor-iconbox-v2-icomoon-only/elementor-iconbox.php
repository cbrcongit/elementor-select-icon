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

// Run Setup
require_once PLUG_PATH . 'inc/icon-control.php';
require_once PLUG_PATH . 'inc/enqueue.php';

?>