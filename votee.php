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
$sql = "CREATE TABLE vote (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
users_id INT(30) NOT NULL,
ip VARCHAR(30) NOT NULL,
candidat_id INT(50) NOT NULL,
points INT(50) NOT NULL,
vote_date timestamp NULL DEFAULT current_timestamp()
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>