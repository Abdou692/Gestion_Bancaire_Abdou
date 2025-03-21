<?php
require_once __DIR__ . '/../dao/connexion.php';

class ClientController {
    public function index() {
        try {
            $pdo = getConnexion();
            $stmt = $pdo->query('SELECT * FROM clients');
            $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
            include __DIR__ . '/../views/clients/index.php';
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
        }
    }

    public function create() {
        if (isset($_POST['ajouter']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];

            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('INSERT INTO clients (nom, prenom, adresse) VALUES (?, ?, ?)');
                $stmt->execute([$nom, $prenom, $adresse]);

                header('Location: index.php?action=listClient');
                exit();
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }
        include __DIR__ . '/../views/clients/create.php';
    }

    public function edit() {
        if (isset($_GET['id']) && isset($_POST['modifier']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse'])) {
            $id = $_GET['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];

            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('UPDATE clients SET nom = ?, prenom = ?, adresse = ? WHERE id = ?');
                $stmt->execute([$nom, $prenom, $adresse, $id]);

                header('Location: index.php?action=listClient');
                exit();
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('SELECT * FROM clients WHERE id = ?');
                $stmt->execute([$id]);
                $client = $stmt->fetch(PDO::FETCH_ASSOC);
                include __DIR__ . '/../views/clients/edit.php';
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $pdo = getConnexion();

            try {
                // Supprimer les comptes associés
                $stmtComptes = $pdo->prepare('DELETE FROM comptes WHERE idClient = ?');
                $stmtComptes->execute([$id]);

                // Supprimer le client
                $stmtClient = $pdo->prepare('DELETE FROM clients WHERE id = ?');
                $stmtClient->execute([$id]);

                header('Location: index.php?action=listClient');
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
                $stmt = $pdo->prepare('SELECT * FROM clients WHERE id = ?');
                $stmt->execute([$id]);
                $client = $stmt->fetch(PDO::FETCH_ASSOC);
                include __DIR__ . '/../views/clients/view.php';
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }
    }
}
?>