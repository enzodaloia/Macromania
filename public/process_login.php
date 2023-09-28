<?php
session_start();
require_once '../function.php';

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Recherchez l'utilisateur dans la base de données
    $sql = "SELECT * FROM user WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($password, $row['password'])) {
        // L'authentification est réussie
        $_SESSION['username'] = $row['username'];
        header('Location: tableau_de_bord.php');
        exit;
    } else {
        // L'authentification a échoué
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>