<?php

$servername = "mysql-container"; // match the container name above
$username = "root";
$password = "root";
$dbname = "gallery";
$dbPass = getenv("MYSQL_ROOT_PASSWORD");
$dbName = getenv("MYSQL_DATABASE");

$conn = mysqli_connect($servername , $username , $password , $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
