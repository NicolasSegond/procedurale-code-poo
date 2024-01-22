<?php

class Database {
    private static $instance = null;
    private static $host;
    private static $username;
    private static $password;
    private static $database;
    private static $connection;

    private function __construct() {
        // Constructeur privé pour empêcher l'instanciation directe
        $this->connect();
    }

    public static function setConfig($host, $username, $password, $database) {
        self::$host = $host;
        self::$username = $username;
        self::$password = $password;
        self::$database = $database;
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function connect() {
        try {
            self::$connection = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$database, self::$username, self::$password);
            // Configurer PDO pour lever les exceptions en cas d'erreur
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion à la base de données réussie.";
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getConnection() {
        return self::$connection;
    }

    public function disconnect() {
        self::$connection = null;
        echo "Déconnexion de la base de données réussie.";
    }
}

// Configuration des informations de connexion
$databaseHost = "www.masterit-industries.eu";
$databaseUsername = "mathis";
$databasePassword = "coussette";
$databaseName = "CESI_Proc_POO";

Database::setConfig($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Utilisation de la classe sans instanciation explicite
$database = Database::getInstance();

// Vous pouvez maintenant utiliser $database partout dans votre application sans réinstancier.
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