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

  // Verificar si se encontraron resultados
  if ($stmt->rowCount() > 0) {
    // Obtener los resultados
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtener los datos del artículo
    $titulo = $row['Titulo'];
    $descripcion = $row['Descripcion'];
    $status = $row['Status'];
    $precio = $row['Precio'];
    $imagen = $row['Imagen'];
    $vendor = $row['Vendor'];

    // Consulta SELECT para obtener el número de teléfono del vendedor
    $sql = "SELECT NumTelefono FROM alumno WHERE NumControl = :vendor";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':vendor', $vendor);
    $stmt->execute();

    // Verificar si se encontraron resultados
    if ($stmt->rowCount() > 0) {
      // Obtener el número de teléfono del vendedor
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $numTelefono = $row['NumTelefono'];

      // Mostrar los datos en la página de detalle
      ?>
      <div class="container">
        <div class="article-details">
          <h1 class="title"><?php echo $titulo; ?></h1>
          <div class="image-container">
            <img src="<?php echo $imagen; ?>" alt="Imagen">
          </div>
          <div class="details">
            <p class="description"><b>Descripción:</b> <?php echo $descripcion; ?></p>
            <p><b>Estado:</b> <?php echo $status; ?></p>
            <p><b>Precio:</b> <?php echo $precio; ?></p>
            <p><b>Vendedor:</b> <a href="https://api.whatsapp.com/send?phone=<?php echo $numTelefono; ?>"><?php echo $vendor; ?></a></p>
          </div>
        </div>
      </div>
      <?php
    } else {
      echo "No se encontró el número de teléfono del vendedor.";
    }
  } else {
    echo "Artículo no encontrado.";
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

require_once("C:/xampp/htdocs/JavaScriptExe/views/head/footer.php");
// Cerrar la conexión
$conn = null;

?>
