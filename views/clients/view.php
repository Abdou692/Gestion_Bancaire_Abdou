<?php include __DIR__ . '/../templates/header.php'; ?>

<h1>Détails du Client</h1>

<p>Nom : <?php echo $client['nom']; ?></p>
<p>Prénom : <?php echo $client['prenom']; ?></p>
<p>Ville : <?php echo $client['adresse']; ?></p>

<?php include __DIR__ . '/../templates/footer.php'; ?>