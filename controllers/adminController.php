<?php
require_once __DIR__ . '/../dao/connexion.php';
require_once __DIR__ . '/../models/admin.php';

class AdminController {
    public function connexionAdmin() {
        $errorMessage = '';

        // Débogage : afficher les données POST reçues
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        if (isset($_POST['connect']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $emailOrUsername = $_POST['email']; // Ne pas appliquer trim() ici
            $password = trim($_POST['password']);

            try {
                $pdo = getConnexion();
                if ($pdo) {
                    // Tentative 1 : recherche par email
                    $stmt = $pdo->prepare('SELECT * FROM admins WHERE email = ?');
                    $stmt->execute([$emailOrUsername]);
                    $adminData = $stmt->fetch();

                    // Tentative 2 : recherche par nom d'utilisateur si l'email n'a pas été trouvé
                    if (!$adminData) {
                        $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = ?');
                        $stmt->execute([$emailOrUsername]);
                        $adminData = $stmt->fetch();
                    }

                    echo "<pre>";
                    var_dump($password);
                    var_dump($adminData);
                    echo "</pre>";

                    if ($adminData && password_verify($password, $adminData['password'])) {
                        $_SESSION['id'] = $adminData['id'];
                        $_SESSION['email'] = $adminData['email'];
                        header('Location: index.php?action=listClient');
                        exit();
                    } else {
                        $errorMessage = 'Email ou mot de passe incorrect.';
                    }
                } else {
                    $errorMessage = 'Erreur de connexion à la base de données.';
                }
            } catch (PDOException $e) {
                $errorMessage = 'Erreur avec la base de données : ' . $e->getMessage();
            }
        } else if (isset($_POST['connect'])) {
            $errorMessage = "Veuillez remplir tous les champs.";
        }

        $content = __DIR__ . '/../views/admins/connexion.php';
        include __DIR__ . '/../views/layout.phtml';

        if (!empty($errorMessage)) {
            echo "<p style='color:red;'>$errorMessage</p>";
        }
    }

    public function createAdmin() {
        if (isset($_POST['add']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            try {
                $pdo = getConnexion();
                if ($pdo) {
                    $stmt = $pdo->prepare('INSERT INTO admins (username, email, password) VALUES (?, ?, ?)');
                    $stmt->execute([$username, $email, $password]);

                    header('Location: index.php?action=liste_admin');
                    exit();
                } else {
                    echo "Erreur de connexion à la base de données.";
                }
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        }

        $content = __DIR__ . '/../views/admins/create.php';
        include __DIR__ . '/../views/layout.phtml';
    }

    public function index() {
        try {
            $pdo = getConnexion();
            if ($pdo) {
                $stmt = $pdo->query('SELECT * FROM admins');
                $adminsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $admins = [];
                foreach ($adminsData as $adminData) {
                    $admin = new Admin($adminData['username'], $adminData['email'], $adminData['password']);
                    $admin->setId($adminData['id']);
                    $admins[] = $admin;
                }

                $content = __DIR__ . '/../views/admins/index.php';
                include __DIR__ . '/../views/layout.phtml';
            } else {
                echo "Erreur de connexion à la base de données.";
            }
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
        }
    }

    public function editAdmin() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            try {
                $pdo = getConnexion();
                if ($pdo) {
                    $stmt = $pdo->prepare('SELECT * FROM admins WHERE id = ?');
                    $stmt->execute([$id]);
                    $adminData = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($adminData) {
                        $admin = new Admin($adminData['username'], $adminData['email'], $adminData['password']);
                        $admin->setId($adminData['id']);

                        if (isset($_POST['update'])) {
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];

                            if (!empty($password)) {
                                $password = password_hash($password, PASSWORD_BCRYPT);
                                $stmt = $pdo->prepare('UPDATE admins SET username = ?, email = ?, password = ? WHERE id = ?');
                                $stmt->execute([$username, $email, $password, $id]);
                            } else {
                                $stmt = $pdo->prepare('UPDATE admins SET username = ?, email = ? WHERE id = ?');
                                $stmt->execute([$username, $email, $id]);
                            }

                            header('Location: index.php?action=liste_admin');
                            exit();
                        }

                        $content = __DIR__ . '/../views/admins/edit.php';
                        include __DIR__ . '/../views/layout.phtml';
                    } else {
                        echo "Administrateur non trouvé.";
                    }
                } else {
                    echo "Erreur de connexion à la base de données.";
                }
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        } else {
            echo "ID d'administrateur manquant.";
        }
    }

    public function deleteAdmin() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            try {
                $pdo = getConnexion();
                if ($pdo) {
                    $stmt = $pdo->prepare('DELETE FROM admins WHERE id = ?');
                    $stmt->execute([$id]);

                    header('Location: index.php?action=liste_admin');
                    exit();
                } else {
                    echo "Erreur de connexion à la base de données.";
                }
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        } else {
            echo "ID d'administrateur manquant.";
        }
    }

    public function deconnexionAdmin() {
        session_unset();
        session_destroy();
        header('Location: index.php?action=connexion_admin');
        exit();
    }
}
