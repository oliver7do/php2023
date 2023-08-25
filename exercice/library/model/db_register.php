<?php 
require_once('../inc/db_connection.php');
require_once('../inc/function.php');
var_dump($_POST);

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $message = $_POST['message'];
//     $genre = $_POST['genre'];
//     $tel = $_POST['tel'];
//     $pays = $_POST['pays'];
    

//     // Ici, vous pouvez effectuer des validations et sécuriser les données

//     // Enregistrement dans la base de données (exemple)
//     // $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
//     // ... exécution de la requête ...

//     debug($_POST); // Utilisation de la fonction de débogage
// }
// ?>