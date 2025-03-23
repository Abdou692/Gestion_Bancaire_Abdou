<?php include __DIR__ . '/../templates/header.php'; ?>

<h1>Liste des Comptes</h1>


<table>
    <thead>
        <tr>
            <th>Nom du Client</th>
            <th>Comptes</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comptesParClient as $clientId => $clientData) : ?>
            <tr>
                <td><?php echo htmlspecialchars($clientData['nomClient']); ?></td>
                <td>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>RIB</th>
                                <th>Type de Compte</th>
                                <th>Solde</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clientData['comptes'] as $compte) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($compte['id']); ?></td>
                                    <td><?php echo htmlspecialchars($compte['rib']); ?></td>
                                    <td><?php echo htmlspecialchars($compte['typeCompte']); ?></td>
                                    <td><?php echo htmlspecialchars($compte['solde']); ?></td>
                                    <td>
                                        <a href="index.php?action=voir_compte&id=<?php echo $compte['id']; ?>">Voir</a>
                                        <a href="index.php?action=modifier_compte&id=<?php echo $compte['id']; ?>">Modifier</a>
                                        <a href="index.php?action=supprimer_compte&id=<?php echo $compte['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?')">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php?action=ajouter_compte">Ajouter un compte</a>

<?php include __DIR__ . '/../templates/footer.php'; ?>