<?php
$host = "localhost"; // L'hôte de la base de données
$database = "spcom1_massitadb"; // Le nom de la base de données
$username = "spcom1_massita"; // Votre nom d'utilisateur MySQL
$password = "mqPXxy(Sximm"; // Votre mot de passe MySQL

// Connexion à la base de données
$mysqli = new mysqli($host, $username, $password, $database);

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
}

?>


