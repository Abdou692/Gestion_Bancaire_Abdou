<?php
require_once __DIR__ . '/../dao/connexion.php';

class AdminController {
    public function connexionAdmin() {
        $errorMessage = '';

        if (!empty($_POST['connect']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('SELECT * FROM admins WHERE email = ?');
                $stmt->execute([$email]);
                $adminData = $stmt->fetch();

                if ($adminData && password_verify($password, $adminData['password'])) {
                    $_SESSION['id'] = $adminData['id'];
                    $_SESSION['email'] = $adminData['email'];
                    header('Location: index.php?action=listClient');
                    exit();
                } else {
                    $errorMessage = 'Email ou mot de passe incorrect.';
                }
            } catch (PDOException $e) {
                $errorMessage = 'Erreur avec la base de données : ' . $e->getMessage();
            }
        }

        include __DIR__ . '/../views/layout_index.phtml';
        if (!empty($errorMessage)) {
            echo "<p style='color:red;'>$errorMessage</p>";
        }
    }

    public function createAdmin() {
        if (isset($_POST['add']) && isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            try {
                $pdo = getConnexion();
                $stmt = $pdo->prepare('INSERT INTO admins (email, password) VALUES (?, ?)');
                $stmt->execute([$email, $password]);

                header('Location: index.php?action=liste_admin');
                exit();
            } catch (PDOException $e) {
                // Gérer l'erreur de base de données (exemple)
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }
        include __DIR__ . '/../views/admins/create.php';
    }

    public function index() {
        try {
            $pdo = getConnexion();
            $stmt = $pdo->query('SELECT * FROM admins');
            $admins = $stmt->fetchAll();
            include __DIR__ . '/../views/admins/index.php';
        } catch (PDOException $e) {
            // Gérer l'erreur de base de données (exemple)
            echo "Erreur de base de données : " . $e->getMessage();
        }
    }

    public function deconnexionAdmin() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
