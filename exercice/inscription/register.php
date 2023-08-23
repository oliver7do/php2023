<?php
// Votre logique de connexion à la base de données
require_once "database.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // traitement de l'image
    // echo "<pre>";
    // print_r($_FILES);
    // echo "<pre>";
    $imgName = $_FILES['profile_image']['name'];
    $tmpName = $_FILES['profile_image']['tmp_name'];
    $destination = $_SERVER['DOCUMENT_ROOT'].'/php2023/exercice/inscription/img/'.$imgName;
    move_uploaded_file($tmpName, $destination);

    // etablir la connexion avec la base de donnees
    $dbConnexion = dbConnexion();
    // preparer la requete qui permettra d'enregistrer les donnees dans la table
    $request = $dbConnexion->prepare("INSERT INTO membres (pseudo, email, mdp, profil_img) VALUES (?, ?, ?, ?)");
    // executer la requete
    try{
        $request->execute(array($username,$email, $hashed_password, $imgName));
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    // Vérification des doublons d'adresse e-mail et de nom d'utilisateur
    
    // Insertion des données dans la base de données
}
?>