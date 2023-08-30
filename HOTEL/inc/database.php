<?php
function dbConnexion()
{
    $connexionDb = null; //variable qui doit stocker notre instance de connexion a la base de données
    try { // essayer de se connect a la base de données
        $connexionDb = new PDO("mysql:host=localhost;dbname=hotel_db", "root", ""); // on recupere l'objet de connexion a la base de données dans la variable $connexionDb
    } catch (PDOException $e) { //si la connexion echoue
        $connexionDb = $e; // on recuperer notre erreur dans $connexionDb
    }
    return $connexionDb; // retourne un objet de connexion ou une erreur

}
