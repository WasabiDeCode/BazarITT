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
  $sql = "SELECT * FROM articulos WHERE idArticulo = :id";
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

    echo '<div class="container">';
    echo '<div class="card mt-4">';
    echo '<div class="card-body">';
    echo '<h1 class="card-title">' . $titulo . '</h1>';
    echo '<p class="card-text">Descripción: ' . $descripcion . '</p>';
    echo '<p class="card-text">Estado: ' . $status . '</p>';
    echo '<p class="card-text">Precio: ' . $precio . '</p>';
    echo '<img src="' . $imagen . '" alt="Imagen" class="img-fluid">';
    echo '<p class="card-text">Vendedor: ' . $vendor . '</p>';
    echo '<div class="d-flex justify-content-between">';
    echo '<form action="" method="POST">';
    echo '<button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>';
    echo '</form>';
    echo '<a class="btn btn-warning" href="/JavaScriptExe/views/username/show.php">Cancelar</a>';
    echo '<a class="btn btn-primary" href="/JavaScriptExe/views/username/editor.php?id=' . $id . '">Editar</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    // Procesar la eliminación si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar'])) {
      // Realizar la eliminación en la base de datos
      $sql = "DELETE FROM articulos WHERE idArticulo = :id";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':id', $id);

      if ($stmt->execute()) {
        echo '<div class="container mt-4">';
        echo '<div class="alert alert-success" role="alert">El registro se eliminó correctamente.</div>';
        echo '</div>';
      } else {
        echo '<div class="container mt-4">';
        echo '<div class="alert alert-danger" role="alert">Hubo un error al eliminar el registro: ' . $stmt->errorInfo()[2] . '</div>';
        echo '</div>';
      }
    }
  } else {
    echo '<div class="container mt-4">';
    echo '<div class="alert alert-danger" role="alert">Artículo no encontrado.</div>';
    echo '</div>';
  }

  echo '<div class="container mt-4">';
  
  echo '</div>';
  
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;

require_once("C:/xampp/htdocs/JavaScriptExe/views/head/footer.php");
?>
