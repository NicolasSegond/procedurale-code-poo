<?php
require_once 'utilisateurs.php';

$message = "";

// Traitement du formulaire de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $motDePasse = $_POST['motDePasse'];

    // Appel de la fonction pour connecter l'utilisateur
    if (connecterUtilisateur($nomUtilisateur, $motDePasse)) {
        // Connecté avec succès
        $message = "Connexion réussie. Bienvenue, $nomUtilisateur!";
        // Ici, vous pouvez rediriger vers une page sécurisée ou gérer la session
    } else {
        // Échec de la connexion
        $message = "Échec de la connexion. Veuillez vérifier vos identifiants.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
<h2>Connexion</h2>
<p><?php echo $message; ?></p>
<form method="post" action="connexion.php">
    Nom d'utilisateur: <input type="text" name="nomUtilisateur" required><br>
    Mot de passe: <input type="password" name="motDePasse" required><br>
    <input type="submit" value="Se connecter">
</form>
<p>Nouvel utilisateur? <a href='inscription.php'>Inscrivez-vous ici</a></p>
</body>
</html>
