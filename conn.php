

<?php
$servername = "localhost";  // Dirección del servidor (puede ser "localhost" si está en el mismo servidor)
$username = "root";         // Nombre de usuario de la base de datos
$password = "2012116664";   // Contraseña del usuario
$dbname = "pos";            // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Si la conexión es exitosa
//echo "Conexión exitosa a la base de datos '$dbname'";

// Opcional: Establecer el conjunto de caracteres
$conn->set_charset("utf8");

// Aquí puedes continuar con tus consultas a la base de datos

// Cerrar la conexión cuando termines
// $conn->close();
?>
