<?php
require_once __DIR__ . '/../dao/connexion.php';

class CompteController {
    public function index() {
        try {
            $pdo = getConnexion();
            $stmt = $pdo->query('SELECT comptes.*, clients.nom, clients.prenom FROM comptes INNER JOIN clients ON comptes.idClient = clients.id');
            $comptes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            include __DIR__ . '/../views/comptes/index.php';
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
        }
    }

    public function create() {
        if (isset($_POST['ajouter']) && isset($_POST['rib']) && isset($_POST['typeCompte']) && isset($_POST['solde']) && isset($_POST['idClient'])) {
            $rib = $_POST['rib'];
            $typeCompte = $_POST['typeCompte'];
            $solde = $_POST['solde'];
            $idClient = $_POST['idClient'];

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
                include __DIR__ . '/../views/comptes/view.php';
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }
    }
}
