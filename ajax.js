// Fonction pour voter pour un candidat
function voteForCandidate(candidateId) {
    // Effectuer une requête AJAX pour enregistrer le vote
    $.ajax({
        url: 'vote.php',
        method: 'POST',
        data: { candidateId: candidateId },
        success: function(response) {
            if (response === 'success') {
                // Le vote a été enregistré avec succès
                alert('Vote enregistré avec succès.');
                // Vous pouvez mettre à jour l'affichage pour indiquer que l'utilisateur a voté
            } else if (response === 'already_voted') {
                // L'utilisateur a déjà voté aujourd'hui
                alert('Vous avez déjà voté aujourd\'hui.');
            } else {
                // Une erreur s'est produite lors du vote
                alert('Une erreur s\'est produite lors du vote.');
            }
        },
        error: function() {
            // Erreur lors de la requête AJAX
            alert('Erreur lors de la requête AJAX.');
        }
    });
}

// Attacher des gestionnaires de clic aux boutons de vote
$(document).ready(function() {
    $('.btnvote').click(function() {
        var candidateId = $(this).data('candidate-id');
        voteForCandidate(candidateId);
    });
});
