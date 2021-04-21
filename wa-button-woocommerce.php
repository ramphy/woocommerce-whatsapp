<?php
/*
Plugin Name: Woocommerce Order to WhatsApp
Plugin URI:  https://www.redmasiva.com
Description: With this plugin you can send orders to WhatsApp. 100% Compatible with Woocommerce
Version:     1.1
Author:      Redmasiva LLC
Author URI:  https://ramphy.com

Copyright 2021 Ramphy Rojas (email : ramphy@redmasiva.com)
Woocommerce Order to WhatsApp is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Woocommerce Order to WhatsApp is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
*/
include dirname( __FILE__ ) . '/includes/menu-functions.php';

add_filter('woocommerce_thankyou', 'redmasiva_wa_plugin');
function redmasiva_wa_plugin($order_id) {

	if (is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	  include dirname( __FILE__ ) . '/includes/variables-const.php';
	  include dirname( __FILE__ ) . '/includes/functions-responsive.php';
	  include dirname( __FILE__ ) . '/includes/thankyou-html.php';

	}
}
?>