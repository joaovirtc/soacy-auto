<?php

$servername = "15.229.73.17:3306";
$database = "carro";
$username = "dev";
$password = "[!_ph3d7DLi/-(lJ";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
   
?>