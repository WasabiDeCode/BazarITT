<?php
session_start();
  include("connect.php");
  include("functions.php");
  
  $user_data = check_login($con);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bazar ITT | Marketplace</title>
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
          <a href="post.php">mi cuenta</a>
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
    <h1>Bazar ITT</h1>
    <h2>Bienvenido, <?php echo $user_data['NombreAlumno'];?></h2>
    <h3>Nombre del producto</h3>
    <p><b>Descripcion: </b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit dolor eget urna fermentum, sed maximus arcu bibendum. Vivamus nec nisl ut lacus commodo elementum. Sed et mattis dolor, vel egestas mi. Duis eget neque augue. Aliquam placerat tellus quis justo faucibus, tincidunt feugiat eros cursus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque ac vulputate dolor. Phasellus elit dui, porta non nulla sed, maximus fringilla orci. Nulla ultrices erat sapien, et elementum odio eleifend ut. Phasellus ac faucibus elit, elementum ultrices massa. Proin maximus quis velit non luctus. Donec sit amet magna sit amet libero tempus euismod. Quisque imperdiet, arcu eget egestas sagittis, mauris leo volutpat sem, mollis varius lacus tortor sed dolor. Suspendisse potenti.</p>

    <p><b>Precio: </b>$420</p>
    <p><b>Contacto del Vendedor: </b>664-123-4567</p>
    <p><b>Imagen </b></p>
    <img src= "fotostest/pica.jpg" style="border-radius: 8px; margin-left: 2%;">
    
    <!-- javascript -->
    <script src="app.js"></script>
  </body>
</html>