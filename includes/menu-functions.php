<?php
add_filter('admin_init', 'my_general_settings_register_fields');
add_action( 'admin_enqueue_scripts', 'wa_redmasiva_color_picker' );
function wa_redmasiva_color_picker( $hook_suffix ) {
// first check that $hook_suffix is appropriate for your admin page
wp_enqueue_style( 'wp-color-picker' );
wp_enqueue_script( 'my-script-handle', plugins_url('js/custom.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
function my_general_settings_register_fields()
{
    register_setting('general', 'redmasiva_wc_wa_number', 'esc_attr');
    add_settings_field('redmasiva_wc_wa_number', '<label for="redmasiva_wc_wa_number">'.__('WhatsApp Number' , 'redmasiva_wc_wa_number' ).'</label>' , 'redmasiva_settings_fields_html', 'general');

    register_setting('general', 'redmasiva_wc_wa_title', 'Order');
    add_settings_field('redmasiva_wc_wa_title', '<label for="redmasiva_wc_wa_title">'.__('Title Text' , 'redmasiva_wc_wa_title' ).'</label>' , 'redmasiva_settings_fields_html4', 'general');

    register_setting('general', 'redmasiva_wc_wa_footer', 'www.website.com');
    add_settings_field('redmasiva_wc_wa_footer', '<label for="redmasiva_wc_wa_footer">'.__('Footer Text' , 'redmasiva_wc_wa_footer' ).'</label>' , 'redmasiva_settings_fields_html5', 'general');

	register_setting('general', 'drop_down1', 'Custom');
	add_settings_field('drop_down1', 'Select Color', 'setting_dropdown_fn', 'general');
    
	register_setting('general', 'redmasiva_wc_wa_color', 'esc_attr');
	add_settings_field('redmasiva_wc_wa_color', '<label for="redmasiva_wc_wa_color">'.__('Button Color #1' , 'redmasiva_wc_wa_color' ).'</label>' , 'redmasiva_settings_fields_html2', 'general');
    
	register_setting('general', 'redmasiva_wc_wa_color2', 'esc_attr');
	add_settings_field('redmasiva_wc_wa_color2', '<label for="redmasiva_wc_wa_color2">'.__('Button Color #2' , 'redmasiva_wc_wa_color2' ).'</label>' , 'redmasiva_settings_fields_html3', 'general');
	
}

function redmasiva_settings_fields_html()
{
    $value = get_option( 'redmasiva_wc_wa_number', '' );
    echo '<input type="text" id="redmasiva_wc_wa_number" name="redmasiva_wc_wa_number" value="' . $value . '" />';
	echo '<p class="description">Insert your WhatsApp Number with your country code ex. +1</p>';
}
function redmasiva_settings_fields_html2()
{
	$color = get_option( 'redmasiva_wc_wa_color', '' );
    echo '<input name="redmasiva_wc_wa_color" type="text" value="' . $color . '" data-default-color="' . $color . '" class="color-rm"/>';
}
function redmasiva_settings_fields_html3()
{
	$color2 = get_option( 'redmasiva_wc_wa_color2', '' );
	echo '<input name="redmasiva_wc_wa_color2" type="text" value="' . $color2 . '" data-default-color="' . $color2 . '" class="color-rm2"/>';
}
function redmasiva_settings_fields_html4()
{
	$value = get_option( 'redmasiva_wc_wa_title', '' );
	echo '<input name="redmasiva_wc_wa_title" type="text" value="' . $value . '"/>';
}
function redmasiva_settings_fields_html5()
{
	$value = get_option( 'redmasiva_wc_wa_footer', '' );
	echo '<input name="redmasiva_wc_wa_footer" type="text" value="' . $value . '"/>';
}
function  setting_dropdown_fn() {
	$options = get_option('drop_down1');
	$items = array("Default", "Custom");
	echo "<select id='drop_down1' name='drop_down1'>";
	foreach($items as $item) {
		$selected = ($options==$item) ? 'selected="selected"' : '';
		echo "<option value='$item' $selected>$item</option>";
	}
	echo "</select>";
}