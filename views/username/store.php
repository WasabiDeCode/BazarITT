<?php
  session_start();
  require_once("C:/xampp/htdocs/JavaScriptExe/views/head/head.php");
  include("c:/xampp/htdocs/JavaScriptExe/connect.php");
  include("c:/xampp/htdocs/JavaScriptExe/functions.php");

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bazaritt";

  $user_data = check_login($con);
  $numcontrol = $user_data['NumControl'];

  try {
    // Establecer la conexión PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Establecer el modo de error de PDO a excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Consulta SELECT
    $sql = "SELECT * FROM articulos WHERE Vendor = $numcontrol";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Obtener los resultados
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<div class="container">';
    echo '<h1>Mis Items</h1>';
    echo '<h1>Bienvenido, ' . $user_data['NombreAlumno'] . '</h1>';

    // Imprimir la tabla de Bootstrap
    echo '<table class="table table-bordered">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th>Título</th>';
    echo '<th>Descripción</th>';
    echo '<th>Estado</th>';
    echo '<th>Precio</th>';
    echo '<th>Imagen</th>';
    echo '<th>Vendedor</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Recorrer los resultados
    foreach ($results as $row) {
      $idArticulo = $row['idArticulo'];
      $titulo = $row['Titulo'];
      $descripcion = $row['Descripcion'];
      $status = $row['Status'];
      $precio = $row['Precio'];
      $imagen = $row['Imagen'];
      $vendor = $row['Vendor'];

      echo '<tr>';
      echo "<td><a href='edit.php?id=$idArticulo'>$titulo</a></td>";
      echo "<td>$descripcion</td>";
      echo "<td>$status</td>";
      echo "<td>$precio</td>";
      echo "<td><img src='$imagen' alt='Imagen'></td>";
      echo "<td>$vendor</td>";
      echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  require_once("C:/xampp/htdocs/JavaScriptExe/views/head/footer.php");

  // Cerrar la conexión
  $conn = null;
?>
