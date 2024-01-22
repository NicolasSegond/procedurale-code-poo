<?php

class Database {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
    }

    private function connect() {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
            // Configurer PDO pour lever les exceptions en cas d'erreur
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion à la base de données réussie.";
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function disconnect() {
        $this->connection = null;
        echo "Déconnexion de la base de données réussie.";
    }
}

// Utilisation de la classe
$databaseHost = "www.masterit-industries.eu";
$databaseUsername = "mathis";
$databasePassword = "coussette";
$databaseName = "CESI_Proc_POO";

$database = new Database($databaseHost, $databaseUsername, $databasePassword, $databaseName);

/*
try {
    // Sélection de données avec SELECT
    $selectQuery = "SELECT * FROM votre_table";
    $stmt = $database->getConnection()->query($selectQuery);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "Résultats de la requête SELECT : ";
    print_r($rows);

    // Insertion de données avec INSERT 
    $insertQuery = "INSERT INTO votre_table (colonne1, colonne2) VALUES ('valeur1', 'valeur2')";
    $database->getConnection()->exec($insertQuery);
    echo "Nouvelle ligne insérée avec succès.";

    // Mise à jour de données avec UPDATE
    $updateQuery = "UPDATE votre_table SET colonne1 = 'nouvelle_valeur' WHERE condition = 'valeur_condition'";
    $affectedRows = $database->getConnection()->exec($updateQuery);
    echo "Nombre de lignes mises à jour : " . $affectedRows;

    // Suppression de données avec DELETE
    $deleteQuery = "DELETE FROM votre_table WHERE condition = 'valeur_condition'";
    $affectedRows = $database->getConnection()->exec($deleteQuery);
    echo "Nombre de lignes supprimées : " . $affectedRows;
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
} finally {
    // N'oubliez pas de déconnecter la base de données lorsque vous avez terminé
    $database->disconnect();
}
*/
?>