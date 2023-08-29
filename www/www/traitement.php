<?php
session_start();
require_once "database.php";
if (isset($_POST['valider'])) { // c'est pour l'inscription
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    $mdpCrypt = password_hash($mdp, PASSWORD_DEFAULT);

    $imgName = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    $destination = $_SERVER['DOCUMENT_ROOT'] . '/php2023/www/www/img/' . $imgName;
    move_uploaded_file($tmp, $destination);
    // se connecter a la db
    $conn = dbConnexion();
    // preparer la requete
    $request = $conn->prepare("INSERT INTO membres (email, pseudo, mdp, profil_img) VALUES (?, ?, ?, ?)");
    // executer la requete
    try {
        $request->execute(array($email, $pseudo, $mdpCrypt, $imgName));
        // redirection vers une page de notre choix
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// pour la connexion
if (isset($_POST['connexion'])) {
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    // etablir la connexion avec la bd
    $connect = dbConnexion();
    // preparer la requete
    $connexionRequest = $connect->prepare("SELECT * FROM membres WHERE pseudo = ?");
    // executer la requete
    $connexionRequest->execute(array($pseudo));
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
    } else { // sinon
        // on verifie le mot de passe
        // la fonction password_verify prend 2 param :
        // le premier corresppond a ce que le user a taper dans la formulaire
        // le deuxieme ce qui se trouve dans la base de donnees
        if (password_verify($mdp, $utilisateur['mdp'])) {
            //creer les variable de session
            // toutes superglobal en php est un tableau
            // creer les variable de session
            $_SESSION["id"] = $utilisateur['id_membre'];
            $_SESSION["pseudo"] = $utilisateur['pseudo'];
            $_SESSION["img"] = $utilisateur['profil_img'];


            setcookie("id_user", $utilisateur['id_membre'], time() +3600, '/', 'localhost', false, true);

            header("Location: accueil.php");
        } else {
            echo "mot de passe incorrect";
        }
    }
}
// Pour la pucation
if(isset($_POST['publier'])){
    $message = htmlspecialchars($_POST['message']);
    $image_name = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    $destination = $_SERVER['DOCUMENT_ROOT']. "/php2023/www/www/img/".$image_name;

    move_uploaded_file($tmp, $destination);

    //connexion a la bd
    $dbconnect = dbConnexion();
    // preparation de la requete
    $request = $dbconnect->prepare("INSERT INTO post (membre_id, photo, text) VALUES (?,?,?)");
    // execution de la requete
    // 
    try{
        $request->execute(array($_SESSION["id"], $image_name, $message));
        header("Location: accueil.php");
    }catch(PDOException $e){
        echo $e ->getMessage();
    }
}

if(isset($_GET['idpost'])){
    $dbconnect = dbConnexion(); //connexion a la bd
    // prepare la requete
    $request = $dbconnect->prepare("SELECT likes FROM posts WHERE id_post = ?");
    // executer la requete 
    $request->execute(array($_GET['idpost']));
    // on recuperer le resultat
    $likes = $request->fetch();

    // echo $likes['likes'];
    // requete pour
    $request1 = $dbconnect->prepare("UPDATE posts SET likes = ? WHERE id_post =?");
    // executer la requete
    $request1->execute(array($likes['likes']+1, $_GET['idpost']));
    header("Location: accueil.php");
}
