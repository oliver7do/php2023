<?php require_once $_SERVER["DOCUMENT_ROOT"]. "/php2023/HOTEL/inc/database.php";
// se connecter a la db (data base) ou bd (base de donnees)

function hotelList()
{
    // se connecter a la db 
    $db = dbConnexion();
    // preparer la requete
    $request = $db->prepare("SELECT * FROM hotels");
    // executer la requete
    try {
        $request->execute();
        // recuperer le resultat dans un tableau
        return $listHotel = $request->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function roomList()
{
    // se connecter a la db 
    $db = dbConnexion();
    // preparer la requete
    $request = $db->prepare("SELECT * FROM rooms");
    // executer la requete
    try {
        $request->execute();
        // recuperer le resultat dans un tableau
        return $listRoom = $request->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}