<?php
$servername = "localhost";
$username = "spcom1_massita";
$password = "mqPXxy(Sximm";
$dbname = "spcom1_massitadb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,
mot_de_passe varchar(50) NOT NULL,
-- reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>