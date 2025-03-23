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

    private function clientExiste($email, $telephone) {
        try {
            $pdo = getConnexion();
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM clients WHERE email = ? OR telephone = ?');
            $stmt->execute([$email, $telephone]);
            $count = $stmt->fetchColumn();
            return $count > 0;
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
            return true; // Considérer qu'un client existe pour éviter les doublons en cas d'erreur
        }
    }

    public function create() {
        if (isset($_POST['ajouter']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['adresse'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            $adresse = $_POST['adresse'];

            // Vérifier si le client existe déjà
            if ($this->clientExiste($email, $telephone)) {
                $error_message = "Erreur : Un client avec cet email ou ce téléphone existe déjà.";
                include __DIR__ . '/../views/clients/create.php';
                return;
            }

            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('INSERT INTO clients (nom, prenom, email, telephone, adresse) VALUES (?, ?, ?, ?, ?)');
                $stmt->execute([$nom, $prenom, $email, $telephone, $adresse]);

                header('Location: index.php?action=listes_clients');
                exit();
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }

        include __DIR__ . '/../views/clients/create.php';
    }

    public function edit() {
        if (isset($_GET['id']) && isset($_POST['modifier']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['adresse'])) {
            $id = $_GET['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            $adresse = $_POST['adresse'];

            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('UPDATE clients SET nom = ?, prenom = ?, email = ?, telephone = ?, adresse = ? WHERE id = ?');
                $stmt->execute([$nom, $prenom, $email, $telephone, $adresse, $id]);

                header('Location: index.php?action=listes_clients');
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
            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('DELETE FROM clients WHERE id = ?');
                $stmt->execute([$id]);

                header('Location: index.php?action=listes_clients');
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