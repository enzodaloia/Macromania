<?php
session_start();

if (!isset($_SESSION['nom_utilisateur'])) {
    header('Location: index.php');
    exit;
}

echo "Bienvenue, " . $_SESSION['username'];
?>