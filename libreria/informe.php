<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
include('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sergio Figueroa G');
$pdf->SetTitle('Informe-001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

require_once('../models/class.Conexion.php');
require_once('../models/auditoria_modelo.php');

    $obj = new Acceso();

    if (isset($_GET['id_f'])) {
        $id = $_GET['id_f'];
       $resp = $obj->factura_pdf($id);
       $resp2 = $obj->factura_cabecera($id);
        //$fecha = $resp['xml13'];
        $total_f=0;
       // $fecha = $resp['xml5'];
        echo $fecha;
        
       
    } else {
        echo "Error: El parámetro 'id_f' no se proporcionó en la URL.";
    }
    

//$resp = $obj->factura_pdf();



$html = <<<EOD
<style>
.cabecera {
    height: 400px;
    width: 90%;
    text-align: center;
}
th {
    background-color:#B0BCEC;
}
ul {
    list-style-type: none;
    padding-left: 0;
}
.tf {
    font-size: 22px;
    color: blue;
    background: gray;
    text-align: center;
}
.titulo {
    text-align: center;
    font-size: x-large;
    margin:auto;
    color:#143EE9;
    width:45%;
}
.fc {
    color:#143EE9;
    font-size: 15px;
}
</style>
<div class="cabecera">
    <table>
        <tr>
            <td>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrYHrYDoHLFGUd0r4IdLcsxhQMpM5HWWKvMA&usqp=CAU">
            </td>
            <td>
                <div class="titulo"><b>LJ REPUESTOS DE MOTOS Y CARROS</b></div>
                <ul class="sin-decoracion">
                    <li><b>NIT: 4145454-1</b></li>
                    <li>Regimen simplificado</li>
                    <li>Cel: 3004525859-Fijo: 7868902</li>
                    <li>elinge@gmail.com</li>
                    <li>CRA 15#9B -46</li>
                    <li>Monteria-Cordoba</li>
                </ul>
            </td>
            <td>
                <table border="1">
                    <tr>
                        <td><b class="fc">FACTURA DE VENTA</b></td>
                    </tr>
                    <tr>
                        <td>Numero: 1408</td>
                    </tr>
                    <tr>
                        <td>Fecha: 2023-08-31 </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="height: 20px;"></td> <!-- Espacio entre las tablas -->
        </tr>
    </table>
</div>
EOD;

$html2 = '<br><br>'; // Agregamos dos saltos de línea para crear un espacio entre las tablas.
$html2 .= '<table border="1" cellspacing="0" cellpadding="5" style="margin:auto;">';
$html2 .= '<thead>';
$html2 .= '<tr>';
$html2 .= '<th>Cliente</th>';
$html2 .= '<th>Fecha</th>';
$html2 .= '<th>Vendedor</th>';
$html2 .= '</tr>';
$html2 .= '</thead>';
$html2 .= '<tbody>';

$resp2 = json_decode($resp2, true); 
foreach ($resp2 as $row1){
    $html2 .= '<tr>';
    $html2 .= '<td>' . $row1['xml12'] . '</td>';
    $html2 .= '<td>' . $row1['xml13'] . '</td>';
    $html2 .= '<td>' . $row1['xml14'] . '</td>';
    $html2 .= '</tr>';
}

$html2 .= '</tbody>';
$html2 .= '</table>';

// Crear una tabla HTML
$html3 = '<br><br>'; // Agregamos dos saltos de línea para crear un espacio entre las tablas.
$html3 .= '<table border="1" cellspacing="0" cellpadding="5" style="margin:auto;">';
$html3 .= '<thead>';
$html3 .= '<tr>';
$html3 .= '<th>Descripcion</th>';
$html3 .= '<th>CANT</th>';
$html3 .= '<th>VR UNIT</th>';
$html3 .= '<th>VR TOTAL</th>';
$html3 .= '<th>TOTAL TOTAL</th>';
$html3 .= '</tr>';
$html3 .= '</thead>';
$html3 .= '<tbody>';

$resp = json_decode($resp, true); 
foreach ($resp as $row){
    $html3 .= '<tr>';
    $html3 .= '<td>' . $row['xml1'] . '</td>';
    $html3 .= '<td>' . $row['xml2'] . '</td>';
    $html3 .= '<td>' . $row['xml3'] . '</td>';
    $html3 .= '<td>' . $row['xml4'] . '</td>';
    $html3 .= '<td rowspan="2" class="tf">' . $row['xml6'] . '</td>';
    $html3 .= '</tr>';
}

$html3 .= '</tbody>';
$html3 .= '</table>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, '', '', $html3, 0, 1, 0, true, '', true);

// Close and output PDF document
$pdf->Output('example_001.pdf', 'I');


//============================================================+
// END OF FILE
//============================================================+