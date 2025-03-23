

<div class="form-container">
    <h2>Ajouter un administrateur</h2>
    <form method="POST" action="index.php?action=ajouter_admin">
        <div class="form-group">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" name="username" id="username" placeholder="Entrez le nom d'utilisateur">
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" placeholder="Entrez l'email">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" placeholder="Entrez le mot de passe">
        </div>
        <button type="submit" name="add">Ajouter</button>
    </form>
</div>

