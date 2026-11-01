<?php
include("connexion.php");

$id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];

if (isset($_POST['modifier'])) {

    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $date_creation = $_POST['date_creation'];

    $req = $bdd->prepare(
        "UPDATE exercice
         SET titre=?, auteur=?, date_creation=?
         WHERE id=?"
    );

    $req->execute(array($titre, $auteur, $date_creation, $id));

    header("Location: index.php");
    exit();
}

$req = $bdd->prepare("SELECT * FROM exercice WHERE id=?");
$req->execute(array($id));

$ligne = $req->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier un exercice</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<fieldset>
    <legend>Modifier un exercice</legend>

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label>Titre de l'exercice</label>
        <input type="text" name="titre"
               value="<?php echo htmlspecialchars($ligne['titre']); ?>">

        <label>Auteur de l'exercice</label>
        <input type="text" name="auteur"
               value="<?php echo htmlspecialchars($ligne['auteur']); ?>">

        <label>Date création</label>
        <input type="date" name="date_creation"
               value="<?php echo $ligne['date_creation']; ?>">

        <input type="submit" name="modifier" value="Modifier">

    </form>
</fieldset>

</body>
</html>
