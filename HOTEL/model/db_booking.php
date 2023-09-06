<?php
session_start();
// objectif de cefichier: voir si la chambre réservée est dispo a notre date ou nn est ce qu'elle est réservée avant ou nn
require_once $_SERVER["DOCUMENT_ROOT"] . "/php2023/HOTEL/inc/database.php";
if (isset($_POST['book'])) {
    // recuperer les infos
    $idRoom = htmlspecialchars($_POST['id_room']);
    $startDate = htmlspecialchars($_POST['start_date']);
    $endDate = htmlspecialchars($_POST['end_date']);
    $price = htmlspecialchars($_POST['price']);

    // conversion en date

    $dateStart = strtotime($startDate);
    $dateEnd = strtotime($endDate);

    $duration = $dateEnd - $dateStart;
    //echo $duration
    $nbDays = $duration / 86400;
    // echo "le nombre de jours est : $nbDays";

    $today = date("Ymd"); // la date d'aujourd'hui
    // echo $today;

    // si $today est superieur a la date de debut de reservation ou $today est superieur a la date de fin de reservation

    if (strtotime($today) > strtotime($startDate) || strtotime($today) > strtotime($endDate)) {
        echo '<script> alert("votre date de debut ou de fin de reservation ne peut pas etre inferieur a la date d aujourd hui")</script>';
        header("Location: http://localhost/php2023/HOTEL/booking.php?room=$idRoom&price=$price");
    } else {
        // se connecter a la base de donnes
        $db = dbConnexion();
        //preparer la reqyete pour verifier si la chambre est dispo entre la date de depart et la date de fin
        $request = $db->prepare("SELECT * FROM bookings WHERE room_id = ? AND ((booking_start_date <= ? AND booking_end_date >= ?) OR (booking_start_date <= ? AND booking_end_date >= ?))");
        //executer la requete

        try {
            $request->execute(array($idRoom, $startDate, $startDate, $endDate, $endDate));
            // recuperer le resultat
            $books = $request->fetch();
            if (empty($books)) {
                if ($dateStart < $dateEnd) {
                    // preparer la requete pour reserver la chambre
                    $request = $db->prepare("INSERT INTO `bookings`( `booking_start_date`, `booking_end_date`, `user_id`, `room_id`, `booking_price`, `booking_state`) VALUES (?,?,?,?,?,?)");
                    // executer la requete
                    try {
                        $request->execute(array($startDate, $endDate, $_SESSION['id_user'], $idRoom, $price * $nbDays, "in progress"));
                        // rediriger vers user_home.php
                        header("Location: http://localhost/php2023/HOTEL/user_php.php");
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                }
            } else {
                echo "this room is unavailable for these dates";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

        if(isset($_GET['id_book'])){
        // se connecter a la base de donnes
        $db = dbConnexion();
        // prerparer la requete pour annuler la reservation
        $request=$db->prepare("UPDATE bookings SET booking_state =? WHERE id_booking=?");
        //executer la requete
        try{
            $request->execute(array("cancel",$_GET['id_book']));
            //redirection vers uuser_home.php
            header("Location: http://localhost/HOTEL/user_home.php");
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
}
