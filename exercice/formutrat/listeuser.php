<?php
require_once 'database.php';
// etablir la connexion avec la base données
$db = dbConnexion();
// preparation de la requette
$request = $db->prepare("SELECT * FROM utilisateurs");
// executer la raquete
try{
    $request->execute();
    $user = $request->fetchAll(PDO::FETCH_ASSOC);
    // pour avoir uniquement un tableau associatif dans le fetchAll mette PDO::FETCH_AASOC
}catch(PDOException $e){
    $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>NOM</th>
                <th>Prenom</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <!-- afficher les informations des utilisateur dans tableau html -->
            <?php foreach($users as $u){ ?>
                <tr>
                    <td><?= $u['nom']; ?></td>
                    <td><?= $u['prenom']; ?></td>
                    <td><?= $u['email']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>