<?php
// Votre logique de connexion à la base de données
require_once 'register.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Vérification des informations d'identification dans la base de données
    
    // Création de la session
}
?>
<?php
session_start();

if (isset($_POST['login'])) {
    // Votre logique de vérification des informations d'identification
    // Si les informations sont valides, définissez la session 'logged_in' sur true
    $_SESSION['logged_in'] = true;
    header("Location: inscription.html");
    exit;
}

// Le reste du contenu de votre page de connexion (formulaire, etc.)
?>
