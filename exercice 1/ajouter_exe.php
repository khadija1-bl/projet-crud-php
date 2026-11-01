<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter un exercice</title>
</head>
<body>

<fieldset>
    <legend>Ajouter un exercice</legend>

    <form action="ajouter.php" method="POST">
        <label>Titre de l'exercice</label>
        <input type="text" name="titre" required>
        <br><br>

        <label>Auteur de l'exercice</label>
        <input type="text" name="auteur" required>
        <br><br>

        <label>Date création</label>
        <input type="date" name="date_creation" required>
        <br><br>

        <input type="submit" value="Envoyer">
    </form>

</fieldset>

</body>
</html>
