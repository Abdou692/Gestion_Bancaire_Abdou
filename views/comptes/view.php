<?php include __DIR__ . '/../templates/header.php'; ?>

<h1>Détails du Compte</h1>

<p>RIB : <?php echo $compte['rib']; ?></p>
<p>Type de Compte : <?php echo $compte['typeCompte']; ?></p>
<p>Solde : <?php echo $compte['solde']; ?></p>
<p>ID Client : <?php echo $compte['idClient']; ?></p>

<?php include __DIR__ . '/../templates/footer.php'; ?>