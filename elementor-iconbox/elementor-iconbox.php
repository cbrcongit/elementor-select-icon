<?php
/**
 * Plugin Name: Custom Elementor IconBox
 * Description: Override Elementor's 'Icon' control to include custom icon packs.
 * Author: @cbrcongit, @albionselimaj, @ryanlabelle
 * Version: 0.4
 * Site: https://github.com/pojome/elementor/issues/110
 */
add_action( 'elementor/init', function() {
if ( ! defined( 'ABSPATH' ) ) exit;

class Elementor_Control_Icon extends Elementor\Base_Control {
	
	public function get_type() {
		return 'icon';
	}

	public static function get_icons() {
		return [
			'icon-noun_977768' => 'pro',
	        'icon-noun_977793' => 'safety',
	        'icon-noun_1245026' => 'bicycle',
	        'icon-noun_1248182' => 'engineer',
	        'icon-noun_1258170' => 'engineer solve',
	        'icon-noun_1267333' => 'humans',
	        'icon-noun_1273446' => 'engineer fit',
	        'icon-noun_1273443' => 'manager',
	        'icon-noun_1278287' => 'weather cold',
	        'icon-noun_977698' => 'handy',
    	];

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
wp_enqueue_style('icomoon', plugin_dir_url( __FILE__ ) . 'style.css' );
});

?>