<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>
<h2>Inscription</h2>
<p><?php echo $message; ?></p>
<form method="post" action="http://localhost/procedurale-code-poo/projet/index.php?action=inscription">
    Nom d'utilisateur: <input type="text" name="nomUtilisateur" required><br>
    Mot de passe: <input type="password" name="motDePasse" required><br>
    <input type="submit" value="S'inscrire">
</form>
<p>Déjà inscrit? <a href='http://localhost/procedurale-code-poo/projet/index.php?action=connexion'>Connectez-vous ici</a></p>
</body>
</html>