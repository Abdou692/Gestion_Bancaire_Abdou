

<h2>Modifier l'administrateur</h2>
<form method="POST" action="index.php?action=modifier_admin&id=<?php echo $admin->getId(); ?>">
    <div class="form-group">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($admin->getUsername()); ?>">
    </div>
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($admin->getEmail()); ?>">
    </div>
    <div class="form-group">
        <label for="password">Nouveau mot de passe :</label>
        <input type="password" name="password" id="password" placeholder="Entrez le nouveau mot de passe (laisser vide pour ne pas changer)">
    </div>
    <button type="submit" name="update">Mettre à jour</button>
</form>

