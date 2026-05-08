<!DOCTYPE html>
<html>
<head>
    <title>Modifier utilisateur</title>
</head>

<body>

<h1>Modifier utilisateur</h1>

<form method="POST">

    <p>
        <input type="text"
               name="nom"
               value="<?= htmlspecialchars($personne['nom']); ?>"
               required>
    </p>

    <p>
        <input type="text"
               name="prenom"
               value="<?= htmlspecialchars($personne['prenom']); ?>"
               required>
    </p>

    <p>
        <input type="email"
               name="email"
               value="<?= htmlspecialchars($personne['email']); ?>"
               required>
    </p>

    <p>

        <select name="role">

            <option value="emprunteur"
                <?= ($personne['role'] == 'emprunteur')
                    ? 'selected'
                    : ''; ?>>

                Emprunteur
            </option>

            <option value="bibliothecaire"
                <?= ($personne['role'] == 'bibliothecaire')
                    ? 'selected'
                    : ''; ?>>

                Bibliothécaire
            </option>

        </select>

    </p>

    <button type="submit">
        Modifier
    </button>

</form>

</body>
</html>