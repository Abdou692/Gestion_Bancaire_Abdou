<?php include __DIR__ . '/../templates/header.php'; ?>

<h1>Liste des Administrateurs</h1>

<table>
    <thead>
        <tr>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?php echo htmlspecialchars($admin['email']); ?></td>
                <td>
                    <a href="?action=supprimer_admin&id=<?php echo $admin['idAdmin']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="?action=ajouter_admin">Ajouter un administrateur</a>

<?php include __DIR__ . '/../templates/footer.php'; ?>