<?php
include('../conn.php'); 
require_once('../TCPDF/TCPDF-main/tcpdf.php');

$output = ob_get_clean();
$salesid = isset($_GET['salesid']) ? $_GET['salesid'] : null;

// Ejecutar la consulta para obtener los detalles de ventas
$query = "SELECT * FROM sales_detail LEFT JOIN product ON product.productid=sales_detail.productid WHERE salesid='$salesid'";
$result = mysqli_query($conn, $query);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}

// Crear una nueva instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);

// Configuración del documenton
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('DEV Jorge Huchani Hernandez');
$pdf->setTitle('REPORTE DE VENTA');
$pdf->setSubject('PDF');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// MUESTRA TODO EL LOGO
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,128), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// TAMAÑO DE LA LETRA DEL LOGO
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


// ESPACIO ENTRE EL LOGO Y EL CONTENIDO
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//ENCABEZADO
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
//PIE
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));



// Agregar una página
$pdf->AddPage();

// Establecer la fuente
$pdf->SetFont('helvetica', '', 12);

$pdf->Write(0, 'Cliente:', '', 0, 'L', true, 0, false, false, 0);


// Título
$pdf->Cell(0, 10, 'Reporte de Ventas', 0, 1, 'C');



// Encabezados de tabla
$pdf->Cell(100, 10, 'Producto', 1);
$pdf->Cell(30, 10, 'Cantidad', 1);
$pdf->Cell(30, 10, 'Precio', 1);
$pdf->Cell(30, 10, 'Total', 1);
$pdf->Ln();

// Agregar datos a la tabla
while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(100, 10, $row['product_name'], 1);
    $pdf->Cell(30, 10, $row['product_qty'], 1);
    $pdf->Cell(30, 10, $row['product_price'], 1);
    $pdf->Cell(30, 10, $row['sales_qty'] * $row['product_price'], 1);
    $pdf->Ln();
}
while ($row = mysqli_fetch_assoc($result)) {
    print_r($row); // Esto te permitirá ver las claves y valores que estás obteniendo
    echo "<br>";
}
// Cerrar y generar el archivo PDF
$pdf->Output('reporte_ventas.pdf', 'I'); // 'I' indica que se mostrará en el navegador
ob_end_clean(); 
// Cerrar la conexión
$conn->close();
?>