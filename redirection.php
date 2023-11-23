<!-- <?php
// Page de redirection

// Utilisez la fonction header() pour rediriger vers la page précédente
if (isset($_SERVER['HTTP_REFERER'])) {
    header("Location: auth.php");
    // header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
    // Si la page précédente n'est pas disponible, redirigez l'utilisateur vers une page par défaut
    header("Location: auth.php");
}

exit(); // Assurez-vous de sortir du script après la redirection
?> -->
