<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form action="process_inscription.php" method="post">
        <label for="nom_utilisateur">Nom d'utilisateur :</label>
        <input type="text" name="username" required><br><br>
        
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>