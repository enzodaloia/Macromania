<?php
session_start();

// Détruire toutes les données de la session
session_unset();

// Détruire la session elle-même
session_destroy();

// Rediriger vers la page de connexion (ou toute autre page de votre choix)
header("Location: index.php");
exit;
?>