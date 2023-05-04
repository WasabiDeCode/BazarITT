<?php
session_start();
  include("connect.php");
  include("functions.php");
    
    $NumControl = $_POST['NumControl'];
    $regName = $_POST['RegName'];
    $reg_Tel = $_POST['RegTel'];
    $regPass = $_POST['RegPass'];
    if(!empty($NumControl) && is_numeric($NumControl) && !empty($regPass))
    {

       //Register
       $query = "insert into alumno (NumControl, NombreAlumno, Password, NumTelefono) values ('$NumControl', '$regName', '$regPass', '$reg_Tel')";
       mysqli_query($con, $query);
       header("Location: welcome.php");
       die;


    } else 
    {
      echo "Ingresa datos validos";
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
            <div id="btn" style= "left: 110px;"></div>
            <button type="button" name="submit-login" class="toggle-btn" onclick="window.location.href = 'index.php';">Log In</button>
            <button type="button" name="submit-register" class="toggle-btn" onload="register()">Register</button>
        </div>

        <form id="login" class="input-group" method = "post" style= "left: -400px">
          <input name = "NumControl" type="text" class="input-field" placeholder="Numero de Control" required>
          <input name = "Password" type="text" class="input-field" placeholder="Contraseña" required>
          <br>
          <button type="submit" class="submit-btn">Ingresar</button>
        </form>

        <form id="register" class="input-group" method="post" style= "left: 50px">
          <input name= "NumControl" type="text" class="input-field" placeholder="Numero de Control" required>
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
    </script>

  </body>
</html>