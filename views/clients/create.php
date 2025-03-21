<div class="form-container">
    <h2>Ajouter un client</h2>
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
            <label for="ville">Ville :</label>
            <input type="text" name="adresse" id="adresse" placeholder="Entrez la ville">
        </div>
        <button type="submit" name="ajouter">Ajouter</button>
    </form>
</div>