<?php
            require_once('mainrecipe.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon" href= "../../Rattrapage Bloc 3/Ressources/stir-fry.png">
    <link rel="stylesheet" href="PageMainDeco.css">
    
</head>

<body>

    <header>
    <div class="container">
        <button class="Menu_Principal"><a href="PageMainDeco.php" class="fill-div"></a></button>
    <div>
        <form name="searchbar" method="get">
            <input type="text" name="keywords" placeholder="Recherche" class="BarreRecherche"/>
            <!--<input type="submit" name="valider" value="test" class="Valider"/>-->
        </form>
    </div>
    <div class="dropdown">
        <button class="Menu_User"><a href="" class="fill-div"></a></button>
        <div class="dropdown-content">
            <a href="PageLogin.php">Connexion</a>
            <a href="PageSignIn.php">Inscription</a>
          </div>
    </div>
    </div>
    </header>

    <main>
    <div class="Nouveau">
   <h2 class="H2New">Nouveautés :</h2>
   <div>
        <button class="Card1"><a href="PageRizauLaitDeco.php" class="fill-div"><img src="Images/<?php echo $img4 ?>" class="IMGButton1">
            <div class="Test">
            <div class="title"><?php echo $Titre4 ?></div>
            <div class="name"><?php echo $Pseudo4 ?></div>
            </div>
        </a></button>
        <button class="Card2"><a href="" class="fill-div"><img src="Images/<?php echo $img5 ?>" class="IMGButton2">
            <div class="Test2">
            <div class="title"><?php echo $Titre5 ?></div>
            <div class="name"><?php echo $Pseudo5 ?></div>
            </div>
        </a></button>
        <button class="Card3"><a href="" class="fill-div"><img src="Images/<?php echo $img6 ?>" class="IMGButton3">
            <div class="Test3">
            <div class="title"><?php echo $Titre6 ?></div>
            <div class="name"><?php echo $Pseudo6 ?></div>
            </div>
        </a></button>
   </div>
    </div>
    <hr class="HR">
    <div class="Recettes">
   <h2 class="H2Receip">Recettes :</h2>
   <div>
    <button class="Card4"><a href="PageRizauLait.php" class="fill-div"><img src="Images/<?php echo $img ?>" class="IMGButton4">
            <div class="Test4">
            <div class="title"><?php echo $Titre ?></div>
            <div class="name"><?php echo $Pseudo ?></div>
            </div>
            </a></button>
    <button class="Card5"><a href="PageRizauLait.php" class="fill-div"><img src="Images/<?php echo $img2 ?>" class="IMGButton5">
            <div class="Test5">
            <div class="title"><?php echo $Titre2 ?></div>
            <div class="name"><?php echo $Pseudo2 ?></div>
            </div>
            </a></button>
    <button class="Card6"><a href="PageRizauLait.php" class="fill-div"><img src="Images/<?php echo $img3 ?>" class="IMGButton6">
            <div class="Test6">
            <div class="title"><?php echo $Titre3 ?></div>
            <div class="name"><?php echo $Pseudo3 ?></div>
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

