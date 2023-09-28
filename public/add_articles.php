<?php
require_once '../function.php';
include '../templates/default-layout.php';

if (isset($_POST['title'])) {
    $id = htmlspecialchars(trim($_POST['id']));
    $title = htmlspecialchars(trim($_POST['title']));
    $description = htmlspecialchars(trim($_POST['description']));
    $platform = htmlspecialchars(trim($_POST['platform']));
    $image = htmlspecialchars(trim($_POST['image']));
    $released_at = date('Y-m-d H:i:s');
    $price = htmlspecialchars(trim($_POST['price']));

    require_once '../function.php';

    $addProduct = addProduct($title, $description, $platform, $image, $released_at, $price);

    if ($addProduct) {
        echo "Article ajouté avec succès. ID de l'article : " . $addProduct;
    } else {
        echo "Erreur lors de l'ajout de l'article.";
    }
}

?>
<div class="container">
    <div class="col-md-12">
        <div class="row mt-5">
            <form method="POST">
            <center><div class="mb-3">
                <label for="exampleInputtitre" class="form-label">Titre</label>
                <input type="text" name='title' placeholder="Entrez le titre du produit">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <textarea name="description" placeholder="Entrez le contenu du produit"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Plateforme</label>
                <input type="text" name='platform' placeholder="Entrez la plateforme du produit">
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="text" name='image' placeholder="Entrez l'image du produit">
            </div>
            <div class="mb-3">
                <label class="form-label">Prix</label>
                <input type="text" name="price" placeholder="Entrez le prix du produit">
            </div>
            <input type="submit" name="submit" class="btn btn-primary"></center>
            </form>
            </div>
    </div>
</div>