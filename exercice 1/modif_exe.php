<?php
include("connexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

if (isset($_POST['modifier'])) {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $date_creation = $_POST['date_creation'];

    $req = $bdd->prepare("UPDATE exercice SET titre=?, auteur=?, date_creation=? WHERE id=?");
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
</head>
<body>
<fieldset>
    <legend>Modifier un exercice</legend>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Titre</label>
        <input type="text" name="titre" value="<?php echo $ligne['titre']; ?>">
        <label>Auteur</label>
        <input type="text" name="auteur" value="<?php echo $ligne['auteur']; ?>">
        <label>Date</label>
        <input type="date" name="date_creation" value="<?php echo $ligne['date_creation']; ?>">
        <input type="submit" name="modifier" value="Modifier">
    </form>
</fieldset>
</body>
</html>

