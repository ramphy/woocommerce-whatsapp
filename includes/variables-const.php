<?php

$order = wc_get_order( $order_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
$order_items = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
if ( ! $order ) {
	return;
}

foreach ( $order_items as $item_id => $item ) {
	$pid        = $item_id;
	$item_price = 0;
	$item_price    = $order->get_line_subtotal( $item );
	// $category      = $product->get_category_ids();
	$products[ $pid ]  = array(
		'name'       => $item->get_name(),
		'id'         => $pid,
		'quantity'   => $item->get_quantity(),
		'item_price' => $item_price,
		'nuevo' => $item->get_meta_data(),
	);
}
$order_total          = $order->get_total();
$order_shipping_total = $order->get_shipping_total();
$order_tax            = $order->get_total_tax();

$numbero_whatsapp = get_option( 'redmasiva_wc_wa_number', '' );
$title_whatsapp = get_option( 'redmasiva_wc_wa_title', '' );
$footer_whatsapp = get_option( 'redmasiva_wc_wa_footer', '' );
$custom_whatsapp = get_option( 'drop_down1', '' );


if ($custom_whatsapp == "Default"){
	$color_whatsapp = "#25d366";
	$color2_whatsapp = "#1fad53";
} else {
	$color_whatsapp = get_option( 'redmasiva_wc_wa_color', '' );
	$color2_whatsapp = get_option( 'redmasiva_wc_wa_color2', '' );
}

$color_whatsapp = @$color_whatsapp ?: "#25d366";
$color2_whatsapp = @$color2_whatsapp2 ?: "#1fad53";
?>
<script>
	var redmasiva = {
		'products': '<?php echo isset( $products ) ? wp_json_encode( $products ) : ''; ?>',
		'order_id': '<?=$order->get_id() ?>',
		'order_total': '<?php echo isset( $order_total ) ? $order_total : ''; ?>',
		'currency': '<?php echo get_woocommerce_currency(); ?>',
		'shipping_total': '<?php echo isset( $order_shipping_total ) ? $order_shipping_total : ''; ?>',
		'order_tax': '<?php echo isset( $order_tax ) ? $order_tax : ''; ?>',
	};
	
	var order_numberx = redmasiva.order_id;
	var nombrex = "Nombre" + "%3A%20" + "<?=$order->get_formatted_billing_full_name()?>" + "%0A";
	var correox = "Correo" + "%3A%20" + "<?=$order->get_billing_email()?>" + "%0A";
	var numerox = "Número" + "%3A%20" + "*<?=$order->get_billing_phone()?>*" + "%0A";
	var direccionx = "Dirección" + "%3A%20" + encodeURI("<?=$order->get_billing_address_1()?>") + "%0A";
	var totalx = "Total" + "%3A%20%24" + redmasiva.order_total;
	var enviox = "Delivery" + "%3A%20%24" + redmasiva.shipping_total + "%0A";
	var empresax = "<?=$numbero_whatsapp?>";
	var footertext = "<?=$footer_whatsapp?>";
</script>

