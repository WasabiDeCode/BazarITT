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

$user_data = check_login($con);

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los valores del formulario
    $nombre = $_POST['NombreAlumno'];
    $password = $_POST['Password'];
    $numtelefono = $_POST['NumTelefono'];

    // Realiza la actualización en la base de datos
    $sql = "UPDATE alumno SET NombreAlumno = ?, Password = ?, NumTelefono = ? WHERE NumControl = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $nombre, $password, $numtelefono, $user_data['NumControl']);

    if ($stmt->execute()) {
        // Redireccionar a otra página después de la actualización
        header("Location: index.php");
        exit(); // Asegurar que se detiene la ejecución después de la redirección
    } else {
        echo "Hubo un error al realizar la actualización: " . $stmt->error;
    }
}

// Cerrar la conexión
$conn->close();
require_once("C:/xampp/htdocs/JavaScriptExe/views/head/footer.php");
?>

<div class="container">
    <form action="" method="POST" autocomplete="off">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="NombreAlumno" class="form-control" id="nombre" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="text" name="Password" class="form-control" id="password" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="numTelefono" class="form-label">Número de Teléfono:</label>
            <input type="text" name="NumTelefono" class="form-control" id="numTelefono" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>
        <a class="btn btn-danger" href="/JavaScriptExe/views/username/index.php">Cancelar</a>
    </form>
</div>
