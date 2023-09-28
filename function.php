<?php
try{
    $host = "localhost";
    $dbname = "macromania";
    $username = "root";
    $pass = "";

    $pdo = new PDO(
        "mysql:host=$host;port=8889;dbname=$dbname",
        $username,
        $pass
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "erreur : " . $e->getMessage();
}

$query = "SELECT * FROM product";
$requete = $pdo->prepare($query);
$requete->execute();
$products = $requete->fetchAll(PDO::FETCH_ASSOC);

function addProduct($title, $description, $platform, $image, $released_at, $price) {
    global $pdo; // Utilisez la connexion à la base de données existante



    try {
        // Préparez la requête SQL pour insérer un nouvel article
        $query = "INSERT INTO product (title, description, platform, image, released_at, price) VALUES (:title, :description, :platform, :image, :released_at, :price)";
        $requete = $pdo->prepare($query);

        // Liez les valeurs aux paramètres de la requête
        $requete->bindParam(':title', $title);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':platform', $platform);
        $requete->bindParam(':image', $image);
        $requete->bindParam(':released_at', $released_at);
        $requete->bindParam(':price', $price);

        // Exécutez la requête
        $requete->execute();

       return 1;
       
    } catch (PDOException $e) {
        // Gérez les erreurs en conséquence (par exemple, en journalisant l'erreur)
        die("Erreur lors de l'ajout de l'article : " . $e->getMessage());
    }
}

function supprimerProduit($idProduct) {
    global $pdo;
    try {
        // Étape 1 : Préparez la requête SQL pour supprimer le produit
        $sql = "DELETE FROM product WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $idProduct, PDO::PARAM_INT);

        // Étape 2 : Exécutez la requête
        if ($stmt->execute()) {
            // La suppression a réussi
            return true;
        } else {
            // La suppression a échoué
            return false;
        }
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}


?>