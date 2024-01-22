<?php
require_once "database.php";

class UtilisateursModel{
    private $connection;

    // Construct
    public function __construct() {
        // Obtenez l'instance unique de la classe Database
        $db = Database::getInstance();
        // Obtenez la connexion à la base de données
        $this->connection = $db->getConnection();
    }

    function inscrireUtilisateur($nomUtilisateur, $motDePasse)
    {
        // Utilisation de la méthode prepare pour créer une requête préparée
        $query = "INSERT INTO Utilisateur (nom_utilisateur, mot_de_passe) VALUES (:nom_utilisateur, :mot_de_passe)";
        $stmt = $this->connection->prepare($query);
    
        // Liage des paramètres
        $stmt->bindParam(':nom_utilisateur', $nomUtilisateur);
        $stmt->bindParam(':mot_de_passe', password_hash($motDePasse, PASSWORD_DEFAULT));
    
        // Exécution de la requête préparée
        if ($stmt->execute()) {
            echo "Nouvel utilisateur inscrit avec succès";
        } else {
            echo "Erreur : " . $query . "<br>" . $stmt->errorInfo()[2];
        }
    }
    

function connecterUtilisateur($nomUtilisateur, $motDePasse)
{

$nomUtilisateur = $nomUtilisateur;

$query = "SELECT mot_de_passe FROM Utilisateur WHERE nom_utilisateur = '$nomUtilisateur'";
$resultat = $this->connection->query($query);
if ($resultat->rowCount() == 1) {
    
    $utilisateur = $resultat->fetch(PDO::FETCH_ASSOC);
    if (password_verify($motDePasse, $utilisateur['mot_de_passe'])) {
        echo "Connexion réussie";
        // Ici, gérer la logique de session ou les cookies selon les besoins
        return true;
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

}
