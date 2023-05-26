<?php
function check_login($con)
{
  if(isset($_SESSION['NumControl']))
  {
    $id = $_SESSION['NumControl'];
    $query = "select * from Alumno where NumControl = '$id' limit 1";
    $result = mysqli_query($con, $query);
    if($result && mysqli_num_rows($result) > 0)
    {
      $user_data = mysqli_fetch_assoc($result);
      return $user_data;
    }
  }
  header("Location: index2.php");
  die;
}