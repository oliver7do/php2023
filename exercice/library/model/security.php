<?php
session_start();
require_once "../inc/db_connection.php";


if (isset($_POST['connexion'])) {
$email = $_POST['email'];
$password = $_POST['password'];
// etablir la connexion avec la bd
$connect = dbConnexion();
// preparer la requete
$connexionRequest = $connect->prepare("SELECT * FROM user WHERE email = ?");
// executer la requete
$connexionRequest->execute(array($email));
// recupere le resultat de la requete
$utilisateur = $connexionRequest->fetch(PDO::FETCH_ASSOC); // convertir le resultat de la requete en tableau pour le manipuler facilement
// echo "<pre>";
    // print_r($utilisateur);
    // echo "<pre>";



    // explicaçao do que acontece na base de dados
    // $utilisateur = [
    // 'id_membre' => 1, 
    // "email" => "WassilaDors@mail.com", 
    // "pseudo" => "WassilaDors", 
    // "mdp" => "$2y$10$vh0tSKgL8CTBL4ioplv.Juvtefi24KSx0U0XJn1dsr1lfr9jcP2ZK",
    // "profil_img" => "sommeil-enfant-dormir.jpg"
    // ];



    if (empty($utilisateur)) { // si le tableau $utilisateur est vide
        echo "Utilisateur inconnu...";
        header("Location: ../connexion.php");
        
    } else { // sinon
        // on verifie le mot de passe
        // la fonction password_verify prend 2 param :
        // le premier corresppond a ce que le user a taper dans la formulaire
        // le deuxieme ce qui se trouve dans la base de donnees
        if (password_verify($password, $utilisateur['password'])) {
            //creer les variable de session
            // toutes superglobal en php est un tableau
            // creer les variable de session
            $_SESSION["id"] = $utilisateur['id'];
            $_SESSION["email"] = $utilisateur['email'];
            setcookie("id_user", $utilisateur['id'], time() +3600, '/', 'localhost', false, true);
            echo 'Cette adress email est correct'. $email;


            header("Location: ../index.php");
        } else {
            echo "mot de passe incorrect";
        }
    }
}
