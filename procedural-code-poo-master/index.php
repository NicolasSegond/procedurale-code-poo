<?php
require_once 'articles.php';
require_once 'utilisateurs.php';

// Afficher tous les articles
$articles = obtenirArticles();

echo "<h1>Articles</h1>";
echo "<ul>";
foreach ($articles as $article) {
    echo "<li>";
    echo "<h2>" . htmlspecialchars($article['titre']) . "</h2>";
    echo "<p>" . htmlspecialchars($article['contenu']) . "</p>";
    echo "</li>";
}
echo "</ul>";

// Liens pour la gestion des utilisateurs
echo "<a href='inscription.php'>Inscription</a> | <a href='connexion.php'>Connexion</a>";
