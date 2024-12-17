<?php

 //require_once("recipesMods.php");
 session_start();

 $data = json_decode(file_get_contents("http://localhost/Rattrapage_Bloc_3/api/accueilMods"), true);

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="PageMainMods.css">
    
</head>

<?php if ($_SESSION['user_role'] === 1): ?>
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
        <button class="Card1"><a href="PageRecipeMods.php?id=<?php echo $data['RecipeSubmit1']['IDCheckRecette']; ?>" class="fill-div"><img src="Images/<?php echo $data['RecipeSubmit1']['File'] ?>" class="IMGButton1">
            <div class="Test">
            <div class="title"><?php echo $data['RecipeSubmit1']['Titre'] ?></div>
            <div class="name"><?php echo $data['RecipeSubmit1']['Pseudo'] ?></div>
            </div>
        </a></button>
        <button class="Card2"><a href="PageRecipeMods.php?id=<?php echo $data['RecipeSubmit2']['IDCheckRecette']; ?>" class="fill-div"><img src="Images/<?php echo $data['RecipeSubmit2']['File'] ?>" class="IMGButton2">
            <div class="Test2">
            <div class="title"><?php echo $data['RecipeSubmit2']['Titre'] ?></div>
            <div class="name"><?php echo $data['RecipeSubmit2']['Pseudo'] ?></div>
            </div>
        </a></button>
        <button class="Card3"><a href="PageRecipeMods.php?id=<?php echo $data['RecipeSubmit3']['IDCheckRecette']; ?>" class="fill-div"><img src="Images/<?php echo $data['RecipeSubmit3']['File'] ?>" class="IMGButton3">
            <div class="Test3">
            <div class="title"><?php echo $data['RecipeSubmit3']['Titre'] ?></div>
            <div class="name"><?php echo $data['RecipeSubmit3']['Pseudo'] ?></div>
            </div>
        </a></button>
   </div>
    </div>
    <hr class="HR">
    <div class="Recettes">
   <h2 class="H2Receip">Ingrédients en attentes :</h2>
   <div>
    <button class="Card4"><a href="PageIngrMods.php?id=<?php echo $data['IngSubmit1']['IDCheckIng']; ?>" class="fill-div"><img src="Images/<?php echo $data['IngSubmit1']['File'] ?>" class="IMGButton3">
            <div class="Test4">
            <div class="title"><?php echo $data['IngSubmit1']['Nom'] ?></div>
            <div class="name"><?php echo $data['IngSubmit1']['Pseudo'] ?></div>
            </div>
        </a></button>
    <button class="Card5"><a href="PageIngrMods.php?id=<?php echo $data['IngSubmit2']['IDCheckIng']; ?>" class="fill-div"><img src="Images/<?php echo $data['IngSubmit2']['File'] ?>" class="IMGButton3">
            <div class="Test5">
            <div class="title"><?php echo $data['IngSubmit2']['Nom'] ?></div>
            <div class="name"><?php echo $data['IngSubmit2']['Pseudo'] ?></div>
            </div>
        </a></button>
    <button class="Card6"><a href="PageIngrMods.php?id=<?php echo $data['IngSubmit3']['IDCheckIng']; ?>" class="fill-div"><img src="Images/<?php echo $data['IngSubmit3']['File'] ?>" class="IMGButton3">
            <div class="Test6">
            <div class="title"><?php echo $data['IngSubmit3']['Nom'] ?></div>
            <div class="name"><?php echo $data['IngSubmit3']['Pseudo'] ?></div>
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
<?php else: ?>
    <?php echo "Vous ne possédez pas les droits pour accéder à cette page"; ?>
<?php endif; ?>