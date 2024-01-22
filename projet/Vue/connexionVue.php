<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
<h2>Connexion</h2>
<p><?php echo $message; ?></p>
<form method="post" action="http://localhost/procedurale-code-poo/projet/index.php?action=connexion">
    Nom d'utilisateur: <input type="text" name="nomUtilisateur" required><br>
    Mot de passe: <input type="password" name="motDePasse" required><br>
    <input type="submit" value="Se connecter">
</form>
<p>Nouvel utilisateur? <a href='http://localhost/procedurale-code-poo/projet/index.php?action=inscription'>Inscrivez-vous ici</a></p>
</body>
</html>