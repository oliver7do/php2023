<?php
require_once('./inc/header.php');
?>
<h2>Inscription</h2>
<?php
session_start();
if (isset($_SESSION['error'])) { ?>
    <div class="alert alert-danger" role="alert">
        <p><?= $_SESSION['error']; ?></p>
    </div>
<?php } ?>

<form action="./model/security.php" method="post" enctype="multipart/form-data">

    <input type="email" name="email" placeholder="Adresse e-mail" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>


    <input type="submit" value="Se connecter" name="connexion">
</form>
<?php
require_once('./inc/footer.php');
?>