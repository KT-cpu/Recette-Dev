<?php

session_start();

$id = $_SESSION['user_id'];

$data = json_decode(file_get_contents("http://localhost/Rattrapage_Bloc_3/api/Recipeuser/$id"), true);


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="PageUser.css">
    
</head>

<body>
    <header>
    <div class="container">
        <button class="Menu_Back"><a href="PageMain.php" class="fill-div"></a></button>
    <div>
        <button class="Menu_User"><a href="" class="fill-div"></a></button>
        <div class="Username"><?php echo $_SESSION['user_pseudo'] ?></div>
    </div>
    <div class="dropdown">
        <button class="Menu_Hamburger"><a href="" class="fill-div"></a></button>
        <div class="dropdown-content">
            <a href="PageMainDeco.php" action="disconnect.php">Déconnexion</a>
          </div>
    </div>
    </div>
    </header>

    <main>

        <div>
        <h2 class="Recettes">Mes dernières recettes :</h2>
        <?php if ($data > 0): ?>
        <button class="Card1"><a href="PageRecipe.php?id=<?php echo $data['MyRecipe1']['IDRecette'] ?>" class="fill-div"><img src="Images/<?php echo $data['MyRecipe1']['Image'] ?>" class="IMGButton1">
            <div class="Test">
            <div class="title"><?php echo $data['MyRecipe1']['Titre'] ?></div>
            <div class="name"><?php echo $data['MyRecipe1']['Pseudo'] ?></div>
            </div>
        </a></button>
            <?php if ($data > 0): ?>
        <button class="Card2"><a href="PageRecipe.php?id=<?php echo $data['MyRecipe2']['IDRecette'] ?>" class="fill-div"><img src="Images/<?php echo $data['MyRecipe2']['Image'] ?>" class="IMGButton2">
            <div class="Test2">
            <div class="title"><?php echo $data['MyRecipe2']['Titre'] ?></div>
            <div class="name"><?php echo $data['MyRecipe2']['Pseudo'] ?></div>
            </div>
        </a></button>
                <?php if ($data > 0): ?>
        <button class="Card3"><a href="PageRecipe.php?id=<?php echo $data['MyRecipe3']['IDRecette'] ?>" class="fill-div"><img src="Images/<?php echo $data['MyRecipe3']['Image'] ?>" class="IMGButton3">
            <div class="Test3">
            <div class="title"><?php echo $data['MyRecipe3']['Titre'] ?></div>
            <div class="name"><?php echo $data['MyRecipe3']['Pseudo'] ?></div>
            </div>
        </a></button>
                    <?php endif; ?>
                <?php endif; ?>
        <?php else: ?>
            <p class="RecetteVide"> Vous n'avez créer aucune recette pour le moment </p>
        <?php endif; ?>
        
        </div>
        
        <hr class="HR">

        <div>
        <h2 class="RecettesEnCours">Recettes en cours de validation :</h2>
        <?php if ($data > 0): ?>
        <button class="Card1"><a href="ModifRecipe.php?id=<?php echo $data['SubmittedRecipe1']['IDCheckRecette'] ?>" class="fill-div"><img src="Images/<?php echo $data['SubmittedRecipe1']['File'] ?>" class="IMGButton1">
            <div class="Test">
            <div class="title"><?php echo $data['SubmittedRecipe1']['Titre'] ?></div>
            <div class="name"><?php echo $data['SubmittedRecipe1']['Pseudo'] ?></div>
            </div>
        </a></button>
            <?php if ($data > 0): ?>
        <button class="Card2"><a href="PageRecipe.php?id=<?php echo $data['SubmittedRecipe2']['IDCheckRecette'] ?>" class="fill-div"><img src="Images/<?php echo $data['SubmittedRecipe2']['File'] ?>" class="IMGButton2">
            <div class="Test2">
            <div class="title"><?php echo $data['SubmittedRecipe2']['Titre'] ?></div>
            <div class="name"><?php echo $data['SubmittedRecipe2']['Pseudo'] ?></div>
            </div>
        </a></button>
                <?php if ($data > 0): ?>
        <button class="Card3"><a href="PageRecipe.php?id=<?php echo $data['SubmittedRecipe3']['IDCheckRecette'] ?>" class="fill-div"><img src="Images/<?php echo $data['SubmittedRecipe3']['File'] ?>" class="IMGButton3">
            <div class="Test3">
            <div class="title"><?php echo $data['SubmittedRecipe3']['Titre'] ?></div>
            <div class="name"><?php echo $data['SubmittedRecipe3']['Pseudo'] ?></div>
            </div>
        </a></button>
        <?php endif; ?>
                    <?php endif; ?>
        <?php else: ?>
            <p class="RecetteVide"> Vous n'avez créer aucune recette pour le moment </p>
        <?php endif; ?>
        </div>
        <hr class="HR">

        <div>
        <h2 class="RecettesEnCours">Ingrédients en cours de validation :</h2>
        <?php if ($data > 0): ?>
        <button class="Card1"><a href="ModifIngr.php?id=<?php echo $data['SubmittedIngr1']['IDCheckIng'] ?>" class="fill-div"><img src="Images/<?php echo $data['SubmittedIngr1']['File'] ?>" class="IMGButton1">
            <div class="Test">
            <div class="title"><?php echo $data['SubmittedIngr1']['Nom'] ?></div>
            <div class="name"><?php echo $data['SubmittedIngr1']['Pseudo'] ?></div>
            </div>
        </a></button>
            <?php if ($data > 0): ?>
        <button class="Card2"><a href="ModifIngr.php?id=<?php echo $data['SubmittedIngr2']['IDCheckIng'] ?>" class="fill-div"><img src="Images/<?php echo $data['SubmittedIngr2']['File'] ?>" class="IMGButton2">
            <div class="Test2">
            <div class="title"><?php echo $data['SubmittedIngr2']['Nom'] ?></div>
            <div class="name"><?php echo $data['SubmittedIngr2']['Pseudo'] ?></div>
            </div>
        </a></button>
                <?php if ($data > 0): ?>
        <button class="Card3"><a href="ModifIngr.php?id=<?php echo $data['SubmittedIngr3']['IDCheckIng'] ?>" class="fill-div"><img src="Images/<?php echo $data['SubmittedIngr3']['File'] ?>" class="IMGButton3">
            <div class="Test3">
            <div class="title"><?php echo $data['SubmittedIngr3']['Nom'] ?></div>
            <div class="name"><?php echo $data['SubmittedIngr3']['Pseudo'] ?></div>
            </div>
        </a></button>
        <?php endif; ?>
                    <?php endif; ?>
        <?php else: ?>
            <p class="RecetteVide"> Vous n'avez créer aucune ingrédient pour le moment </p>
        <?php endif; ?>
        </div>
        <hr class="HR">


        <div>
        <button class="Card4 "><a href="PageCreateRecipe.php" class="fill-div"><img src="../../Rattrapage_Bloc_3/Ressources/recette.jpg" class="IMGButton4">
            <div class="Test4">
            <div class="name">Créer une nouvelle recette</div>
            </div>
        </a></button>
        <button class="Card5"><a href="PageAddIngredient.php" class="fill-div"><img src="../../Rattrapage_Bloc_3/Ressources/ingrédients.jpg" class="IMGButton4">
            <div class="Test5">
            <div class="name">Soumettre un nouvel ingrédient</div>
            </div>
        </a></button>
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