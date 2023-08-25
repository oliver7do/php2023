<?php
include_once '../inc/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];

    // Ici, vous pouvez effectuer des validations et sécuriser les données

    // Enregistrement dans la base de données (exemple)
    // $sql = "INSERT INTO book (title, author) VALUES ('$title', '$author')";
    // ... exécution de la requête ...

    debug($_POST); // Utilisation de la fonction de débogage
}
?>
