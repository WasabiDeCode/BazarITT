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

try {
    // Establecer la conexión PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Establecer el modo de error de PDO a excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SELECT para obtener los datos del artículo específico
    $sql = "SELECT * FROM alumno WHERE NumControl = :numcontrol";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':numcontrol', $user_data['NumControl']);
    $stmt->execute();

    // Obtener los resultados
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontraron resultados
    if ($row) {
        // Obtener los datos del artículo
        $numcontrol = $row['NumControl'];
        $nombre = $row['NombreAlumno'];
        $password = $row['Password'];
        $numtelefono = $row['NumTelefono'];
        ?>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Detalles del Alumno</h2>
                    <div class="card-text">
                        <p><strong>Número de Control:</strong> <?php echo $numcontrol; ?></p>
                        <p><strong>Nombre de Usuario:</strong> <?php echo $nombre; ?></p>
                        <p><strong>Número Telefónico:</strong> <?php echo $numtelefono; ?></p>
                        <p><strong>Password:</strong> <?php echo $password; ?></p>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-danger" href="/JavaScriptExe/views/username/edituser.php">Editar Datos</a>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "Alumno no encontrado.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

require_once("C:/xampp/htdocs/JavaScriptExe/views/head/footer.php");

// Cerrar la conexión
$conn = null;
?>
