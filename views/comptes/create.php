<div class="form-container">
    <h2>Ajouter un compte</h2>
    <form method="POST" action="index.php?action=ajouter_compte">
        <div class="form-group">
            <label for="rib">RIB :</label>
            <input type="text" name="rib" id="rib" placeholder="Entrez le RIB">
        </div>
        <div class="form-group">
            <label for="typeCompte">Type de compte :</label>
            <select name="typeCompte" id="typeCompte">
                <option value="Compte courant">Compte courant</option>
                <option value="Compte épargne">Compte épargne</option>
            </select>
        </div>
        <div class="form-group">
            <label for="solde">Solde :</label>
            <input type="number" name="solde" id="solde" placeholder="Entrez le solde">
        </div>
        <div class="form-group">
            <label for="idClient">Client :</label>
            <select name="idClient" id="idClient">
                <?php foreach ($clients as $client): ?>
                    <option value="<?php echo $client['id']; ?>"><?php echo htmlspecialchars($client['nom'] . ' ' . $client['prenom']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" name="ajouter">Ajouter</button>
    </form>
</div>