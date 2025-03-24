
<?php include __DIR__ . '/../templates/header.php'; ?>

<h2>Ajouter un Contrat</h2>
<form method="post" action="index.php?action=ajouter_contrat">
    <label>Type de Contrat:</label>
    <input type="text" name="typeContrat" required><br>
    <label>Montant Souscrit:</label>
    <input type="number" name="montantSouscrit" required><br>
    <label>Durée (mois):</label>
    <input type="number" name="duree" required><br>
    <label>Client:</label>
    <select name="idClient" required>
        <?php foreach ($clients as $client): ?>
            <option value="<?= $client['id'] ?>"><?= $client['nom'] . ' ' . $client['prenom'] ?></option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit" name="ajouter">Ajouter</button>
</form>