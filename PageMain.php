<?php

$data = json_decode(file_get_contents("http://localhost/Rattrapage_Bloc_3/api/home"), true);
            
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="PageMain.css">
    
</head>

    <body>
    <header>
    <div class="container">
        <button class="Menu_Principal"><a href="PageMain.php" class="fill-div"></a></button>
    <div>
        <form name="searchbar" method="get">
            <input type="text" name="keywords" placeholder="Recherche" class="BarreRecherche"/>
            <button class="Valider"><a href="PageRecherche.php" class="fill-div"></a></button>
        </form>
    </div>
    <div class="dropdown">
        <button class="Menu_User"><a href="" class="fill-div"></a></button>
        <div class="dropdown-content">
            <a href="PageUser.php">Mon Espace</a>
            <a href="PageCreateRecipe.php">Créer une recette</a>
            <a href="PageAddIngredient.php">Ajouter un ingrédient</a>
            <a href="PageMainDeco.php" action="disconnect.php">Déconnexion</a>
          </div>
    </div>
    </div>
    </header>
    <main>
    <div class="Nouveau">
   <h2 class="H2New">Nouveautés :</h2>
   <div>

        <button class="Card1"><a href="PageRecipe.php?id=<?php echo $data['latest1']['IDRecette']; ?>" class="fill-div"><img src="Images/<?php echo $data['latest1']['Image'] ?>" class="IMGButton1">
            <div class="Test">
            <div class="title"><?php echo $data['latest1']['Titre'] ?></div>
            <div class="name"><?php echo $data['latest1']['Pseudo'] ?></div>
            </div>
        </a></button>
        <button class="Card2"><a href="PageRecipe.php?id=<?php echo $data['latest2']['IDRecette']; ?>" class="fill-div"><img src="Images/<?php echo $data['latest2']['Image'] ?>" class="IMGButton2">
            <div class="Test2">
            <div class="title"><?php echo $data['latest2']['Titre'] ?></div>
            <div class="name"><?php echo $data['latest2']['Pseudo'] ?></div>
            </div>
        </a></button>
        <button class="Card3"><a href="PageRecipe.php?id=<?php echo $data['latest3']['IDRecette']; ?>" class="fill-div"><img src="Images/<?php echo $data['latest3']['Image'] ?>" class="IMGButton3">
            <div class="Test3">
            <div class="title"><?php echo $data['latest3']['Titre'] ?></div>
            <div class="name"><?php echo $data['latest3']['Pseudo'] ?></div>
            </div>
        </a></button>
   </div>
    </div>
    <hr class="HR">
    <div class="Recettes">
   <h2 class="H2Receip">Recettes :</h2>
   <div>
    <button class="Card4"><a href="PageRecipe.php?id=<?php echo $data['oldest1']['IDRecette']; ?>" class="fill-div"><img src="Images/<?php echo $data['oldest1']['Image'] ?>" class="IMGButton4">
            <div class="Test4">
            <div class="title"><?php echo $data['oldest1']['Titre'] ?></div>
            <div class="name"><?php echo $data['oldest1']['Pseudo'] ?></div>
            </div>
            </a></button>
    <button class="Card5"><a href="PageRecipe.php?id=<?php echo $data['oldest2']['IDRecette']; ?>" class="fill-div"><img src="Images/<?php echo $data['oldest2']['Image'] ?>" class="IMGButton5">
            <div class="Test5">
            <div class="title"><?php echo $data['oldest2']['Titre'] ?></div>
            <div class="name"><?php echo $data['oldest2']['Pseudo'] ?></div>
            </div>
            </a></button>
    <button class="Card6"><a href="PageRecipe.php?id=<?php echo $data['oldest3']['IDRecette']; ?>" class="fill-div"><img src="Images/<?php echo $data['oldest3']['Image'] ?>" class="IMGButton6">
            <div class="Test6">
            <div class="title"><?php echo $data['oldest3']['Titre'] ?></div>
            <div class="name"><?php echo $data['oldest3']['Pseudo'] ?></div>
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