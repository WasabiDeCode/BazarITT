<?php
$NumControl = $_POST['NumControl'];
$Password = $_POST['Password'];
$NombreAlumno = $_POST['NombreAlumno'];
$NumTelefono = $_POST['NumTelefono'];

//database connection
$conn = new msqli('(local)', 'DESKTOP-C484DBD\Malvado Dr. Tocino', 'Bazar');
if ($conn-> connect_error){
  die('Connection Failed : '.$conn->connect_error);
}else{
  $stmt = $conn->prepare("Insert into Alumno(NumControl, NombreAlumno, Password, NumTelefono)values(?,?,?,?)");
  $stmt->bind_param("ssss", $NumControl, $NombreAlumno, $Password, $NumTelefono);
  $stmt->execute();
  echo "registration success";
  $stmt->close();
  $conn->close();
}
?>
