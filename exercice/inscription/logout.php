<?php
session_start();

// Détruire la session et rediriger vers la page d'accueil
session_destroy();
header("Location: index.html");
exit;
?>
