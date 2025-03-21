<?php include __DIR__ . '/../templates/header.php'; ?>

<h1>Liste des Comptes</h1>

<table>
    <thead>
        <tr>
            <th>RIB</th>
            <th>Type de Compte</th>
            <th>Solde</th>
            <th>ID Client</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comptes as $compte): ?>
            <tr>
                <td><?php echo htmlspecialchars($compte['rib']); ?></td>
                <td><?php echo htmlspecialchars($compte['typeCompte']); ?></td>
                <td><?php echo htmlspecialchars($compte['solde']); ?></td>
                <td><?php echo htmlspecialchars($compte['idClient']); ?></td>
                <td>
                    <a href="index.php?action=voir_compte&id=<?php echo $compte['id']; ?>">Voir</a>
                    <a href="index.php?action=modifier_compte&id=<?php echo $compte['id']; ?>">Modifier</a>
                    <a href="index.php?action=supprimer_compte&id=<?php echo $compte['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php?action=ajouter_compte">Ajouter un compte</a>

<?php include __DIR__ . '/../templates/footer.php'; ?>