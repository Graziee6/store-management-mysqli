<?php
$servername = "localhost";
$username = "root";
$password = "Borntopraise@10";
$dbname = "stock";
// ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Borntopraise@10';
// FLUSH PRIVILEGES;
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>