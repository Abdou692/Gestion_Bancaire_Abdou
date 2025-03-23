<?php include __DIR__ . '/../templates/header.php'; ?>

<div class="form-container">
    <h2>Modifier un compte</h2>
    <form method="POST" action="index.php?action=modifier_compte&id=<?php echo $compte['id']; ?>">
        <div class="form-group">
            <label for="rib">RIB :</label>
            <input type="text" name="rib" id="rib" value="<?php echo htmlspecialchars($compte['rib']); ?>">
        </div>
        <div class="form-group">
            <label for="typeCompte">Type de compte :</label>
            <select name="typeCompte" id="typeCompte">
                <option value="Compte courant" <?php if ($compte['typeCompte'] === 'Compte courant') echo 'selected'; ?>>Compte courant</option>
                <option value="Compte épargne" <?php if ($compte['typeCompte'] === 'Compte épargne') echo 'selected'; ?>>Compte épargne</option>
            </select>
        </div>
        <div class="form-group">
            <label for="solde">Solde :</label>
            <input type="number" name="solde" id="solde" value="<?php echo htmlspecialchars($compte['solde']); ?>">
        </div>
        <div class="form-group">
            <label for="idClient">Client :</label>
            <select name="idClient" id="idClient">
                <?php if (isset($clients) && is_array($clients)) : ?>
                    <?php foreach ($clients as $client) : ?>
                        <option value="<?php echo $client['id']; ?>" <?php if ($compte['idClient'] === $client['id']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($client['nom']) . ' ' . htmlspecialchars($client['prenom']); ?>
                        </option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <option value="">Aucun client disponible</option>
                <?php endif; ?>
            </select>
        </div>
        <button type="submit" name="modifier">Modifier</button>
    </form>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>