<?php 
include_once 'database.php';
if(isset($_POST['envoi'])) {
    //recuperation des donnes saisies par l'utilisateur
    $nom = htmlspecialchars ($_POST['nom']);
    $prenom = htmlspecialchars ($_POST['prenom']);
    $email = htmlspecialchars ($_POST['email']);
    $mdp = htmlspecialchars ($_POST['mdp']);
    // crypter le mot de passe hasher
    $mdpCrypt = password_hash($mdp, PASSWORD_DEFAULT);
    // il faut se connecter a la base de données
    $db = dbConnexion (); //permet d'etablir la connexion avec la bd
    // preparation de la requete
    $request = $db->prepare("INSERT INTO utilisateurs (nom, prenom, email, mdp) VALUES (?, ?, ?, ?)");
    // execution de la requete
    try{
        $request->execute(array($nom, $prenom, $email, $mdpCrypt));
    }catch (PDOexception $e) {
        echo $e->getMessage(); // afficher l'erreur sql genere
    }


}