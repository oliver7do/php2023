<?php 
require_once('../inc/db_connection.php');
require_once('../inc/function.php');

if(isset($_POST["valider"])){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $message = $_POST['message'];
    $civility = $_POST['civility'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $country = $_POST['country'];
    $conditions = $_POST['conditions'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
   

}
$db=dbConnexion();
$dbrequest=$db->prepare("INSERT INTO user(civility, firstname, lastname, email, password, country, phone, birthday, message, conditions) VALUES (?,?,?,?,?,?,?,?,?,?)");

try {
    $dbrequest->execute(array($civility, $firstname, $lastname, $email, $passwordHash, $country, $phone, $birthday, $message, $conditions));
    //code...
} catch (PDOException $e) {
    //throw $th;
    echo $e->getMessage();

}

    // Ici, vous pouvez effectuer des validations et sécuriser les données

    // Enregistrement dans la base de données (exemple)
    // $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
    // ... exécution de la requête ...

//     debug($_POST); // Utilisation de la fonction de débogage
// }
?>