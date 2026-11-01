<?php
include("connexion.php");

$req = $bdd->query("SELECT * FROM exercice");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des exercices</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<fieldset>
    <legend>Ajouter un exercice</legend>

    <form action="ajouter.php" method="POST">

        <label>Titre de l'exercice</label>
        <input type="text" name="titre" required>

        <label>Auteur de l'exercice</label>
        <input type="text" name="auteur" required>

        <label>Date création</label>
        <input type="date" name="date_creation" required>

        <input type="submit" value="Envoyer">

    </form>
</fieldset>

<h2>Liste des exercices</h2>

<table>
    <tr>
        <th>id</th>
        <th>titre</th>
        <th>auteur</th>
        <th>date_creation</th>
        <th>Actions</th>
    </tr>

    <?php while ($ligne = $req->fetch()) { ?>

    <tr>
        <td><?php echo $ligne['id']; ?></td>
        <td><?php echo $ligne['titre']; ?></td>
        <td><?php echo $ligne['auteur']; ?></td>
        <td><?php echo $ligne['date_creation']; ?></td>

        <td>
            <a href="modif_exe.php?id=<?php echo $ligne['id']; ?>">
                Modifier
            </a>

            <form action="supp_exe.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $ligne['id']; ?>">
                <input type="submit" value="Supprimer">
            </form>
        </td>
    </tr>

    <?php } ?>

</table>

</body>
</html>
