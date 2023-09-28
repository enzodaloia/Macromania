<?php
require_once '../function.php';
include '../templates/default-layout.php';

if (isset($_GET['id'])) {
    $idProduitASupprimer = $_GET['id'];

    require_once '../function.php';

    $supprimerProduit = supprimerProduit($idProduitASupprimer);

    if ($idProduitASupprimer) {
        echo "produit supprimé avec succès. ID de l'article : " . $supprimerProduit;
    } else {
        echo "Erreur lors de la suppression de l'article.";
    }
}