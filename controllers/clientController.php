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
        if (isset($_POST['ajouter']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['telephone'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];

            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('INSERT INTO clients (nom, prenom, adresse, telephone) VALUES (?, ?, ?, ?)');
                $stmt->execute([$nom, $prenom, $adresse, $telephone]);

                header('Location: index.php?action=listes_clients');
                exit();
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }

        include __DIR__ . '/../views/clients/create.php';
    }

    public function edit() {
        if (isset($_GET['id']) && isset($_POST['modifier']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['telephone'])) {
            $id = $_GET['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];

            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('UPDATE clients SET nom = ?, prenom = ?, adresse = ?, telephone = ? WHERE id = ?');
                $stmt->execute([$nom, $prenom, $adresse, $telephone, $id]);

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