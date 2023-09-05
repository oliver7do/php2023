<?php 
session_start();
// si $_SESSION ['role'] est definie mais que sa valeur est differente de "admin" ou encore que $_SESSION ['role'] n'est pas definie
if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location: http://localhost/php2023/HOTEL/login.php");

}
include_once "../inc/header.php"; ?>

<div class="d-flex container justify-content-around flex wrap">
    <div class="card m-2" style="width: 18rem;">
        <i class="fa-solid fa-plus text-center"></i>
        <div class="card-body">
            <h5 class="card-title">Ajouter hotel</h5>
            <p class="card-text">Cliquez ici pour ajouter un hotel.</p>
            <a href="add_hotel.php" class="btn btn-primary">Ajouter une hotel</a>
        </div>
    </div>

    <div class="card m-2" style="width: 18rem;">
        <i class="fa-solid fa-plus text-center"></i>
        <div class="card-body">
            <h5 class="card-title">Ajout Chambre</h5>
            <p class="card-text">Cliquez ici pour ajouter une chambre</p>
            <a href="add_room.php" class="btn btn-primary">Ajouter une chambre</a>
        </div>
    </div>

    <div class="card m-2" style="width: 18rem;">
        <i class="fa-solid fa-list-ul text-center"></i>
        <div class="card-body">
            <h5 class="card-title">List de Reservation</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

    <div class="card m-2" style="width: 18rem;">
        <i class="fa-solid fa-list-ul text-center"></i>
        <div class="card-body">
            <h5 class="card-title">List d'hotel</h5>
            <p class="card-text">Cliquez ici pour voir la list des hotel</p>
            <a href="hotel_list.php" class="btn btn-primary">Voir la list des hotel</a>
        </div>
    </div>

    <div class="card m-2" style="width: 18rem;">
        <i class="fa-solid fa-list-ul text-center"></i>
        <div class="card-body">
            <h5 class="card-title">List d'chambre</h5>
            <p class="card-text">Cliquez ici pour voir la list des chambre</p>
            <a href="room_list.php" class="btn btn-primary">Voir la list des chambre</a>
        </div>
    </div>
</div>



<?php include_once "../inc/footer.php"; ?>