<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['retirer-du-panier'])) {
    // Vérifiez si l'indice à supprimer a été envoyé
    if (isset($_POST['index'])) {
        $index = $_POST['index'];

        // Supprimez l'élément correspondant de la session du panier
        if (isset($_SESSION['panier'][$index])) {
            unset($_SESSION['panier'][$index]);
        }
    }
}

// Redirigez l'utilisateur vers la page du panier après la suppression
header("Location: panier.php");
exit();
?>