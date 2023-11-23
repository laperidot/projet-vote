<?php
// Incluez le fichier de configuration de la base de données
include("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidateId = $_POST['candidateId'];
    $userIP = $_SERVER['REMOTE_ADDR'];
    $currentDate = date('Y-m-d H:i:s'); // Inclut l'heure dans la date

    // Vérifiez si l'utilisateur a déjà voté dans les 2 dernières heures
    $checkVoteQuery = "SELECT MAX(vote_date) as last_vote FROM vote WHERE ip = ?";
    $checkVoteResult = $mysqli->prepare($checkVoteQuery);
    $checkVoteResult->bind_param('s', $userIP);
    $checkVoteResult->execute();
    $checkVoteResult->bind_result($lastVoteDate);
    $checkVoteResult->fetch();
    $checkVoteResult->close();

    if ($lastVoteDate !== null) {
        $lastVoteTime = strtotime($lastVoteDate);
        $currentTime = strtotime($currentDate);
        $timeDiff = $currentTime - $lastVoteTime;

        // Vérifiez si l'intervalle de temps est inférieur à 2 heures (en secondes)
        if ($timeDiff < 7200) {
            // L'utilisateur a déjà voté dans les 2 dernières heures, affichez une pop-up d'erreur
            echo "already_voted";
            exit;
        }
    }

    // Utilisez une requête préparée pour insérer le vote
    $insertVoteQuery = "INSERT INTO vote (users_id, ip, candidat_id, points, vote_date) VALUES (?, ?, ?, 1, ?)";
    $insertVoteResult = $mysqli->prepare($insertVoteQuery);
    $insertVoteResult->bind_param('iss', 1, $userIP, $candidateId, $currentDate);

    if ($insertVoteResult->execute()) {
        // Le vote a été enregistré avec succès
        echo "success";
    } else {
        // Erreur lors de l'enregistrement du vote, affichez une pop-up d'erreur
        echo "error";
    }
    $insertVoteResult->close();
}

// Fermez la connexion à la base de données
$mysqli->close();
?>
