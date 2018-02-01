<?php
/**
 * Plugin Name: Custom Elementor IconBox
 * Description: Override Elementor's 'Icon' control to include custom icon packs.
 * Author: @cbrcongit, @albionselimaj, @ryanlabelle
 * Version: 0.5
 * Site: https://github.com/pojome/elementor/issues/110
 */
define( 'PLUG_VERSION', '0.5');
define( 'PLUG__FILE__', __FILE__ ); 
define( 'PLUG_PLUGIN_BASE', plugin_basename( PLUG__FILE__ ) ); 
define( 'PLUG_URL', plugins_url( '/', PLUG__FILE__ ) ); 
define( 'PLUG_PATH', plugin_dir_path( PLUG__FILE__ ) ); 



///
add_action( 'elementor/init', function() {
if ( ! defined( 'ABSPATH' ) ) exit;
class Elementor_Control_Icon extends Elementor\Base_Control {
	
	public function get_type() {
		return 'icon';
	}

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

	protected function get_default_settings() {
		return [
			'icons' => self::get_icons(),
		];
	}

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
require_once PLUG_PATH . 'enqueue.php'; 
add_action('elementor/controls/controls_registered', function($el) { 
  $el->register_control('icon', new Elementor_Control_Icon); 
});
?>