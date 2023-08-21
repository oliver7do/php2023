<!DOCTYPE html>
<html>
<head>
    <title>Traitement Inscription</title>
</head>
<body>
    <h1>Résultat de l'Inscription</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nom = $_POST["nom"];
        $email = $_POST["email"];
        $motDePasse = $_POST["mot_de_passe"];
        $confirmation = $_POST["confirmation"];

        if (empty($nom) || empty($email) || empty($motDePasse) || empty($confirmation)) {
            echo "Tous les champs doivent être remplis.";
        } elseif ($motDePasse !== $confirmation) {
            echo "Les mots de passe ne correspondent pas.";
        } else {
            echo "Inscription réussie pour :<br>";
            echo "Nom: $nom<br>";
            echo "Adresse e-mail: $email<br>";
        }
    } else {
        echo "Le formulaire doit être soumis.";
    }
    ?>

    <br><a href="formulaire_inscription.html">Retour au formulaire</a>
</body>
</html>
