<?php include __DIR__ . '/../templates/header.php'; ?>

<h1>Détails du Client</h1>

<p>ID : <?php echo htmlspecialchars($client['id']); ?></p>
<p>Nom : <?php echo htmlspecialchars($client['nom']); ?></p>
<p>Prénom : <?php echo htmlspecialchars($client['prenom']); ?></p>
<p>Email : <?php echo htmlspecialchars($client['email']); ?></p>
<p>Téléphone : <?php echo htmlspecialchars($client['telephone']); ?></p>
<p>Adresse : <?php echo htmlspecialchars($client['adresse']); ?></p>

<?php include __DIR__ . '/../templates/footer.php'; ?>