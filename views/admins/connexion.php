<?php
require_once __DIR__ . '/../../dao/connexion.php';

// Vérifier si une session est déjà active avant de démarrer une nouvelle
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Traitement de la connexion
if (isset($_POST['connect'])) {
    $emailOrUsername = $_POST['email'];
    $password = $_POST['password'];

    try {
        $pdo = getConnexion();
        if ($pdo) {
            $stmt = $pdo->prepare('SELECT * FROM admins WHERE email = ?');
            $stmt->execute([$emailOrUsername]);
            $adminData = $stmt->fetch();

            if (!$adminData) {
                $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = ?');
                $stmt->execute([$emailOrUsername]);
                $adminData = $stmt->fetch();
            }

            if ($adminData && password_verify($password, $adminData['password'])) {
                $_SESSION['id'] = $adminData['id'];
                $_SESSION['email'] = $adminData['email'];
                header('Location: ../../index.php?action=liste_admins');
                exit();
            } else {
                echo "<p style='color:red;'>Email ou mot de passe incorrect.</p>";
            }
        } else {
            echo "<p style='color:red;'>La connexion à la base de données a échoué.</p>";
        }
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Erreur de base de données : " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>

<h2>Connexion</h2>

<form method="POST" action="">
    <div class="form-group">
        <label for="email">Nom d'utilisateur ou Email :</label>
        <input type="text" name="email" id="email" placeholder="Entrez votre nom d'utilisateur ou email">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe">
    </div>
    <button type="submit" name="connect">Se connecter</button>
</form>