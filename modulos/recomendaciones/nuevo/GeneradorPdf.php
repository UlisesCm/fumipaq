<?php

// Require composer autoload
include("../../../librerias/php/mpdf/vendor/autoload.php");
// require_once __DIR__ . '../../../librerias/php/mpdf/vendor/autoload.php';
require_once __DIR__ . '/plantilla/index.php';
$css = file_get_contents('plantilla/style.css');
date_default_timezone_set('America/Mexico_City');
// Create an instance of the class:

//$mpdf = new \Mpdf\Mpdf(['setAutoTopMargin' => 'utf-8', 'format' => 'Legal']);
//$mpdf = new \Mpdf\Mpdf(['setAutoTopMargin' => 'pad']);
$mpdf = new \Mpdf\Mpdf([
    'setAutoTopMargin' => 'stretch',
    'autoMarginPadding' => -58, 'format' => 'Letter'
]);


$mpdf->SetAuthor('My Name');

$datoscliente = getDatosCliente($array,'tress');


// Define the Headers before writing anything so they appear on the first page
$mpdf->SetHTMLHeader('
<header class="clearfix">
  <div id="logo">
    <img src="logo_fumylim.jpg">
  </div>
  <div id="empresa">
    <h2 class="name">FUMYLIM S DE RL C</h2>
    <div> AVENIDA LATINOAMERICANA AMPLIACION REVOLUCION 60153 </div>
    <div>52-39-937</div>
    <div><a href="mailto:correo@fumylim.com">correo@fumylim.com</a></div>
  </div>
  </div>
</header>'.$datoscliente, \Mpdf\HTMLParserMode::HTML_BODY,'O');


$mpdf->SetHTMLFooter('

        <div style="text-align: right;">{DATE j-m-Y}&nbsp;{DATE H:i:s}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fumipaq® Software & Sourcing  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       Pagina: {PAGENO}/{nbpg}</div>');

// $mpdf->SetHTMLFooter('
// <table width="100%" style="vertical-align: bottom; font-family: serif;
//     font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
//     <tr>
//         <td width="33%">{DATE j-m-Y}</td>
//         <td width="33%" align="center">Pagina: {PAGENO}/{nbpg}</td>
//         <td width="33%" style="text-align: right;">Texto Libre</td>
//     </tr>
// </table>');  // Note that the second parameter is optional : default = 'O' for ODD

// $array = [
//     "foo" => "bar",
//     "bar" => "foo",
// ];


$TitulosTablaArray = array("SERVICIO", "PRESENTACION", "CANTIDAD", "ClAVE PROD/SERV","PRECIO","IVA");
$ContenidoTablaArray = array("Uno", "Dos", "tres", "cuadro","cinco","seis","Uno", "Dos", "tres", "cuadro","cinco","seis","Uno", "Dos", "tres", "cuadro","cinco","seis","Uno", "Dos", "tres", "cuadro","cinco","seis","UnoSegundo", "DosSegundo", "tresSegundo", "cuadroSegundo","cincoSegundo","seisSegundo","Uno", "Dos", "tres", "cuadro","cinco","seis","UnoSegundo", "DosSegundo", "tresSegundo", "cuadroSegundo","cincoSegundo","seisSegundo","Uno", "Dos", "tres", "cuadro","cinco","seis","UnoSegundo", "DosSegundo", "tresSegundo", "cuadroSegundo","cincoSegundo","seisSegundo","Uno", "Dos", "tres", "cuadro","cinco","seis","UnoSegundo", "DosSegundo", "tresSegundo", "cuadroSegundo","cincocincoSegundocinco cincocinco Segundocinco Segundocinco SegundoSegundo","seisSegundo","Uno", "Dos", "tres", "cuadro","cinco","seis","UnoSegundo", "DosSegundo", "tresSegundo", "cuadroSegundo","cincoSegundo","seisSegundo","Uno", "Dos", "tres", "cuadro","cinco","seis","UnoSegundo", "DosSegundo", "tresSegundo", "cuadroSegundo","cincoSegundo","seisSegundo");




$tabladatos = getTablaDatos($TitulosTablaArray,$ContenidoTablaArray);


$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);

$mpdf->WriteHTML($tabladatos, \Mpdf\HTMLParserMode::HTML_BODY);



// $mpdf->WriteHTML($html);


$mpdf->Output();
$mpdf->Output('pd.pdf');

 ?>
