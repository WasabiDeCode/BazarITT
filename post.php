<?php
session_start();
  include("connect.php");
  include("functions.php");
  
  $user_data = check_login($con);
  if($_SERVER['REQUEST_METHOD'] == "POST")
    //POST ITEM
    {
      $Titulo = $_POST['Titulo'];
      $Descripcion = $_POST['Descripcion'];
      $Precio = $_POST['Precio'];
      $Status = $_POST['Status'];
      $Imagen = $_POST['Imagen'];
      $Vendor = $user_data['NumControl'];
      if(!empty($Titulo) && !empty($Descripcion) && !empty($Precio) && !empty($Status))
      {
        $query = "insert into articulos (Titulo, Descripcion, Precio, Status, Imagen, Vendor) values ('$Titulo', '$Descripcion', '$Precio', '$Status', '$Imagen', '$Vendor')";
        mysqli_query($con, $query);
        header("Location: items.php");
        die;
      }
      else {

        echo "Ingresa datos válidos";
      } 
    }
        
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bazar ITT | Postear Articulo</title>
    <link rel="stylesheet" href="styles/stylea.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
  </head>
  <body>

    <!-- sidebar -->
    <button class= "sidebar-toggle">
      <i class="fas fa-bars"></i>
    </button>

    <aside class="sidebar">
      <div class="sidebar-header">
        <img src="./logo.svg" class="logo">
        <button class="close-btn">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <ul class="links">
        <li>
          <a href="items.php">mis posts</a>
        </li>
        <li>
          <a href="welcome.php">marketplace</a>
        </li>
        <li>
          <a href="user.html">mi cuenta</a>
        </li>
        <li>
          <a href="contact.html">contacto</a>
        </li>
      </ul>
      <!-- social media -->
      <ul class="social-icons">
        <li>
          <a href="https://www.facebook.com">
            <i class="fab fa-facebook"></i>
          </a>
        </li>
        <li>
          <a href="https://www.twitter.com">
            <i class="fab fa-twitter"></i>
          </a>
        </li>
        <li>
          <a href="https://www.linkedin.com">
            <i class="fab fa-linkedin"></i>
          </a>
        </li>
      </ul>
    </aside>


    <!-- content -->
    <form id="login" class="input-group" method = "post">
      
      <h2>Publicar un artículo en venta</h2>
      <h3 for="fname">Nombre del producto:</h3>
      <input class= "imp" type="text" id="fname" name="Titulo" placeholder="Qué es?">
      <br>
      <h3 for="fname">Descripción:</h3>
      <input class= "imp" type="text" id="fname" name="Descripcion" placeholder="Qué hace?">
      <br>
      <h3 for="fname">Precio:     $</h3>
      <input class= "imp" type="text" id="fname" name="Precio" placeholder="Cuánto Cuesta?">
      <br>
      <h3 for="fname">Status</h3>
      <input class= "imp" type="text" id="fname" name="Status" placeholder="Sigue Disponible?">
      <br>
      <h3 for="fname">Imagen: </h3>
      <input class= "imp" type="file" id="fname" name="Imagen" placeholder="Imagen">
      <br>
      <button type="submit" class="submit-btn">Publicar</button>
    </form>
    
    
    <!-- javascript -->
    <script src="app.js"></script>
  </body>
</html>