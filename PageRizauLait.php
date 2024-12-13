<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon" href= "../../Rattrapage Bloc 3/Ressources/stir-fry.png">
    <link rel="stylesheet" href="PageRizauLait.css">
    
</head>

<body>
    <header>
    <div class="container">
        <button class="Menu_Back"><a href="PageMain.php" class="fill-div"></a></button>
    <div class="dropdown">
        <button class="Menu_User"><a href="PageUser.php" class="fill-div"></a></button>
        <div class="dropdown-content">
            <a href="PageUser.php">Mon Espace</a>
            <!--<a href="PageCreateRecipe.php">Modifier ma recette</a>-->
            <a href="PageCreateRecipe.php">Créer une recette</a>
            <a href="PageAddIngredient.php">Ajouter un ingrédient</a>
            <a href="PageMainDeco.php">Déconnexion</a>
    </div>
    </header>
    <main>
        <div class="Recette">
            <img src="../../Rattrapage Bloc 3/Ressources/rizaulait1.jpg" class="IMGRecette">
            <div class="Title">Riz au Lait</div>
            <div class="Username">Elize</div>
            <h2 class="H2">Temps de Préparation :</h2>
            <div class="TempsPrépa"> 1 Heure de préparation</div>
            <h2 class="H2">Ingrédients :</h2>
            <div class="Ingrédients">
                <button class="Card1"><img src="../../Rattrapage Bloc 3/Ressources/milk.jpg" class="IMGButton1">
                    <div class="name">Lait</div>
                </a></button>
                <button class="Card2"><img src="../../Rattrapage Bloc 3/Ressources/extrait-de-vanille.jpg" class="IMGButton2">
                    <div class="name">Vanille</div>
                </a></button>
                <button class="Card3"><img src="../../Rattrapage Bloc 3/Ressources/rice.jpg" class="IMGButton3">
                    <div class="name">Riz</div>
                </a></button>
            </div>
            <button class="Quantités">1</button>
            <h2 class="H2">Préparation :</h2>
            <div class="Desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum quo, modi voluptatem corporis ex omnis dignissimos voluptas fuga cupiditate, natus recusandae unde vel voluptate a. Placeat fugit magni quae delectus?</div>
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