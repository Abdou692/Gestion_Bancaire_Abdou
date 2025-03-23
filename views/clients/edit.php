<?php include __DIR__ . '/../templates/header.php'; ?>

<div class="form-container">
    <h2>Modifier un client</h2>
    <form method="POST" action="index.php?action=modifier_client&id=<?php echo $client['id']; ?>">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($client['nom']); ?>">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" value="<?php echo htmlspecialchars($client['prenom']); ?>">
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($client['email']); ?>">
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone :</label>
            <input type="tel" name="telephone" id="telephone" value="<?php echo htmlspecialchars($client['telephone']); ?>">
        </div>
        <div class="form-group">
            <label for="adresse">Adresse :</label>
            <input type="text" name="adresse" id="adresse" value="<?php echo htmlspecialchars($client['adresse']); ?>">
        </div>
        <button type="submit" name="modifier">Modifier</button>
    </form>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>