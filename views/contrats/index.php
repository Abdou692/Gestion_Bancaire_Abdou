
<?php include __DIR__ . '/../templates/header.php'; ?>

<h2>Liste des Contrats</h2>
<a href="index.php?action=ajouter_contrat">Ajouter un contrat</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Type de Contrat</th>
            <th>Montant Souscrit</th>
            <th>Durée (mois)</th>
            <th>Client</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contrats as $contrat): ?>
            <tr>
                <td><?= $contrat['id'] ?></td>
                <td><?= $contrat['typeContrat'] ?></td>
                <td><?= $contrat['montantSouscrit'] ?></td>
                <td><?= $contrat['duree'] ?></td>
                <td><?= $contrat['nom'] . ' ' . $contrat['prenom'] ?></td>
                <td>
                    <a href="index.php?action=voir_contrat&id=<?= $contrat['id'] ?>">Voir</a>
                    <a href="index.php?action=modifier_contrat&id=<?= $contrat['id'] ?>">Modifier</a>
                    <a href="index.php?action=supprimer_contrat&id=<?= $contrat['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>