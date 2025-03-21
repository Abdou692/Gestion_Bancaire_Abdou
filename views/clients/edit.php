<div class="form-container">
    <h2>Modifier un client</h2>
    <form method="POST" action="index.php?action=modifier_client&id=<?php echo $client['id']; ?>">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?php echo $client['nom']; ?>">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" value="<?php echo $client['prenom']; ?>">
        </div>
        <div class="form-group">
            <label for="ville">Ville :</label>
            <input type="text" name="adresse" id="adresse" value="<?php echo $client['adresse']; ?>">
        </div>
        <button type="submit" name="modifier">Modifier</button>
    </form>
</div>