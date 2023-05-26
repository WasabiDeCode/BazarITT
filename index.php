<?php
session_start();
  include("connect.php");
  include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
    //login
  {
    $NumControl = $_POST['NumControl'];
    $Password = $_POST['Password'];
    if(!empty($NumControl) && !empty($Password))
    {
      $query = "select * from alumno where NumControl = '$NumControl' limit 1";
      $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0)
        {
          $user_data = mysqli_fetch_assoc($result);
          if($user_data['Password'] === $Password){
            $_SESSION['NumControl'] = $user_data['NumControl']; 
            
            header("Location: index2.php");
            die();
          }
        }
      
    } 
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bazar ITT | Login</title>
    <link rel="stylesheet" href="styles/styles.css">
  </head>
  <body>
    <div class="hero">
      <div class="form-box">
        <div class="button-box">
            <div id="btn"></div>
            <button type="button" name="submit-login" class="toggle-btn" onclick="login()">Log In</button>
            <button type="button" name="submit-register" class="toggle-btn" onclick="window.location.href = 'register.php';">Register</button>
        </div>

        <form id="login" class="input-group" method = "post">
          <input name = "NumControl" type="text" class="input-field" placeholder="Numero de Control" required>
          <input name = "Password" type="text" class="input-field" placeholder="Contraseña" required>
          <br>
          <button type="submit" class="submit-btn">Ingresar</button>
        </form>

        <form id="register" class="input-group" method="post">
          <input name= "RegId" type="text" class="input-field" placeholder="Numero de Control" required>
          <input name= "RegName" type="text" class="input-field" placeholder="Nombre" required>
          <input name="RegTel" type="text" class="input-field" placeholder="Numero de Teléfono" required>
          <input type="text" class="input-field" placeholder="Contraseña" required>
          <input name= "RegPass" type="text" class="input-field" placeholder="Confirmar Contraseña" required>
          <br>
          <button type="submit" class="submit-btn">Registrar</button>
        </form>

      </div>



    </div>
    <script>
      var x = document.getElementById("login");
      var y = document.getElementById("register");
      var z = document.getElementById("btn");

      function register(){
        x.style.left="-400px";
        y.style.left="50px";
        z.style.left="110px";
      }
      function login(){
        x.style.left="50px";
        y.style.left="450px";
        z.style.left="0";
      }
    </script>

  </body>
</html>