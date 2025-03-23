<?php include __DIR__ . '/../templates/header.php'; ?>

<h1>Détails du Compte</h1>

<p>RIB : <?php echo htmlspecialchars($compte['rib']); ?></p>
<p>Type de Compte : <?php echo htmlspecialchars($compte['typeCompte']); ?></p>
<p>Solde : <?php echo htmlspecialchars($compte['solde']); ?></p>
<p>ID Client : <?php echo htmlspecialchars($compte['idClient']); ?></p>
<p>Nom du Client : <?php echo htmlspecialchars($nomClient['nom']) . ' ' . htmlspecialchars($nomClient['prenom']); ?></p>

<?php include __DIR__ . '/../templates/footer.php'; ?>