<?php

if (empty($_POST['txtTarjeta']) && empty($_POST['txtCVV']) && empty($_POST['txtmonto'])) {
	echo "Los datos no pueden estar vacios";
}else{
	$tarjeta = $_POST['txtTarjeta'];
	$cvv = $_POST['txtCVV'];
	$monto= $_POST['txtmonto'];
	$tipo= $_POST['tipo'];

	$server = 'http://bazteca.x10host.com/ws.php';
	$headers = array(
	'txtTarjeta' => $tarjeta,
	'txtCVV' => $cvv,
	'txtmonto' => $monto,
	'tipo' =>$tipo
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$server);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$remote_server_output = curl_exec ($ch);
	curl_close ($ch);
	print_r($remote_server_output);
	
}
?>
