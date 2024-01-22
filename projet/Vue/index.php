<?php
echo "<h1>Articles</h1>";

if (!empty($articles)) {
    echo "<ul>";
    foreach ($articles as $article) {
        echo "<li>";
        echo "<h2>" . htmlspecialchars($article['titre']) . "</h2>";
        echo "<p>" . htmlspecialchars($article['contenu']) . "</p>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "Aucun article trouvé.";
}

// Liens pour la gestion des utilisateurs
echo "<a href='http://localhost/procedurale-code-poo/projet/index.php?action=inscription'>Inscription</a> | <a href='http://localhost/procedurale-code-poo/projet/index.php?action=connexion'>Connexion</a>";
?>
