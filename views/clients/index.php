<?php include __DIR__ . '/../templates/header.php'; ?>

<h1>Liste des Clients</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $client) : ?>
            <tr>
                <td><?php echo htmlspecialchars($client['id']); ?></td>
                <td><?php echo htmlspecialchars($client['nom']); ?></td>
                <td><?php echo htmlspecialchars($client['prenom']); ?></td>
                <td><?php echo htmlspecialchars($client['email']); ?></td>
                <td><?php echo htmlspecialchars($client['telephone']); ?></td>
                <td><?php echo htmlspecialchars($client['adresse']); ?></td>
                <td>
                    <a href="index.php?action=voir_client&id=<?php echo $client['id']; ?>">Voir</a>
                    <a href="index.php?action=modifier_client&id=<?php echo $client['id']; ?>">Modifier</a>
                    <a href="index.php?action=supprimer_client&id=<?php echo $client['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php?action=ajouter_client">Ajouter un client</a>

<?php include __DIR__ . '/../templates/footer.php'; ?>