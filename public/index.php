<?php
require_once '../function.php';
include '../templates/default-layout.php';

?>
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <?php 
            $count = 0;
            foreach ($products as $product) { 
                if ($count % 3 === 0) {
                    // Début d'une nouvelle ligne après chaque troisième produit
                    echo '</div><div class="row">';
                }
            ?>
            <div class="col-md-4 d-flex">
                <div class="card h-100 w-100">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo "<h2>" . htmlspecialchars($product['title']) . "</h2>"; ?></h5>
                        <p class="card-text"><?php echo "<p>" . htmlspecialchars($product['description']) . "</p>"; ?></p>
                        <a href="./article.php?id=<?= htmlspecialchars($product['id']) ?>" class="btn btn-primary">Voir plus</a>
                        <a href="./sup_articles.php?id=<?= htmlspecialchars($product['id']) ?>" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div>
            <?php 
                $count++;
            } 
            ?>
        </div>
    </div>
</div>