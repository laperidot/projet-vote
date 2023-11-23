<?php
include('config.php');

// Récupérer le nom des candidats et le nombre de points depuis les tables "candidat" et "vote" avec une jointure (JOIN)
$requetePoints = "SELECT c.candidat_name, SUM(v.points) AS total_points 
                 FROM candidat c 
                 LEFT JOIN vote v ON c.id = v.candidat_id 
                 GROUP BY c.id";
$resultatPoints = $connexion->query($requetePoints);

if ($resultatPoints->num_rows > 0) {
    $nombreDeVotes = 0; // Initialisez la variable $nombreDeVotes à zéro

    while ($row = $resultatPoints->fetch_assoc()) {
        $candidatName = $row['candidat_name'];
        $totalPoints = $row['total_points'];

        // Afficher le nom du candidat et le nombre de points
        echo "Candidat : $candidatName, Points : $totalPoints<br>";

        // Incrémentez la variable $nombreDeVotes avec le total des points
        $nombreDeVotes += $totalPoints;
    }
} else {
    echo "Aucun vote enregistré pour le moment.";
}

// Fermer la connexion à la base de données
$connexion->close();
?>
