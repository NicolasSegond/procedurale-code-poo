<?php

include_once("../Model/database.php");
include_once("../Model/ArticleModele.php");

// Création d'une instance de la classe ArticleModel
$articleModel = new ArticleModel();

// Récupération de tous les articles
$articles = $articleModel->getAllArticles();

// Affichage des articles
if (!empty($articles)) {
    echo "Liste des articles : ";
    print_r($articles);
} else {
    echo "Aucun article trouvé.";
}

?>
