<?php
header("Content-type:application/json");
$host = "localhost";
$user = "root";
$pass = "";
$db = "absen";

$link = mysqli_connect($host,$user,$pass,$db) or die(mysqli_error());

$id = $_POST['id'];
  $query = "INSERT INTO absen (id_users) VALUES ($id)";
mysqli_query($link,$query);
?>
