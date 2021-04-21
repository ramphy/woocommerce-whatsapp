<?php
	if ( wp_is_mobile() ) {
		$boton_attr = "document.getElementById('boton-redmasiva').setAttribute('href', url2)";
	} else {
		$boton_attr = "document.getElementById('boton-redmasiva').setAttribute('href', urlx)";
	}