<?php

/**
 * Établit une connexion PDO à la base de données.
 *
 * @return PDO|null Retourne un objet PDO en cas de succès, null en cas d'échec.
 */
function getConnexion() {
    // --- Configuration de la base de données ---
    $host     = 'localhost';
    $dbname   = 'gestion_bancaire'; // Remplacez par le nom de votre base de données
    $username = 'root';
    $password = '';
    $charset  = 'utf8mb4';

    // Construction du DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    // Options pour PDO : 
    // - Lancer des exceptions en cas d'erreur
    // - Récupérer les résultats sous forme de tableaux associatifs
    // - Désactiver l'émulation des requêtes préparées pour la sécurité
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false, // Important pour la sécurité
    ];

    try {
        // Création de la connexion PDO
        $pdo = new PDO($dsn, $username, $password, $options);

        // Définir l'encodage des caractères pour la connexion
        $pdo->exec("SET NAMES 'utf8mb4'");

        return $pdo; // Retourner l'objet PDO si la connexion réussit
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, on affiche un message et on arrête le script
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}
?>