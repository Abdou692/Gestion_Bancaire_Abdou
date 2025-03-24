<?php include __DIR__ . '/../templates/header.php'; ?>

<h2>Modifier un Contrat</h2>
<form method="post" action="index.php?action=modifier_contrat&id=<?= $contrat['id'] ?>">
    <label>Type de Contrat:</label>
    <select name="typeContrat" required>
        <?php
        $typesContrats = ['Pret immobilier', 'Assurance vie', 'Pret personnel']; 
        foreach ($typesContrats as $type): ?>
            <option value="<?= $type ?>" <?= ($type == str_replace(['é', 'è', 'à', 'ù', 'î', 'ê', 'â', 'ô'], ['e', 'e', 'a', 'u', 'i', 'e', 'a', 'o'], $contrat['typeContrat'])) ? 'selected' : '' ?>>
                <?= $type ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <label>Montant Souscrit:</label>
    <input type="number" name="montantSouscrit" value="<?= $contrat['montantSouscrit'] ?>" required><br>
    <label>Durée (mois):</label>
    <input type="number" name="duree" value="<?= $contrat['duree'] ?>" required><br>
    <label>Client:</label>
    <select name="idClient" required>
        <?php foreach ($clients as $client): ?>
            <option value="<?= $client['id'] ?>" <?= ($client['id'] == $contrat['idClient']) ? 'selected' : '' ?>>
                <?= $client['nom'] . ' ' . $client['prenom'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit" name="modifier">Modifier</button>
</form>