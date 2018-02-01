# Raising Issues
- Please raise any ideas, ways to add more icons, etc etc [here on the original thread](https://github.com/pojome/elementor/issues/110)

### What Is This Wordpress Elementor Plugin Addon?
**Solved** IcoMoon custom icons for Elementor:

1 . Create a plugin with the following 

```
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
		'icon-noun_977768' => 'whatever you want to call the icomoon icon',
	        'icon-noun_977793' => 'another icon name',
	        'icon-noun_1245026' => 'name again',
	        'icon-noun_1248182' => 'name as many as you want',
	        'icon-noun_1258170' => 'icon title',
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
```
2. Use [a custom font you created in the icomoon font generator](https://www.sitepoint.com/create-an-icon-font-illustrator-icomoon/). I usually find great SVG's from [awesome designer's work at The Noun Project](https://thenounproject.com/leremy/)

3. The array in the plugin above (e.g. `'**icon-noun_977768**' => 'iconchooser name of icon',`) makes reference to the downloaded Icomoon stylesheet (style.css) ID's (e.g. `.**icon-noun_977768**:before {  content: "\e900";}`)

(Can anyone post a quicker way to create the array?)

4. The original Elementor array can be found in `..plugins/elementor/includes/controls/icon.php`