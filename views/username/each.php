<?php

  session_start();
  require_once("C:/xampp/htdocs/JavaScriptExe/views/head/head.php");
  include("c:/xampp/htdocs/JavaScriptExe/connect.php");
  include("c:/xampp/htdocs/JavaScriptExe/functions.php");
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bazaritt";

// Obtener el identificador del artículo de la URL
$id = $_GET['id'];

try {
  // Establecer la conexión PDO
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // Establecer el modo de error de PDO a excepciones
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Consulta SELECT para obtener los datos del artículo específico
  $sql = "SELECT Titulo, Descripcion, Status, Precio, Imagen, Vendor FROM articulos WHERE id = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();

  // Obtener los resultados
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  // Verificar si se encontraron resultados
  if ($row) {
    // Obtener los datos del artículo
    $titulo = $row['Titulo'];
    $descripcion = $row['Descripcion'];
    $status = $row['Status'];
    $precio = $row['Precio'];
    $imagen = $row['Imagen'];
    $vendor = $row['Vendor'];

    // Mostrar los datos en la página de detalle
    echo "<h1>$titulo</h1>";
    echo "<p>Descripción: $descripcion</p>";
    echo "<p>Estado: $status</p>";
    echo "<p>Precio: $precio</p>";
    echo "<img src='$imagen' alt='Imagen'>";
    echo "<p>Vendedor: $vendor</p>";
  } else {
    echo "Artículo no encontrado.";
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
require_once("C:/xampp/htdocs/JavaScriptExe/views/head/footer.php");
?>





