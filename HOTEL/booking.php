<?php

session_start();

include_once "inc/header.php"

?>

<div class="container">

    <form action="model/db_booking.php" method="post">

        <input type="text" name="id_room" value="<?= $_GET['room'] ?>" hidden>

        <input type="text" name="price" value="<?= $_GET['price'] ?>" hidden>



        <div class="form-group">

            <label for="email">Start Date</label>

            <input type="date" class="form-control" id="email" name="start_date">

        </div>



        <div class="form-group">

            <label for="password">End Date</label>

            <input type="date" class="form-control" id="password" name="end_date">

        </div>

        <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="book" value="submit">Book</button>

    </form>

</div>

<?php include_once "inc/footer.php";
