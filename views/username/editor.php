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

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los valores del formulario
    $titulo = $_POST['Titulo'];
    $descripcion = $_POST['Descripcion'];
    $precio = $_POST['Precio'];
    $status = $_POST['Status'];
    $imagen = $_POST['Imagen'];

    // Validar y sanear los datos recibidos del formulario

    // Realiza la actualización en la base de datos
    $sql = "UPDATE articulos SET Titulo = ?, Descripcion = ?, Precio = ?, Status = ?, Imagen = ? WHERE idArticulo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssdssi', $titulo, $descripcion, $precio, $status, $imagen, $id);
    if ($stmt->execute()) {
        echo "La actualización se realizó correctamente.";
    } else {
        echo "Hubo un error al realizar la actualización: " . $stmt->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

<div class="container">
    <form action="" method="POST" autocomplete="off">
        <div class="mb-3">
            <label for="titulo" class="form-label">Nombre del Producto</label>
            <input type="text" name="Titulo" class="form-control" id="titulo" aria-describedby="emailHelp">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" name="Descripcion" class="form-control" id="descripcion" aria-describedby="emailHelp">
            <label for="status" class="form-label">Status (Disponible/Vendido/Apartado)</label>
            <input type="text" name="Status" class="form-control" id="status" aria-describedby="emailHelp">
            <label for="precio" class="form-label">Precio $ (Sólo Numeros)</label>
            <input type="text" name="Precio" class="form-control" id="precio" aria-describedby="emailHelp">
            <label for="imagen" class="form-label">Imagen</label>
            <input class="form-control" type="file" id="imagen" name="Imagen" placeholder="Imagen">
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>
        <a class="btn btn-danger" href="/JavaScriptExe/views/username/show.php">Cancelar</a>
    </form>
</div>

<?php
require_once("C:/xampp/htdocs/JavaScriptExe/views/head/footer.php");
?>
