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
$pdf = new TCPDF();

// Configuración del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Reporte de Ventas');
$pdf->SetSubject('Reporte de Ventas');
$pdf->SetKeywords('TCPDF, PDF, reporte, ventas');

// Agregar una página
$pdf->AddPage();

// Establecer la fuente
$pdf->SetFont('helvetica', '', 12);

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