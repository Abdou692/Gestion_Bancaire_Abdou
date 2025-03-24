<?php
require_once __DIR__ . '/../dao/connexion.php';
require_once __DIR__ . '/../models/contrat.php';

class ContratController {
    public function index() {
        try {
            $pdo = getConnexion();
            $stmt = $pdo->query('SELECT contrats.*, clients.nom, clients.prenom FROM contrats INNER JOIN clients ON contrats.idClient = clients.id ORDER BY contrats.id');
            $contrats = $stmt->fetchAll(PDO::FETCH_ASSOC);

            include __DIR__ . '/../views/contrats/index.php';
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
        }
    }

    public function create() {
        if (isset($_POST['ajouter']) && isset($_POST['typeContrat']) && isset($_POST['montantSouscrit']) && isset($_POST['duree']) && isset($_POST['idClient'])) {
            $typeContrat = $_POST['typeContrat'];
            $montantSouscrit = $_POST['montantSouscrit'];
            $duree = $_POST['duree'];
            $idClient = $_POST['idClient'];

            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('INSERT INTO contrats (typeContrat, montantSouscrit, duree, idClient) VALUES (?, ?, ?, ?)');
                $stmt->execute([$typeContrat, $montantSouscrit, $duree, $idClient]);

                header('Location: index.php?action=liste_contrats');
                exit();
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }

        try {
            $pdo = getConnexion();
            $stmt = $pdo->query('SELECT id, nom, prenom FROM clients');
            $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
            include __DIR__ . '/../views/contrats/create.php';
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
        }
    }

    public function edit() {
        if (isset($_GET['id']) && isset($_POST['modifier']) && isset($_POST['typeContrat']) && isset($_POST['montantSouscrit']) && isset($_POST['duree']) && isset($_POST['idClient'])) {
            $id = $_GET['id'];
            $typeContrat = $_POST['typeContrat'];
            $montantSouscrit = $_POST['montantSouscrit'];
            $duree = $_POST['duree'];
            $idClient = $_POST['idClient'];

            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('UPDATE contrats SET typeContrat = ?, montantSouscrit = ?, duree = ?, idClient = ? WHERE id = ?');
                $stmt->execute([$typeContrat, $montantSouscrit, $duree, $idClient, $id]);

                header('Location: index.php?action=liste_contrats');
                exit();
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('SELECT * FROM contrats WHERE id = ?');
                $stmt->execute([$id]);
                $contrat = $stmt->fetch(PDO::FETCH_ASSOC);

                $stmtClients = $pdo->query('SELECT id, nom, prenom FROM clients');
                $clients = $stmtClients->fetchAll(PDO::FETCH_ASSOC);

                include __DIR__ . '/../views/contrats/edit.php';
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
                $stmt = $pdo->prepare('DELETE FROM contrats WHERE id = ?');
                $stmt->execute([$id]);

                header('Location: index.php?action=liste_contrats');
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
                $stmt = $pdo->prepare('SELECT contrats.*, clients.nom, clients.prenom FROM contrats INNER JOIN clients ON contrats.idClient = clients.id WHERE contrats.id = ?');
                $stmt->execute([$id]);
                $contrat = $stmt->fetch(PDO::FETCH_ASSOC);

                include __DIR__ . '/../views/contrats/view.php';
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }
    }
}
?>