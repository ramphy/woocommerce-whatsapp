<style>
.joinchat,
.only-lg {
    display: none;
}

.btn-rm {
    height: 50px;
    text-decoration: none;
    color: #fff !important;
    margin: 0 10px;
    position: relative;
    display: inline-block;
    overflow: hidden;
    border-radius: 6px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    line-height: 30px;
    font-size: 16px;
    text-shadow: 0 1px 1px #888 -webkit-box-shadow:0 0 11px 0 rgba(201, 201, 201, 1);
    -moz-box-shadow: 0 0 11px 0 rgba(201, 201, 201, 1);
    box-shadow: 0 0 11px 0 rgba(201, 201, 201, 1);
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    text-rendering: optimizeLegibility
}

.btn-rm span.icon,
.btn-rm span.title {
    color: #fff !important;
    display: block;
    position: relative;
    line-height: 50px;
    padding: 0 20px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px
}

.btn-rm span.left {
    float: left;
    border-radius: 6px 0 0 6px;
    -moz-border-radius: 6px 0 0 6px;
    -webkit-border-radius: 6px 0 0 6px
}

.btn-rm span.right {
    float: right;
    border-radius: 0 6px 6px 0;
    -moz-border-radius: 0 6px 6px 0;
    -webkit-border-radius: 0 6px 6px 0
}

.btn-rm span.icon {
    font-size: 23px;
    background-color: <?=$color_whatsapp?>;
    text-shadow: 0 1px 1px #888
}

.btn-rm span.title {
    background-color: <?=$color2_whatsapp?>
}

.btn-rm span.arrow-right {
    position: absolute;
    width: 0;
    height: 0;
    border-top: 25px solid transparent;
    border-bottom: 25px solid transparent;
    -webkit-transition: all .15s;
    -transition: all .15s;
    -webkit-transition-property: left, right;
    transition-property: left, right
}

.btn-rm.left span.arrow-right {
    left: 0;
    -webkit-box-shadow: -10px 0 0 0 <?=$color_whatsapp?>, -10px 0 0 0 <?=$color_whatsapp?>;
    box-shadow: -10px 0 0 0 <?=$color_whatsapp?>, -10px 0 0 0 <?=$color_whatsapp?>;
    border-left: 10px solid <?=$color_whatsapp?>
}

.btn-rm:active,
.btn-rm.active {
    height: 51px
}

.btn-rm:hover,
.btn-rm:active {
    color: #fff !important
}

.btn-rm:hover span.arrow-left {
    right: 10px
}

.btn-rm:hover span.arrow-right {
    left: 10px
}

.btn-rm-small {
    height: 30px;
    font-size: 12px;
    line-height: 10px
}

a.btn-rm-small span.btn-rm {
    height: 30px
}

#redmasiva-plugin {
    position: fixed;
    bottom: 15px;
    z-index: 99999;
    text-align: center;
    width: 500px;
    left: 50%;
    margin-left: -250px;
}

#boton-redmasiva svg {
    position: relative;
    top: 7px;
    fill: #fff
}

@media (min-width:600px) {
    .only-lg {
        display: inline !important;
    }
}
</style>
<div id="redmasiva-plugin">
  <a href="#" target="_blank" id="boton-redmasiva" class="btn-rm left">
	<span class="left icon"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg></span>
	<span class="right title"><span class="arrow-right"></span>Enviar Pedido <span class="only-lg">a WhatsApp</span></span>
  </a>
</div>
<script>
	var produx = "";
	var productos = JSON.parse(redmasiva.products);
	Object.values(productos).forEach(o => {
		let extras = "";
		Object.values(o.nuevo).forEach(x => {
		if (x.key == "_WCPA_order_meta_data" || x.value == "" || x.key.includes("dokan") || x.key.includes("pa_")){
			return true;
		}
		extras += "*" + x.key + "*: " + x.value + "%0A";
		})
	  produx += "%0A" + o.quantity + " x " + o.name + "%0A" + extras + "---%0A";
	})
	
	var titlex ="------ <?=$title_whatsapp?> ------%0A"
	var titulox ="------ Order %3A%20%23"+ order_numberx + " ------"

	var urlx = "https://web.whatsapp.com/send?phone=" + empresax + "&text=" + titlex + nombrex + direccionx + correox + numerox + "%0A" + titulox + produx +  enviox +  totalx + "%0A%0A " + footertext;
	var url2 = "https://wa.me/" + empresax + "?text=" + titlex + nombrex + direccionx + correox + numerox + "%0A" + titulox + produx +  enviox +  totalx + "%0A%0A " + footertext;
	
	<?=$boton_attr?>
</script>