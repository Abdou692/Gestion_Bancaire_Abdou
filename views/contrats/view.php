<?php include __DIR__ . '/../templates/header.php'; ?>

<h2>Détails du Contrat</h2>
<p><strong>Type de Contrat:</strong> <?= $contrat['typeContrat'] ?></p>
<p><strong>Montant Souscrit:</strong> <?= $contrat['montantSouscrit'] ?></p>
<p><strong>Durée (mois):</strong> <?= $contrat['duree'] ?></p>
<p><strong>Client:</strong> <?= $contrat['nom'] . ' ' . $contrat['prenom'] ?></p>
<p><strong>ID Client:</strong> <?= $contrat['idClient'] ?></p>
<a href="index.php?action=liste_contrats">Retour à la liste</a>