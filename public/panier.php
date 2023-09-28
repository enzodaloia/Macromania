<?php
require_once '../function.php';
include '../templates/default-layout.php';

// Initialisez un tableau vide pour le panier s'il n'existe pas déjà
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}
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
                        <form method="POST" action="retirer-du-panier.php">
                            <input type="hidden" name="index" value="<?php echo $index; ?>">
                            <button type="submit" name="retirer-du-panier">Supprimer</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
