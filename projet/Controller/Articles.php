<?php
require("Model/ArticleModele.php");

// Création d'une instance de la classe ArticleModel
$articleModel = new ArticleModel();

// Récupération de tous les articles
$articles = $articleModel->getAllArticles();

// Inclure la vue
require("Vue/index.php");
?>
