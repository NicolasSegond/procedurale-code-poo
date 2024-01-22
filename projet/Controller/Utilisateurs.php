<?php 
require_once 'Model/UtilisateurModele.php';
$utilisateurModel = new UtilisateursModel();
$message = "";

if ($_GET['action']== "connexion"){
    //Traitement du formulaire de connexion
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomUtilisateur = $_POST['nomUtilisateur'];
        $motDePasse = $_POST['motDePasse'];
    
        // Appel de la fonction pour connecter l'utilisateur
        if ($utilisateurModel->connecterUtilisateur($nomUtilisateur, $motDePasse)) {
            // Connecté avec succès
            $message = "Connexion réussie. Bienvenue, $nomUtilisateur!";
            // Ici, vous pouvez rediriger vers une page sécurisée ou gérer la session
            header('Location: http://localhost/procedurale-code-poo/projet/index.php?action=home');
        } else {
            // Échec de la connexion
            $message = "Échec de la connexion. Veuillez vérifier vos identifiants.";
        }
    }
    include 'Vue/connexionVue.php';
}
if ($_GET['action']== 'inscription'){
    // Traitement du formulaire d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $motDePasse = $_POST['motDePasse'];

    // Appel de la fonction pour inscrire l'utilisateur
    $utilisateurModel->inscrireUtilisateur($nomUtilisateur, $motDePasse);
    $message = "Inscription réussie. <a href='connexion.php'>Connectez-vous ici</a>";
}
include 'Vue/inscriptionVue.php';
}





