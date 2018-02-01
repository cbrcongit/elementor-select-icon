### Raising Issues
- Please raise any ideas, ways to add more icons, etc etc [here on the original thread](https://github.com/pojome/elementor/issues/110)

# What Is This Wordpress Elementor Plugin Addon?
**Solved** IcoMoon custom icons for Elementor:

1 . This is the combined issue resolution for customising icons. Hopefully Elementor dev's can pull this into their product somewhow with a better UI and less coding required, or maybe **you can make some forks of this repo with icon packs of your own to share**.

```
<?php
/**
 * Plugin Name: Custom Elementor IconBox
 * Description: Override Elementor's 'Icon' control to include custom icon packs.
 * Author: @cbrcongit, @albionselimaj, @ryanlabelle
 * Version: 0.5
 * Site: https://github.com/pojome/elementor/issues/110
 */
if ( ! defined( 'ABSPATH' ) ) exit;
// Define some constants
define( 'PLUG_VERSION', '0.5');
define( 'PLUG__FILE__', __FILE__ ); 
define( 'PLUG_PLUGIN_BASE', plugin_basename( PLUG__FILE__ ) ); 
define( 'PLUG_URL', plugins_url( '/', PLUG__FILE__ ) ); 
define( 'PLUG_PATH', plugin_dir_path( PLUG__FILE__ ) ); 
// Hook into things early in the WP-Elementor load sequence
add_action( 'elementor/init', function() {
// Elementor icon control.
class Elementor_Control_Icon extends Elementor\Base_Control {
	// Retrieve icon control type.
	public function get_type() {
		return 'icon';
	}
	// Retrieve icons.
	// Make your own list, and use the IcoMoon font 'style.css' Classes to build your array
	public static function get_icons() {
		return [
			'icon-noun_977768' => 'noun professional',
	        'icon-noun_977793' => 'noun health safety',
	        'icon-noun_1245026' => 'noun bicycle',
	        'icon-noun_1248182' => 'noun engineer mechanical',
	        'icon-noun_1258170' => 'noun engineer solve',
	        'icon-noun_1267333' => 'noun human resources',
	        'icon-noun_1273446' => 'noun engineer fit',
	        'icon-noun_1273443' => 'noun manager',
	        'icon-noun_1278287' => 'noun weather cold',
	        'icon-noun_977698' => 'noun technician',
	    ];
	}
	// Retrieve the default settings of the icons control to return the default settings while initializing the icons control.
	protected function get_default_settings() {
		return [
			'icons' => self::get_icons(),
		];
	}
	// Render icons control output in the editor.
	public function content_template() {
		?>
		<div class="elementor-control-field">
			<label class="elementor-control-title">{{{ data.label }}}</label>
			<div class="elementor-control-input-wrapper">
				<select class="elementor-control-icon" data-setting="{{ data.name }}" data-placeholder="<?php _e( 'Select Icon', 'elementor' ); ?>">
					<option value=""><?php _e( 'Select Icon', 'elementor' ); ?></option>
					<# _.each( data.icons, function( option_title, option_value ) { #>
					<option value="{{ option_value }}">{{{ option_title }}}</option>
					<# } ); #>
				</select>
			</div>
		</div>
		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{ data.description }}</div>
		<# } #>
		<?php
	}
};
});
// ENQUEUE // Enqueueing Frontend stylesheet and scripts.
add_action( 'elementor/editor/after_enqueue_scripts', function() {
    wp_enqueue_style( 'icomoon', plugin_dir_url( __FILE__ ) . 'style.css' );
});
// FRONTEND // After Elementor registers all styles.
add_action( 'elementor/frontend/after_register_styles', 'icons_enqueue_after_frontend' );
function icons_enqueue_after_frontend() {
    wp_enqueue_style( 'icomoon', plugin_dir_url( __FILE__ ) . 'style.css' , array(), PLUG_VERSION);
}
// EDITOR // Before the editor scripts enqueuing.
add_action( 'elementor/editor/before_enqueue_scripts', 'icons_enqueue_before_editor' );
function icons_enqueue_before_editor() {
    wp_enqueue_style( 'icomoon', plugin_dir_url( __FILE__ ) . 'style.css' , array(), PLUG_VERSION);
}
// Register the bloody thing
add_action('elementor/controls/controls_registered', function($el) { 
  $el->register_control('icon', new Elementor_Control_Icon); 
});
?>
```
2. Use [a custom font you created in the icomoon font generator](https://www.sitepoint.com/create-an-icon-font-illustrator-icomoon/). I usually find great SVG's from [awesome designer's work at The Noun Project](https://thenounproject.com/leremy/)

3. The array in the plugin above (e.g. `'icon-noun_977768' => 'icon chooser your name of icon to be listed',`) makes reference to the downloaded Icomoon stylesheet (style.css) class (e.g. `.icon-noun_977768:before {  content: "\e900";}`) - looking at **icon-noun_977768**

(Can anyone post a quicker way to create the array?)

4. The original Elementor array can be found in `../plugins/elementor/includes/controls/icon.php`
