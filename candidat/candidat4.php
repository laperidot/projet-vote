<?php
// Incluez le fichier de configuration de la base de données
include("config.php");

// Sélectionnez les candidats dont la colonne "nomine" est égale à "contributeur_linkedin"
$query = "SELECT candidat.id, candidat.nom_prenom, candidat.photo, SUM(vote.points) AS total_points
          FROM candidat
          LEFT JOIN vote ON candidat.id = vote.candidat_id
          WHERE candidat.nomine = 'contributeur_linkedin'
          GROUP BY candidat.id";
$result = $mysqli->query($query);

// Vérifiez s'il y a des résultats
if ($result->num_rows > 0) {
    // Affichez les candidats
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $nom_prenom = $row['nom_prenom'];
        $photo = $row['photo'];
        $total_points = $row['total_points']; // Récupérez le nombre total de points depuis la jointure

        echo "<div class='candidate'>";
        echo "<div class='cercleform'>";
        echo "<div class='ecircle'><img src='$photo' alt='$nom_prenom'></div>";
        echo "</div>";
        echo "<div class='infoscandi'>";
        echo "<h2>$nom_prenom</h2>";
        echo "<div class='count'>$total_points</div>"; // Affichez le nombre total de points ici
        echo "<form action='vote.php' method='POST'>";
        echo "<input type='hidden' name='candidateId' value='$id'>";
        echo "<button type='button' class='btnvote' data-candidateId='$id'>VOTEZ ICI</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Aucun candidat trouvé.";
}

// Fermez la connexion à la base de données
$mysqli->close();
?>
