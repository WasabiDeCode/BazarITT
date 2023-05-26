<?php
session_start();
include("c:/xampp/htdocs/JavaScriptExe/connect.php"); // Ruta al archivo de conexión de la base de datos

// Cierra la sesión
session_unset();
session_destroy();

// Cierra la conexión a la base de datos
$conn = null;

// Redirecciona al usuario a la página de inicio de sesión u otra página deseada
header("Location: index.php"); 
exit();
?>
