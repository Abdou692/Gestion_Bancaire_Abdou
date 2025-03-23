<?php include __DIR__ . '/../templates/header.php'; ?>

<div class="form-container">
    <h2>Ajouter un client</h2>

    <?php if (isset($error_message)): ?>
        <div style="color: red; margin-bottom: 10px;">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="index.php?action=ajouter_client">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" placeholder="Entrez le nom">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" placeholder="Entrez le prénom">
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" placeholder="Entrez l'email">
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone :</label>
            <input type="tel" name="telephone" id="telephone" placeholder="Entrez le téléphone">
        </div>
        <div class="form-group">
            <label for="adresse">Adresse :</label>
            <input type="text" name="adresse" id="adresse" placeholder="Entrez l'adresse">
        </div>
        <button type="submit" name="ajouter">Ajouter</button>
    </form>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>