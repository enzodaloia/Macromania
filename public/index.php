<?php
require_once '../function.php';
include '../templates/default-layout.php';

// Vérifiez si le formulaire a été soumis et si l'ajout au panier a été déclenché
var_dump($_POST);
var_dump($_SERVER['REQUEST_METHOD']);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter-au-panier'])) {
    var_dump('coucou1');
    // Vérifiez si les données nécessaires sont présentes
    if (isset($_POST['title']) && isset($_POST['price'])) {
        var_dump('test');
        $nomProduit = $_POST['title'];
        $prixProduit = $_POST['price'];

        // Ajoutez le produit au tableau de session du panier
        $_SESSION['panier'][] = [
            'title' => $nomProduit,
            'price' => $prixProduit
        ];
    } else {
        // Gérer le cas où les données sont manquantes
        echo "Données de produit manquantes.";
    }
}
?>

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <?php foreach ($products as $product) :?>
            <div class="col-md-4 d-flex">
                <div class="card h-100 w-100">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo "<h2>" . $product['title'] . "</h2>"; ?></h5>
                        <p class="card-text"><?php echo "<p>" . $product['description'] . "</p>"; ?></p>
                        <a href="./article.php?id=<?= $product['id'] ?>" class="btn btn-primary">Voir plus</a>
                        <?php if (isset($_SESSION['username'])) : ?>
                            <a class="btn btn-danger" href="./sup_articles.php?id=<?= $product['id'] ?>">Supprimer</a>
                        <?php endif ?>
                        <!-- Utilisez des classes et des attributs de données pour le bouton -->
                        <form method="POST">
                            <input type="hidden" name="title" value="<?= $product['title'] ?>">
                            <input type="hidden" name="price" value="<?= $product['price'] ?>">
                            <button type="submit" name="ajouter-au-panier">Ajouter au panier</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- <script>
    function ajouterAuPanier(nom, prix) {
    var panier = document.getElementById('panier');

    // Créez un élément de carte pour le produit ajouté
    var produitCarte = document.createElement('div');
    produitCarte.classList.add('carte-produit'); // Ajoutez une classe pour le style CSS

    var nomProduit = document.createElement('h3');
    nomProduit.textContent = nom;

    var prixProduit = document.createElement('p');
    prixProduit.textContent = '$' + prix;

    // Ajoutez les éléments au composant de carte
    produitCarte.appendChild(nomProduit);
    produitCarte.appendChild(prixProduit);

    // Ajoutez le composant de carte au panier
    panier.appendChild(produitCarte);
}
// Code pour gérer les clics sur les boutons "Ajouter au panier"
var boutonsAjouterAuPanier = document.querySelectorAll('.ajouter-au-panier');

boutonsAjouterAuPanier.forEach(function(bouton) {
    bouton.addEventListener('click', function() {
        var idProduit = this.getAttribute('data-id-produit');
        var prix = parseFloat(this.getAttribute('data-prix'));
        var quantite = 1; // Vous pouvez ajuster la quantité selon vos besoins

        // Appeler la fonction pour ajouter le produit au panier
        ajouterAuPanier(idProduit, quantite, prix);

        // Afficher un message ou effectuer d'autres actions nécessaires
        alert('Produit ajouté au panier.');
    });
});
</script> -->
