<?php
require_once '../function.php';
include '../templates/default-layout.php';

// Fonction pour ajouter un produit au panier
function ajouterAuPanier($idProduit, $quantite, $prix) {
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }

    if (isset($_SESSION['panier'][$idProduit])) {
        // Le produit existe déjà dans le panier, mettez à jour la quantité
        $_SESSION['panier'][$idProduit]['quantite'] += $quantite;
    } else {
        // Le produit n'est pas encore dans le panier, ajoutez-le
        $_SESSION['panier'][$idProduit] = array(
            'quantite' => $quantite,
            'prix' => $prix
        );
    }
}

// Fonction pour supprimer un produit du panier
function supprimerDuPanier($idProduit) {
    if (isset($_SESSION['panier'][$idProduit])) {
        unset($_SESSION['panier'][$idProduit]);
    }
}

// Fonction pour vider complètement le panier
function viderPanier() {
    $_SESSION['panier'] = array();
}

// Fonction pour obtenir le contenu actuel du panier
function contenuPanier() {
    return isset($_SESSION['panier']) ? $_SESSION['panier'] : array();
}

contenuPanier();
?>
