<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action="process_login.php" method="post">
        <label for="nom_utilisateur">Nom d'utilisateur :</label>
        <input type="text" name="username" required><br><br>
        
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>