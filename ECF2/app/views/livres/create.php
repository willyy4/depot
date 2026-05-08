<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un livre</title>
</head>

<body>

<h1>Ajouter un livre</h1>

<form method="POST">

    <p>
        <input type="text"
               name="titre"
               placeholder="Titre"
               required>
    </p>

    <p>
        <input type="text"
               name="auteur"
               placeholder="Auteur"
               required>
    </p>

    <p>
        <input type="number"
               name="quantite"
               min="1"
               value="1">
    </p>

    <p>
        <input type="text"
               name="disponible"
               placeholder="Disponible"
               required>
    </p>

    <button type="submit">
        Ajouter
    </button>

</form>

</body>
</html>