<?php
require_once '../function.php';
include '../templates/default-layout.php';

// Initialisez un tableau vide pour le panier s'il n'existe pas déjà
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}
var_dump($_SESSION['panier']);
?>

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <!-- Le contenu du panier sera affiché ici -->
            <h1>Panier</h1>
            <ul>
                <?php foreach ($_SESSION['panier'] as $product) : ?>
                    <li>
                        <?php echo $product['title']; ?> - <?php echo $product['price']; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
