<?php
include_once("database.php");

class ArticleModel
{
    private $connection;

    public function __construct()
    {
        // Obtenez l'instance unique de la classe Database
        $db = Database::getInstance();
        // Obtenez la connexion à la base de données
        $this->connection = $db->getConnection();
    }

    // Méthode pour obtenir tous les articles
    public function getAllArticles()
    {
        try {
            $selectQuery = "SELECT * FROM Article";
            $stmt = $this->connection->query($selectQuery);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rows;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return [];
        }
    }

    // Méthode pour obtenir un article par son ID
    public function getArticleById($id)
    {
        try {
            $selectQuery = "SELECT * FROM Article WHERE id = :id";
            $stmt = $this->connection->prepare($selectQuery);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return [];
        }
    }

    // Méthode pour ajouter un nouvel article
    public function addArticle($titre, $contenu)
    {
        try {
            $insertQuery = "INSERT INTO Article (titre, contenu) VALUES (:titre, :contenu)";
            $stmt = $this->connection->prepare($insertQuery);
            $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
            $stmt->bindParam(':contenu', $contenu, PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    // Méthode pour mettre à jour un article existant
    public function updateArticle($id, $titre, $contenu)
    {
        try {
            $updateQuery = "UPDATE Article SET titre = :titre, contenu = :contenu WHERE id = :id";
            $stmt = $this->connection->prepare($updateQuery);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
            $stmt->bindParam(':contenu', $contenu, PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    // Méthode pour supprimer un article
    public function deleteArticle($id)
    {
        try {
            $deleteQuery = "DELETE FROM Article WHERE id = :id";
            $stmt = $this->connection->prepare($deleteQuery);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }
}
?>
