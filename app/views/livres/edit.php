<!DOCTYPE html>
<html>
<head>
    <title>Modifier</title>
</head>

<body>

<h1>Modifier le livre</h1>

<form method="POST">

    <p>
        <input type="text"
               name="titre"
               value="<?= htmlspecialchars($livre['titre']); ?>"
               required>
    </p>

    <p>
        <input type="text"
               name="auteur"
               value="<?= htmlspecialchars($livre['auteur']); ?>"
               required>
    </p>

    <p>
        <input type="number"
               name="quantite"
               value="<?= $livre['quantite']; ?>"
               min="0">
    </p>

    <p>
        <input type="text"
               name="disponible"
               value="<?= htmlspecialchars($livre['disponible']); ?>"
               required>
    </p>

    <button type="submit">
        Modifier
    </button>

</form>

</body>
</html>