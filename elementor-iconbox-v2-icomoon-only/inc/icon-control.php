<?php
// if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'elementor/init', function() { 
class Elementor_Control_Icon extends Elementor\Base_Control {
	
	public function get_type() {
		return 'icon';
	}

	public static function get_icons() {
		$icons = [];
		// Get arrays of icons.
		// $font_awesome_icons = require  PLUG_PATH . 'icons/font-awesome.php';
		// $material_icons = require PLUG_PATH . 'icons/material-icons.php';
		$custom_icons = require PLUG_PATH . 'icons/icomoon.php';
			// foreach ($font_awesome_icons as $icon) {
			// 	$icons["fa {$icon}"] = str_replace('fa-', '', $icon);
			// }
			// foreach ($material_icons as $icon) {
			// 	$icons["material-icons {$icon}"] = $icon;
			// }
			foreach ($custom_icons as $icon) {
				$icons[$icon] = str_replace('icon-', '', $icon);
			}
			return $icons;
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
}
});

add_action('elementor/controls/controls_registered', function($el) {
	$el->register_control('icon', new Elementor_Control_Icon);
});