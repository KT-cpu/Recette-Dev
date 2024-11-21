<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon" href= "../../Rattrapage Bloc 3/Ressources/stir-fry.png">
    <link rel="stylesheet" href="PageUser.css">
    
</head>

<body>
    <header>
    <div class="container">
        <button class="Menu_Back"><a href="" class="fill-div"></a></button>
    <div>
        <button class="Menu_User"><a href="" class="fill-div"></a></button>
        <div class="Username">Elize</div>
    </div>
    <div class="dropdown">
        <button class="Menu_Hamburger"><a href="" class="fill-div"></a></button>
        <div class="dropdown-content">
            <a href="PageMainDeco.php">Déconnexion</a>
          </div>
    </div>
    </div>
    </header>

    <main>

        <div>
        <h2 class="Recettes">Mes Recettes :</h2>
        <button class="Card1"><a href="PageRizauLait.php" class="fill-div"><img src="../../Rattrapage Bloc 3/Ressources/rizaulait1.jpg" class="IMGButton1">
            <div class="Test">
            <div class="title">Riz au Lait</div>
            <div class="name">Elize</div>
            </div>
        </a></button>
        <button class="Card2"><a href="" class="fill-div"><img src="../../Rattrapage Bloc 3/Ressources/pancakes1.jpg" class="IMGButton2">
            <div class="Test2">
            <div class="title">Pancakes</div>
            <div class="name">Elize</div>
            </div>
        </a></button>
        <button class="Card3"><a href="" class="fill-div"><img src="../../Rattrapage Bloc 3/Ressources/applepie.jpg" class="IMGButton3">
            <div class="Test3">
            <div class="title">Tarte au Pommes</div>
            <div class="name">Elize</div>
            </div>
        </a></button>
        </div>

        <div>
        <button class="Card4 "><a href="PageCreateRecipe.php" class="fill-div"><img src="../../Rattrapage Bloc 3/Ressources/recette.jpg" class="IMGButton4">
            <div class="Test4">
            <div class="name">Créer une nouvelle recette</div>
            </div>
        </a></button>
        <button class="Card5"><a href="PageAddIngredient.php" class="fill-div"><img src="../../Rattrapage Bloc 3/Ressources/ingrédients.jpg" class="IMGButton4">
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