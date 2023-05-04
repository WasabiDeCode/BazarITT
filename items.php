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
    <title>Bazar ITT | My Items</title>
    <link rel="stylesheet" href="styles/styleb.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
  </head>
  <body>

    <!-- sidebar 
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
          <a href="items.html">mis posts</a>
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
    ------------ social media  ------- 
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
      -->

     <section class="menu">
      <!-- title -->
      <div class="title">
        <h2>Articulos a la venta</h2>
        <div class="underline"></div>
      </div>
      <!-- filter buttons -->
      <div class="btn-container">
        <!-- <button type="button" class="filter-btn" data-id="all">all</button>
        <button type="button" class="filter-btn" data-id="breakfast">
          breakfast
        </button>
        <button type="button" class="filter-btn" data-id="lunch">lunch</button>
        <button type="button" class="filter-btn" data-id="shakes">
          shakes
        </button> -->
      </div>
      <!-- menu items -->
      <div class="section-center">
        <!-- single item -->
        <article class="menu-item">
          <img src="fotostest/pc.jpg" alt="menu item" class="photo" />
          <div class="item-info">
            <header>
              <h4>computadora nueva</h4>
              <h4 class="price">$8500</h4>
            </header>
            <p class="item-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Repudiandae, sint quam. Et reprehenderit fugiat nesciunt inventore
              laboriosam excepturi! Quo, officia.
            </p>
          </div>
        </article>
        <!-- end of single item -->
        <!-- single item -->
        <article class="menu-item">
          <img src="fotostest/playeras.jpg" alt="menu item" class="photo" />
          <div class="item-info">
            <header>
              <h4>Playeras Impresas</h4>
              <h4 class="price">$250</h4>
            </header>
            <p class="item-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Repudiandae, sint quam. Et reprehenderit fugiat nesciunt inventore
              laboriosam excepturi! Quo, officia.
            </p>
          </div>
        </article>
        <!-- end of single item -->
        <!-- single item -->
        <article class="menu-item">
          <img src="fotostest/pica.jpg" alt="menu item" class="photo" />
          <div class="item-info">
            <header>
              <h4>Picafresas</h4>
              <h4 class="price">$1</h4>
            </header>
            <p class="item-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Repudiandae, sint quam. Et reprehenderit fugiat nesciunt inventore
              laboriosam excepturi! Quo, officia.
            </p>
          </div>

        </article>
        <br>
        <button type="button" class="filter-btn" data-id="lunch"><a href="welcome.php">Regresar</a></button>
        <!-- end of single item -->
      </div>
    </section>
    <!-- javascript -->
    <script src="app.js"></script>
  </body>
</html>