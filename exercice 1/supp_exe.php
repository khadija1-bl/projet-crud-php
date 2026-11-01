<?php
include("connexion.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $req = $bdd->prepare("DELETE FROM exercice WHERE id=?");
    $req->execute(array($id));

}
header("Location: index.php");
exit();
?>
