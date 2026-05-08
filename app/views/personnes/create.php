<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un utilisateur</title>
</head>

<body>

<h1>Ajouter un utilisateur</h1>

<form method="POST">

    <p>
        <input type="text"
               name="nom"
               placeholder="Nom"
               required>
    </p>

    <p>
        <input type="text"
               name="prenom"
               placeholder="Prénom"
               required>
    </p>

    <p>
        <input type="email"
               name="email"
               placeholder="Email"
               required>
    </p>

    <p>
        <input type="password"
               name="mot_de_passe"
               placeholder="Mot de passe"
               required>
    </p>

    <p>

        <select name="role">

            <option value="emprunteur">
                Emprunteur
            </option>

            <option value="bibliothecaire">
                Bibliothécaire
            </option>

        </select>

    </p>

    <button type="submit">
        Ajouter
    </button>

</form>

</body>
</html>