 (<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
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
        /* Ajout d'une ombre et de transitions aux champs */
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            margin-bottom: 15px;
          padding: 10px;
          width: 100%;
          border: 1px solid #ccc;
          border-radius: 3px;
          font-size: 16px;
           transition: box-shadow 0.3s, border-color 0.3s;
        }

          /* Ajout d'une ombre au survol */
        input[type="text"]:hover,
        input[type="email"]:hover,
        input[type="password"]:hover {
           box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
           border-color: #007bff;
        }

         /* Autres styles restent les mêmes */

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
        <h2>Formulaire d'inscription</h2>
        <form action="connexion.php" method="POST">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom">
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
            
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="mot_de_passe">
 
            <button type="submit">S'inscrire</button>

            <p>vous avez deja un compte? <a href=connexion.php>connectez vous</a></p>
        </form>  
    </div>
</body>
</html>
 <?php
// Inclure le fichier de configuration de la base de données
include("config.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $motDePasse = $_POST["mot_de_passe"];

    // Valider les données d'entrée (vous pouvez ajouter plus de validations si nécessaire)
    $nom = filter_var($nom, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Vérifier si l'email est valide
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'adresse email n'est pas valide.";
        exit();
    }

    // Sécuriser le mot de passe avec MD5
    $hashedPassword = md5(md5($motDePasse));

    // Utiliser une requête préparée pour insérer les données dans la base de données
    $sql = "INSERT INTO users (nom, email, mot_de_passe) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Lier les paramètres et exécuter la requête
        $stmt->bind_param("sss", $nom, $email, $hashedPassword);

        if ($stmt->execute()) {
            // Rediriger l'utilisateur vers la page de connexion après l'inscription
            header("Location: connexion.php");
            exit();
        } else {
            echo "Erreur lors de l'inscription : " . $stmt->error;
        }

        // Fermer la requête préparée
        $stmt->close();
    } else {
        echo "Erreur de préparation de la requête : " . $mysqli->error;
    }

    // Fermer la connexion à la base de données
    $mysqli->close();
}

