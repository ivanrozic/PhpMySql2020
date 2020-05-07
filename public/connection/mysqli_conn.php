<?php
$my_host="localhost";
$my_user="root";
$my_pass="";
$my_db="fakultet";

$mysqli = new mysqli($my_host,$my_user,$my_pass,$my_db);

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>