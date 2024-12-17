<?php

session_start();
//echo $_SESSION['user_role'];


$con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

//Requête derniers éléments + récupère l'id de la recette
$sql = "SELECT Titre, IDCheckRecette, Pseudo, File FROM check_recettes JOIN user ON check_recettes.IDUsers = user.IDUsers ORDER BY IDCheckRecette ASC";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre = $data['Titre'];
$Pseudo = $data['Pseudo'];
$img = $data['File'];
$IDRecette1 = $data['IDCheckRecette'];

}


$sql = "SELECT Titre, IDCheckRecette, Pseudo, File FROM check_recettes JOIN user ON check_recettes.IDUsers = user.IDUsers ORDER BY IDCheckRecette ASC LIMIT 1, 1";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre2 = $data['Titre'];
$Pseudo2 = $data['Pseudo'];
$img2 = $data['File'];
$IDRecette2 = $data['IDCheckRecette'];

}


$sql = "SELECT Titre, IDCheckRecette, Pseudo, File FROM check_recettes JOIN user ON check_recettes.IDUsers = user.IDUsers ORDER BY IDCheckRecette ASC LIMIT 2, 1";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre3 = $data['Titre'];
$Pseudo3 = $data['Pseudo'];
$img3 = $data['File'];
$IDRecette3 = $data['IDCheckRecette'];

}


/////////////////////////Requête dernier ingrédients + récupère l'id de la recette/////////////////////

$sql = "SELECT Nom, IDCheckIng, File, Pseudo FROM check_ingredients JOIN user ON check_ingredients.IDUsers = user.IDUsers ORDER BY IDCheckIng DESC";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre4 = $data['Nom'];
$Pseudo4 = $data['Pseudo'];
$img4 = $data['File'];
$IDIng1 = $data['IDCheckIng'];
//header("Content-type: image/jpg"); 
//echo $img4;

}

$sql = "SELECT Nom, IDCheckIng, File, Pseudo FROM check_ingredients JOIN user ON check_ingredients.IDUsers = user.IDUsers ORDER BY IDCheckIng DESC LIMIT 1, 1";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre5 = $data['Nom'];
$Pseudo5 = $data['Pseudo'];
$img5 = $data['File'];
$IDIng2 = $data['IDCheckIng'];

}


$sql = "SELECT Nom, IDCheckIng, File, Pseudo FROM check_ingredients JOIN user ON check_ingredients.IDUsers = user.IDUsers ORDER BY IDCheckIng DESC LIMIT 2, 1";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre6 = $data['Nom'];
$Pseudo6 = $data['Pseudo'];
$img6 = $data['File'];
$IDIng3 = $data['IDCheckIng'];

}
?>