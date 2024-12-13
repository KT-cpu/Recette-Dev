<?php
session_start();
//echo $_SESSION['user_role'];


$con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

//Requête derniers éléments + récupère l'id de la recette
$sql = "SELECT Titre, IDCheckRecette, Pseudo FROM checkingrecettes JOIN user ON checkingrecettes.IDUsers = user.IDUsers ORDER BY IDCheckRecette ASC";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre = $data['Titre'];
$Pseudo = $data['Pseudo'];
$_SESSION['id_recette1'] = $data['IDCheckRecette'];

}


$sql = "SELECT Titre, IDCheckRecette, Pseudo FROM checkingrecettes JOIN user ON checkingrecettes.IDUsers = user.IDUsers ORDER BY IDCheckRecette ASC LIMIT 1, 1";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre2 = $data['Titre'];
$Pseudo2 = $data['Pseudo'];
$_SESSION['id_recette2'] = $data['IDCheckRecette'];

}


$sql = "SELECT Titre, IDCheckRecette, Pseudo FROM checkingrecettes JOIN user ON checkingrecettes.IDUsers = user.IDUsers ORDER BY IDCheckRecette ASC LIMIT 2, 1";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre3 = $data['Titre'];
$Pseudo3 = $data['Pseudo'];
$_SESSION['id_recette3'] = $data['IDCheckRecette'];

}


/////////////////////////Requête dernier ingrédients + récupère l'id de la recette/////////////////////

$sql = "SELECT Nom, IDCheckIng, ImgBlob, Pseudo FROM checkingredients JOIN user ON checkingredients.IDUsers = user.IDUsers ORDER BY IDCheckIng DESC";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre4 = $data['Nom'];
$Pseudo4 = $data['Pseudo'];
$img4 = $data['ImgBlob'];
$_SESSION['id_ing1'] = $data['IDCheckIng'];
//header("Content-type: image/jpg"); 
//echo $img4;

}

$sql = "SELECT Nom, IDCheckIng, Pseudo FROM checkingredients JOIN user ON checkingredients.IDUsers = user.IDUsers ORDER BY IDCheckIng DESC LIMIT 1, 1";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre5 = $data['Nom'];
$Pseudo5 = $data['Pseudo'];
$_SESSION['id_ing2'] = $data['IDCheckIng'];

}


$sql = "SELECT Nom, IDCheckIng, Pseudo FROM checkingredients JOIN user ON checkingredients.IDUsers = user.IDUsers ORDER BY IDCheckIng DESC LIMIT 2, 1";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre6 = $data['Nom'];
$Pseudo6 = $data['Pseudo'];
$_SESSION['id_ing3'] = $data['IDCheckIng'];

}

?>