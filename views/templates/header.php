<!DOCTYPE html>
<html>
<head>
    <title>Gestion Bancaire</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <div class="menu-toggle">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <div class="menu">
                <a href="index.php?action=listClient">Liste des clients</a>
                <a href="index.php?action=ajouter_client">Ajouter un client</a>
                <a href="index.php?action=liste_admins">Liste des Admins</a>
                <a href="index.php?action=listes_comptes">Listes des comptes</a>
                <a href="index.php?action=ajouter_compte">Ajouter un compte</a>
                <a href="index.php?action=liste_contrats">Liste des contrats</a>
            </div>
        </div>
        <div class="header-right">
            <span class="welcome">Bonjour admin</span>
            <a href="index.php?action=deconnexion" class="logout">Deconnexion</a>
        </div>
    </div>
    <div class="container">
        <?php
        if (isset($content)) {
            include $content;
        }
        ?>
    </div>
</body>
</html>