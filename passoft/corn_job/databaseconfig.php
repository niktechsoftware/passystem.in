<?php
$dbhost="localhost";
$dbuser="schoodhe_school";
$dbpass="Rahul!123singh";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,"schoodhe_A");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

