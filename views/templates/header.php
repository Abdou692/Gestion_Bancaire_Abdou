<!DOCTYPE html>
<html>
<head>
    <title>Gestion Bancaire</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>
    <div class="header">
        <a href="index.php?action=listClient">Liste des clients</a>
        <a href="index.php?action=ajouter_client">Ajouter un client</a>
        <a href="index.php?action=listes_comptes">Listes des comptes</a>
        <a href="index.php?action=ajouter_compte">Ajouter un compte</a>
        <a href="index.php?action=liste_admin">Liste Admin</a>
        <a href="index.php?action=ajouter_admin">Ajouter un Admin</a>
        <span class="welcome">Bonjour admin</span>
        <a href="index.php?action=deconnexion" class="logout">Deconnexion</a>
    </div>
    <div class="container">
        <?php
        // Le contenu principal de la page sera inclus ici
        // par exemple, via une variable $content définie dans le contrôleur
        if (isset($content)) {
            include $content;
        }
        ?>
    </div>
</body>
</html>