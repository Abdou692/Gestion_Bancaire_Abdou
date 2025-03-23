
<h2>Liste des Administrateurs</h2>
<table>
    <thead>
        <tr>
            <th>Nom d'utilisateur</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($admins) && is_array($admins) && !empty($admins)): ?>
            <?php foreach ($admins as $admin): ?>
                <tr>
                    <td><?php echo htmlspecialchars($admin->getUsername()); ?></td>
                    <td><?php echo htmlspecialchars($admin->getEmail()); ?></td>
                    <td>
                        <a href="index.php?action=modifier_admin&id=<?php echo $admin->getId(); ?>">Modifier</a>
                        <a href="index.php?action=supprimer_admin&id=<?php echo $admin->getId(); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Aucun administrateur trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<a href="index.php?action=ajouter_admin">Ajouter un administrateur</a>