<?php include __DIR__ . '/templates/header.php'; ?>

<h1>Tableau de Bord</h1>

<div style="display: flex; justify-content: space-around;">
    <div>
        <h2>Clients</h2>
        <p>Nombre total : <?php echo $nombreClients; ?></p>
        <a href="index.php?action=listes_clients">Voir les clients</a>
    </div>

    <div>
        <h2>Comptes</h2>
        <p>Nombre total : <?php echo $nombreComptes; ?></p>
        <a href="index.php?action=listes_comptes">Voir les comptes</a>
    </div>

    <div>
        <h2>Contrats</h2>
        <p>Nombre total : <?php echo $nombreContrats; ?></p>
        <a href="index.php?action=liste_contrats">Voir les contrats</a>
    </div>
</div>

<?php include __DIR__ . '/templates/footer.php'; ?>