<?php
session_start();
require_once '../function.php';

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifiez si le mot de passe répond aux exigences de complexité
    if (strlen($password) < 8) {
        header('Location: inscription.php?erreur=Le mot de passe doit contenir au moins 8 caractères.');
        exit;
    }

    if (!preg_match('/[A-Z]/', $password)) {
        header('Location: inscription.php?erreur=Le mot de passe doit contenir au moins une lettre majuscule.');
        exit;
    }

    if (!preg_match('/[a-z]/', $password)) {
        header('Location: inscription.php?erreur=Le mot de passe doit contenir au moins une lettre minuscule.');
        exit;
    }

    if (!preg_match('/[0-9]/', $password)) {
        header('Location: inscription.php?erreur=Le mot de passe doit contenir au moins un chiffre.');
        exit;
    }


    // Vérifiez si l'utilisateur existe déjà
    $sql = "SELECT id FROM user WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        header('Location: inscription.php?erreur=L\'utilisateur existe déjà. Veuillez choisir un autre nom d\'utilisateur.');
        exit;
    } else {
        // Insérez le nouvel utilisateur dans la base de données
        $mot_de_passe_hache = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $mot_de_passe_hache, PDO::PARAM_STR);
        if ($stmt->execute()) {
            header('Location: inscription_reussie.php');
            exit;
        } else {
            echo "Erreur lors de l'inscription.";
        }
    }
}
?>