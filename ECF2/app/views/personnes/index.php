<!DOCTYPE html>
<html>
<head>
    <title>Liste des utilisateurs</title>
</head>

<body>

<h1>Liste des utilisateurs</h1>

<a href="index.php?controller=personne&action=create">
    Ajouter un utilisateur
</a>

<hr>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Rôle</th>
        <th>Date inscription</th>
        <th>Actions</th>
    </tr>

    <?php foreach($personnes as $personne): ?>

    <tr>

        <td><?= $personne['id_personne']; ?></td>

        <td><?= htmlspecialchars($personne['nom']); ?></td>

        <td><?= htmlspecialchars($personne['prenom']); ?></td>

        <td><?= htmlspecialchars($personne['email']); ?></td>

        <td><?= htmlspecialchars($personne['role']); ?></td>

        <td><?= $personne['date_inscription']; ?></td>

        <td>

            <a href="index.php?controller=personne&action=edit&id=<?= $personne['id_personne']; ?>">
                Modifier
            </a>

            |

            <a href="index.php?controller=personne&action=delete&id=<?= $personne['id_personne']; ?>"
               onclick="return confirm('Supprimer cet utilisateur ?')">

                Supprimer
            </a>

        </td>

    </tr>

    <?php endforeach; ?>

</table>

</body>
</html>