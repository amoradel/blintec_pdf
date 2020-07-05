<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

// Introducimos HTML de prueba
ob_start();
  // Operaciones para generar el HTML que pueden ser llamadas a Bases de Datos, while, etc...
  require_once ('plantillaPdf.php');
  // Volcamos el contenido del buffer
  $html = ob_get_clean();

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("letter", "portrait");
 
// Cargamos el contenido HTML.
$pdf->load_html($html);
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('reportePdf.pdf', array("Attachment"=>0));


function file_get_contents_curl($url) {
	$crl = curl_init();
	$timeout = 5;
	curl_setopt($crl, CURLOPT_URL, $url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
	$ret = curl_exec($crl);
	curl_close($crl);
	return $ret;
}