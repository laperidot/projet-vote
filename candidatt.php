<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE candidat (
INSERT INTO `candidat` (`id`, `nom_prenom`, `photo`, `nomine`) VALUES
(1, 'DIVINE BLE', 'asset/photo_nomine/producteur_contenu/divine.jpg', 'producteur_contenu'),
(2, 'GODWIN SOOLA', 'asset/photo_nomine/producteur_contenu/godwin.JPG', 'producteur_contenu'),
(3, 'CAMILLE ETE', 'asset/photo_nomine/producteur_contenu/camille.JPG', 'producteur_contenu'),
(4, 'AUDREY BAMBA', 'asset/photo_nomine/producteur_contenu/audrey.jpg', 'producteur_contenu'),
(5, 'MARIE ELLA KOUAKOU', 'asset/photo_nomine/contenu_rh/marie.jpg', 'contenu_rh'),
(6, ' AUDE ANNICETTE KOKO', 'asset/photo_nomine/contenu_rh/anicette.JPG', 'contenu_rh'),
(7, 'MANON ARIELLE DEBLEZA', 'asset/photo_nomine/contenu_rh/arielle.jpg', 'contenu_rh'),
(8, 'RACHIDAT BROUAHIMA', 'asset/photo_nomine/contenu_rh/rachidat.jpg', 'contenu_rh'),
(99, 'BINNIE BINTOU CISSE', 'asset/photo_nomine/coach_expert/binnie.jpg', 'coach_expert'),
(10, 'VINCENT KADIO', 'asset/photo_nomine/coach_expert/kadio.jpg', 'coach_expert'),
(11, 'YANNICK BOKA', 'asset/photo_nomine/coach_expert/boka.jpg', 'coach_expert'),
(12, 'FREDERICK WILLIAMS KINGUE', 'asset/photo_nomine/coach_expert/kingue.jpg', 'coach_expert'),
(13, 'GRACE ADJE', 'asset/photo_nomine/contributeur_linkedin/grace.JPG', 'contributeur_linkedin'),
(14, 'RAISSA KOUADIO', 'asset/photo_nomine/contributeur_linkedin/raissa.jpg', 'contributeur_linkedin'),
(15, 'YASMINE SIBAHI', 'asset/photo_nomine/contributeur_linkedin/yasmine.jpg', 'contributeur_linkedin'),
(17, 'JOSEPH NDRI', 'asset/photo_nomine/contributeur_linkedin/joseph.jpg', 'contributeur_linkedin');
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>