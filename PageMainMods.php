<?php
session_start();
//echo $_SESSION['user_role'];


$con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

//Requête derniers éléments + récupère l'id de la recette
$sql = "SELECT Titre, IDCheckRecette, Pseudo, File FROM checkingrecettes JOIN user ON checkingrecettes.IDUsers = user.IDUsers ORDER BY IDCheckRecette ASC";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre = $data['Titre'];
$Pseudo = $data['Pseudo'];
$img = $data['File'];
$_SESSION['id_recette1'] = $data['IDCheckRecette'];

}


$sql = "SELECT Titre, IDCheckRecette, Pseudo, File FROM checkingrecettes JOIN user ON checkingrecettes.IDUsers = user.IDUsers ORDER BY IDCheckRecette ASC LIMIT 1, 1";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre2 = $data['Titre'];
$Pseudo2 = $data['Pseudo'];
$img2 = $data['File'];
$_SESSION['id_recette2'] = $data['IDCheckRecette'];

}


$sql = "SELECT Titre, IDCheckRecette, Pseudo, File FROM checkingrecettes JOIN user ON checkingrecettes.IDUsers = user.IDUsers ORDER BY IDCheckRecette ASC LIMIT 2, 1";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre3 = $data['Titre'];
$Pseudo3 = $data['Pseudo'];
$img3 = $data['File'];
$_SESSION['id_recette3'] = $data['IDCheckRecette'];

}


/////////////////////////Requête dernier ingrédients + récupère l'id de la recette/////////////////////

$sql = "SELECT Nom, IDCheckIng, File, Pseudo FROM checkingredients JOIN user ON checkingredients.IDUsers = user.IDUsers ORDER BY IDCheckIng DESC";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre4 = $data['Nom'];
$Pseudo4 = $data['Pseudo'];
$img4 = $data['File'];
$_SESSION['id_ing1'] = $data['IDCheckIng'];
//header("Content-type: image/jpg"); 
//echo $img4;

}

$sql = "SELECT Nom, IDCheckIng, File, Pseudo FROM checkingredients JOIN user ON checkingredients.IDUsers = user.IDUsers ORDER BY IDCheckIng DESC LIMIT 1, 1";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre5 = $data['Nom'];
$Pseudo5 = $data['Pseudo'];
$img5 = $data['File'];
$_SESSION['id_ing2'] = $data['IDCheckIng'];

}


$sql = "SELECT Nom, IDCheckIng, File, Pseudo FROM checkingredients JOIN user ON checkingredients.IDUsers = user.IDUsers ORDER BY IDCheckIng DESC LIMIT 2, 1";
$result = $con->prepare($sql);
$result->execute();
$data = $result->fetch();

if ($data) {
$Titre6 = $data['Nom'];
$Pseudo6 = $data['Pseudo'];
$img6 = $data['File'];
$_SESSION['id_ing3'] = $data['IDCheckIng'];

}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon" href= "../../Rattrapage Bloc 3/Ressources/stir-fry.png">
    <link rel="stylesheet" href="PageMainMods.css">
    
</head>


<body>
    <header>
    <div class="container">
        <button class="Menu_Principal"><a href="PageMainMods.php" class="fill-div"></a></button>
    <div>
        <form name="searchbar" method="get">
            <input type="text" name="keywords" placeholder="Recherche" class="BarreRecherche"/>
            <!--<input type="submit" name="valider" value="test" class="Valider"/>-->
        </form>
    </div>
    <div class="dropdown">
        <button class="Menu_User"><a href="PageMods.php" class="fill-div"></a></button>
        <div class="dropdown-content">
            <a href="PageMods.php">Mon Espace</a>
            <a href="PageMainDeco.php" action="disconnect.php">Déconnexion</a>
          </div>
    </div>
    </div>
    </div>
    </header>
    <main>
    <div class="Nouveau">
   <h2 class="H2New">Recettes en attentes :</h2>
   <div>
        <button class="Card1"><a href="PageRizauLaitMods.php" class="fill-div"><img src="Images/<?php echo $img ?>" class="IMGButton1">
            <div class="Test">
            <div class="title"><?php echo $Titre ?></div>
            <div class="name"><?php echo $Pseudo ?></div>
            </div>
        </a></button>
        <button class="Card2"><a href="PageRizauLaitMods.php" class="fill-div"><img src="Images/<?php echo $img2 ?>" class="IMGButton2">
            <div class="Test2">
            <div class="title"><?php echo $Titre2 ?></div>
            <div class="name"><?php echo $Pseudo2 ?></div>
            </div>
        </a></button>
        <button class="Card3"><a href="PageRizauLaitMods.php" class="fill-div"><img src="Images/<?php echo $img3 ?>" class="IMGButton3">
            <div class="Test3">
            <div class="title"><?php echo $Titre3 ?></div>
            <div class="name"><?php echo $Pseudo3 ?></div>
            </div>
        </a></button>
   </div>
    </div>
    <hr class="HR">
    <div class="Recettes">
   <h2 class="H2Receip">Ingrédients en attentes :</h2>
   <div>
    <button class="Card4"><a href="PageRizauLaitMods.php" class="fill-div"><img src="Images/<?php echo $img4 ?>" class="IMGButton3">
            <div class="Test4">
            <div class="title"><?php echo $Titre4 ?></div>
            <div class="name"><?php echo $Pseudo4 ?></div>
            </div>
        </a></button>
    <button class="Card5"><a href="PageRizauLaitMods.php" class="fill-div"><img src="Images/<?php echo $img5 ?>" class="IMGButton3">
            <div class="Test5">
            <div class="title"><?php echo $Titre5 ?></div>
            <div class="name"><?php echo $Pseudo5 ?></div>
            </div>
        </a></button>
    <button class="Card6"><a href="PageRizauLaitMods.php" class="fill-div"><img src="Images/<?php echo $img6 ?>" class="IMGButton3">
            <div class="Test6">
            <div class="title"><?php echo $Titre6 ?></div>
            <div class="name"><?php echo $Pseudo6 ?></div>
            </div>
        </a></button>
   </div>
    </div>
</main>

<footer class="Footer">
    <div>
    <div class="FooterTxT">Mon Footer</div>
    </div>
</footer>

<style>
  .dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

</body>