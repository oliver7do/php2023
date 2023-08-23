<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Inscription</title>
</head>

<body>
    <h2>Inscription</h2>
    <?php
        session_start();
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            echo '<a href="logout.php" class="logout-button">Déconnexion</a>';
        } else {
            echo '<a href="login.php" class="login-button">Connexion</a>';
        }
        ?>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
        <input type="email" name="email" placeholder="Adresse e-mail" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required><br>
        <input type="file" name="profile_image" accept="image/*"><br>
        <input type="submit" value="S'inscrire">
    </form>
</body>

</html>