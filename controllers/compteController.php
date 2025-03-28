<?php
require_once __DIR__ . '/../dao/connexion.php';
require_once __DIR__ . '/../models/compte.php';

class CompteController {
    public function index() {
        try {
            $pdo = getConnexion();
            $stmt = $pdo->query('SELECT comptes.*, clients.nom, clients.prenom FROM comptes INNER JOIN clients ON comptes.idClient = clients.id ORDER BY clients.id');
            $comptes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Regrouper les comptes par client
            $comptesParClient = [];
            foreach ($comptes as $compte) {
                $clientId = $compte['idClient'];
                if (!isset($comptesParClient[$clientId])) {
                    $comptesParClient[$clientId] = [
                        'nomClient' => $compte['nom'] . ' ' . $compte['prenom'],
                        'comptes' => []
                    ];
                }
                $comptesParClient[$clientId]['comptes'][] = $compte;
            }

            include __DIR__ . '/../views/comptes/index.php';
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
        }
    }

    private function compteExiste($idClient, $typeCompte) {
        try {
            $pdo = getConnexion();
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM comptes WHERE idClient = ? AND typeCompte = ?');
            $stmt->execute([$idClient, $typeCompte]);
            $count = $stmt->fetchColumn();
            return $count > 0;
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
            return true; // Considérer qu'un compte existe pour éviter les doublons en cas d'erreur
        }
    }

    public function create() {
        if (isset($_POST['ajouter']) && isset($_POST['rib']) && isset($_POST['typeCompte']) && isset($_POST['solde']) && isset($_POST['idClient'])) {
            $rib = $_POST['rib'];
            $typeCompte = $_POST['typeCompte'];
            $solde = $_POST['solde'];
            $idClient = $_POST['idClient'];

            // Vérifier si le client a déjà un compte du même type
            if ($this->compteExiste($idClient, $typeCompte)) {
                $error_message = "Erreur : Ce client a déjà un compte " . $typeCompte . "."; // Définir le message d'erreur
                try {
                    $pdo = getConnexion();
                    $stmt = $pdo->query('SELECT id, nom, prenom FROM clients');
                    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    include __DIR__ . '/../views/comptes/create.php';
                } catch (PDOException $e) {
                    echo "Erreur de base de données : " . $e->getMessage();
                }
                return;
            }

            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('INSERT INTO comptes (rib, typeCompte, solde, idClient) VALUES (?, ?, ?, ?)');
                $stmt->execute([$rib, $typeCompte, $solde, $idClient]);

                header('Location: index.php?action=listes_comptes');
                exit();
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }

        try {
            $pdo = getConnexion();
            $stmt = $pdo->query('SELECT id, nom, prenom FROM clients');
            $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
            include __DIR__ . '/../views/comptes/create.php';
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
        }
    }

    public function edit() {
        if (isset($_GET['id']) && isset($_POST['modifier']) && isset($_POST['rib']) && isset($_POST['typeCompte']) && isset($_POST['solde']) && isset($_POST['idClient'])) {
            $id = $_GET['id'];
            $rib = $_POST['rib'];
            $typeCompte = $_POST['typeCompte'];
            $solde = $_POST['solde'];
            $idClient = $_POST['idClient'];

            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('UPDATE comptes SET rib = ?, typeCompte = ?, solde = ?, idClient = ? WHERE id = ?');
                $stmt->execute([$rib, $typeCompte, $solde, $idClient, $id]);

                header('Location: index.php?action=listes_comptes');
                exit();
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('SELECT * FROM comptes WHERE id = ?');
                $stmt->execute([$id]);
                $compte = $stmt->fetch(PDO::FETCH_ASSOC);

                // Récupérer la liste des clients
                $stmtClients = $pdo->query('SELECT id, nom, prenom FROM clients');
                $clients = $stmtClients->fetchAll(PDO::FETCH_ASSOC);

                include __DIR__ . '/../views/comptes/edit.php';
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('DELETE FROM comptes WHERE id = ?');
                $stmt->execute([$id]);

                header('Location: index.php?action=listes_comptes');
                exit();
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }
    }

    public function view() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('SELECT * FROM comptes WHERE id = ?');
                $stmt->execute([$id]);
                $compte = $stmt->fetch(PDO::FETCH_ASSOC);

                // Récupérer le nom et prénom du client
                $stmtClient = $pdo->prepare('SELECT nom, prenom FROM clients WHERE id = ?');
                $stmtClient->execute([$compte['idClient']]);
                $nomClient = $stmtClient->fetch(PDO::FETCH_ASSOC);

                include __DIR__ . '/../views/comptes/view.php';
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }
    }

    public function dashboard() {
        try {
            $pdo = getConnexion();

            // Nombre total de clients
            $stmtClients = $pdo->query('SELECT COUNT(*) FROM clients');
            $nombreClients = $stmtClients->fetchColumn();

            // Nombre total de comptes
            $stmtComptes = $pdo->query('SELECT COUNT(*) FROM comptes');
            $nombreComptes = $stmtComptes->fetchColumn();

            // Nombre total de contrats
            $stmtContrats = $pdo->query('SELECT COUNT(*) FROM contrats');
            $nombreContrats = $stmtContrats->fetchColumn();

            include __DIR__ . '/../views/dashboard.php';
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
        }
    }
}
?>