<?php

require_once 'database.php';

function inscrireUtilisateur($nomUtilisateur, $motDePasse)
{
    global $connexion;

    $nomUtilisateur = $connexion->real_escape_string($nomUtilisateur);
    $motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);

    $query = "INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe) VALUES ('$nomUtilisateur', '$motDePasseHash')";

    if ($connexion->query($query) === TRUE) {
        echo "Nouvel utilisateur inscrit avec succès";
    } else {
        echo "Erreur : " . $query . "<br>" . $connexion->error;
    }
}

function connecterUtilisateur($nomUtilisateur, $motDePasse)
{
    global $connexion;

    $nomUtilisateur = $connexion->real_escape_string($nomUtilisateur);

    $query = "SELECT mot_de_passe FROM utilisateurs WHERE nom_utilisateur = '$nomUtilisateur'";
    $resultat = $connexion->query($query);

    if ($resultat->num_rows == 1) {
        $utilisateur = $resultat->fetch_assoc();
        if (password_verify($motDePasse, $utilisateur['mot_de_passe'])) {
            echo "Connexion réussie";
            // Ici, gérer la logique de session ou les cookies selon les besoins
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Utilisateur non trouvé";
    }
}

function deconnecterUtilisateur()
{
    // Gérer la déconnexion
    echo "Utilisateur déconnecté";
    // Ici, détruire la session ou supprimer les cookies selon les besoins
}
