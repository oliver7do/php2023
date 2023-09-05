<?php
session_start();
require_once "../inc/database.php";
if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // etablir la connexion avec la bd
    $db = dbConnexion();
    // preparer la requete
    $request = $db->prepare("SELECT * FROM user WHERE email = ?");
    try {
        $request->execute(array($email));
        $userInfo = $request->fetch(PDO::FETCH_ASSOC);
        if (empty($userInfo)) {
            echo "utilisateur inconnue";
        } else {
            // verifier si le mot de passe est correct
            if (password_verify($password, $userInfo['password'])) {
                // si l'utilisateur est un admin
                if ($userInfo['role'] == "admin") {
                    // definir la variable de session role
                    $_SESSION['role'] = $userInfo["role"];
                    header("Location: http://localhost/php2023/HOTEL/admin/admin.php");
                } else {
                    // definir la variable de session role
                    $_SESSION['role'] = $userInfo["role"];
                    header("Location: http://localhost/php2023/HOTEL/user_home.php");
                }
            } else {
                echo "Ahh tu fais malin";
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
