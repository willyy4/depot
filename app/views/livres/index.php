<!DOCTYPE html>
<html>
<head>
    <title>Bibliothèque</title>
</head>

<body>

<h1>Liste des livres</h1>

<a href="index.php?action=create">
    Ajouter un livre
</a>

<hr>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Quantité</th>
        <th>Disponible</th>
        <th>Actions</th>
    </tr>

    <?php foreach($livres as $livre): ?>

    <tr>

        <td><?= $livre['id_livre']; ?></td>

        <td><?= htmlspecialchars($livre['titre']); ?></td>

        <td><?= htmlspecialchars($livre['auteur']); ?></td>

        <td><?= $livre['quantite']; ?></td>

        <td><?= htmlspecialchars($livre['disponible']); ?></td>

        <td>

            <a href="index.php?action=edit&id=<?= $livre['id_livre']; ?>">
                Modifier
            </a>

            |

            <a href="index.php?action=delete&id=<?= $livre['id_livre']; ?>"
               onclick="return confirm('Supprimer ?')">

               Supprimer
            </a>

        </td>

    </tr>

    <?php endforeach; ?>

</table>

</body>
</html>