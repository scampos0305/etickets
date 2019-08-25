<?php
require_once 'pdf/lib/dompdf/dompdf_config.inc.php';

	$html = '<b>Gracias por el retiro del saldo a tu cuenta azteca.</b>';
	
	$dompdf = new DOMPDF();
	$dompdf->load_html( $html);
	$dompdf->render();
	$dompdf->stream("mi_archivo.pdf");

	echo "gracias";
?>