<?php
require_once '../function.php';
include '../templates/default-layout.php';

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Étape 2 : Recherchez l'article correspondant dans la base de données
    $sql = "SELECT * FROM product WHERE id = :productId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
    $stmt->execute();

    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        // Étape 3 : Affichez les détails de l'article
        echo "<h1>" . htmlspecialchars($product['title']) . "</h1>";
        echo "<p>" . htmlspecialchars($product['description']) . "</p>";
        echo "<p>" . htmlspecialchars($product['platform']) . "</p>";
        echo "<p>" . htmlspecialchars($product['price']) . "</p>";
        // Affichez d'autres détails de l'article
    } else {
        echo "L'article n'a pas été trouvé.";
    }
} else {
    echo "ID d'article non spécifié dans l'URL.";
}

?>