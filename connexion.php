<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="email"],
        input[type="password"] {
            margin-bottom: 15px;
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>connexion</h2>
      <form action="index.php" method="POST">

          <label for="email">email</label>
          <input type="email" id="email" name="email"><br>
          
          <label for="mot_de_passe">Mot de passe</label>
          <input type="password" id="mot_de_passe" name="mot_de_passe"><br>

          <button type="submit">se connecter</button>

      </form>
       <p>Vous n'avez pas encore de compte ? <a href="register.php">Inscrivez-vous</a></p>
    </div>
</body>
</html>
<?php
// session_start(); // Démarrer la session

if (isset($_SESSION['id']) && isset($_SESSION['nom_utilisateur'])) {
    // L'utilisateur est déjà connecté, redirigez-le vers la page de tableau de bord
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $motDePasse = $_POST["mot_de_passe"];

    // Inclure le fichier de configuration
    include('config.php');

    // Valider les données d'entrée
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Vérifier si la connexion à la base de données est établie
    if ($mysqli) {
        // Utiliser une requête préparée pour récupérer l'utilisateur par son email
        $sql = "SELECT id, nom, mot_de_passe FROM users WHERE email = ?";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            // Lier le paramètre et exécuter la requête
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $resultat = $stmt->get_result();
            $utilisateur = $resultat->fetch_assoc();

            if ($utilisateur) {
                // Vérifier le mot de passe avec MD5
                if (md5(md5($motDePasse)) === $utilisateur['mot_de_passe']) {
                    // Authentification réussie, enregistrez l'utilisateur dans la session
                    $_SESSION['id'] = $utilisateur['id'];
                    $_SESSION['nom_utilisateur'] = $utilisateur['nom'];

                    // Rediriger l'utilisateur vers le tableau de bord
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Mot de passe incorrect.";
                }
            } else {
                echo "Aucun utilisateur trouvé avec cet email.";
            }

            // Fermer la requête préparée
            $stmt->close();
        } else {
            echo "Erreur de préparation de la requête : " . $mysqli->error;
        }

        // Fermer la connexion à la base de données
        $mysqli->close();
    } else {
        echo "Erreur de connexion à la base de données : " . mysqli_connect_error();
    }
}
