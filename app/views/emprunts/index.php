<!DOCTYPE html>
<html>
<head>
    <title>Liste des emprunts</title>
</head>

<body>

<h1>Gestion des emprunts</h1>

<a href="index.php?controller=emprunt&action=create">
    Nouvel emprunt
</a>

<hr>

<table border="1" cellpadding="10">

<tr>

    <th>ID</th>
    <th>Emprunteur</th>
    <th>Livre</th>
    <th>Date emprunt</th>
    <th>Date retour</th>
    <th>Statut</th>
    <th>Actions</th>

</tr>

<?php foreach($emprunts as $emprunt): ?>

<tr>

    <td><?= $emprunt['id_emprunt']; ?></td>

    <td>

        <?= htmlspecialchars(
            $emprunt['prenom']
        ); ?>

        <?= htmlspecialchars(
            $emprunt['nom']
        ); ?>

    </td>

    <td>

        <?= htmlspecialchars(
            $emprunt['titre']
        ); ?>

    </td>

    <td><?= $emprunt['date_emprunt']; ?></td>

    <td><?= $emprunt['date_retour']; ?></td>

    <td><?= $emprunt['statut']; ?></td>

    <td>

        <?php if(
            $emprunt['statut'] == 'en_cours'
        ): ?>

        <a href="index.php?controller=emprunt&action=retourner&id=<?= $emprunt['id_emprunt']; ?>">

            Retourner

        </a>

        <?php endif; ?>

        |

        <a href="index.php?controller=emprunt&action=delete&id=<?= $emprunt['id_emprunt']; ?>"
           onclick="return confirm('Supprimer ?')">

            Supprimer

        </a>

    </td>

</tr>

<?php endforeach; ?>

</table>

</body>
</html>