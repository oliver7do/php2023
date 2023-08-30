<?php
require_once "inc/database.php";
if(isset($_POST['submit'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    // etablir la connexion avec la bd
    $db = dbConnexion();
    // preparer la requete
    $request = $db->prepare("SELECT * FROM users WHERE email = ?");
    try{
        $request->execute(array($email));
        $userInfo = $request->fetch(PDO::FETCH_ASSOC);
        if(!empty($userInfo)){
            echo "utilisateur inconnue";
        }else{
            // verifier si le mot de passe est correct
            if(password_verify($password, $userInfo['password'])){
            if($userInfo['role'] == "admin" )
            }else{
                echo "Ahh tu fais malin";
            }
        }  
    }catch(PDOException $e){
        $e->getMessage();
    }
}