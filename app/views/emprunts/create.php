<!DOCTYPE html>
<html>
<head>
    <title>Nouvel emprunt</title>
</head>

<body>

<h1>Créer un emprunt</h1>

<?php if(isset($error)): ?>

<p style="color:red;">

    <?= $error; ?>

</p>

<?php endif; ?>

<form method="POST">

    <p>

        <label>Emprunteur</label>

        <select name="id_personne">

            <?php foreach($personnes as $personne): ?>

            <option
                value="<?= $personne['id_personne']; ?>">

                <?= htmlspecialchars(
                    $personne['prenom']
                ); ?>

                <?= htmlspecialchars(
                    $personne['nom']
                ); ?>

            </option>

            <?php endforeach; ?>

        </select>

    </p>

    <p>

        <label>Livre</label>

        <select name="id_livre">

            <?php foreach($livres as $livre): ?>

            <option
                value="<?= $livre['id_livre']; ?>">

                <?= htmlspecialchars(
                    $livre['titre']
                ); ?>

            </option>

            <?php endforeach; ?>

        </select>

    </p>

    <button type="submit">

        Valider emprunt

    </button>

</form>

</body>
</html>