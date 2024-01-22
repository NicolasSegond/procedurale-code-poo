<?php
require_once 'utilisateurs.php';

$message = "";

// Traitement du formulaire d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $motDePasse = $_POST['motDePasse'];

    // Appel de la fonction pour inscrire l'utilisateur
    inscrireUtilisateur($nomUtilisateur, $motDePasse);
    $message = "Inscription réussie. <a href='connexion.php'>Connectez-vous ici</a>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>
<h2>Inscription</h2>
<p><?php echo $message; ?></p>
<form method="post" action="inscription.php">
    Nom d'utilisateur: <input type="text" name="nomUtilisateur" required><br>
    Mot de passe: <input type="password" name="motDePasse" required><br>
    <input type="submit" value="S'inscrire">
</form>
<p>Déjà inscrit? <a href='connexion.php'>Connectez-vous ici</a></p>
</body>
</html>
