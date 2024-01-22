<?php
require_once 'database.php';

function ajouterArticle($titre, $contenu) {
    global $connexion;

    $titre = $connexion->real_escape_string($titre);
    $contenu = $connexion->real_escape_string($contenu);

    $query = "INSERT INTO articles (titre, contenu) VALUES ('$titre', '$contenu')";

    if ($connexion->query($query) === TRUE) {
        echo "Nouvel article ajouté avec succès";
    } else {
        echo "Erreur : " . $query . "<br>" . $connexion->error;
    }
}

function obtenirArticles() {
    global $connexion;

    $query = "SELECT * FROM articles";
    $resultat = $connexion->query($query);

    if ($resultat->num_rows > 0) {
        $articles = [];
        while($row = $resultat->fetch_assoc()) {
            $articles[] = $row;
        }
        return $articles;
    } else {
        return [];
    }
}

function supprimerArticle($id) {
    global $connexion;

    $query = "DELETE FROM articles WHERE id = $id";

    if ($connexion->query($query) === TRUE) {
        echo "Article supprimé avec succès";
    } else {
        echo "Erreur : " . $connexion->error;
    }
}