<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon" href= "../../../Ressources/stir-fry.png">
    <link rel="stylesheet" href="PageMainDeco.css">
    
</head>

<body>
    <header>
    <div class="container">
        <button class="Menu_Principal"><a href="http://127.0.0.1:5500/PageMain.php" class="fill-div"></a></button>
    <div>
        <form name="searchbar" method="get">
            <input type="text" name="keywords" placeholder="Recherche" class="BarreRecherche"/>
            <!--<input type="submit" name="valider" value="test" class="Valider"/>-->
        </form>
    </div>
    <div>
        <button class="Menu_User"><a href="" class="fill-div"></a></button>
    </div>
    </div>
    </header>
    <main>
    <div class="Nouveau">
   <h2 class="H2New">Nouveautés :</h2>
   <div>
        <button class="Card1"><a href="http://127.0.0.1:5500/PageRizauLait.php" class="fill-div"><img src="../../../Ressources/rizaulait1.jpg" class="IMGButton1">
            <div class="Test">
            <div class="title">Riz au Lait</div>
            <div class="name">Marie</div>
            </div>
        </a></button>
        <button class="Card2"><a href="" class="fill-div"><img src="../../../Ressources/pancakes1.jpg" class="IMGButton2">
            <div class="Test2">
            <div class="title">Pancakes</div>
            <div class="name">Elize</div>
            </div>
        </a></button>
        <button class="Card3"><a href="" class="fill-div"><img src="../../../Ressources/applepie.jpg" class="IMGButton3">
            <div class="Test3">
            <div class="title">Tarte au Pommes</div>
            <div class="name">Marie</div>
            </div>
        </a></button>
   </div>
    </div>
    <hr class="HR">
    <div class="Recettes">
   <h2 class="H2Receip">Recettes de saison :</h2>
   <div>
    <button class="Card4">Card 4</button>
    <button class="Card5">Card 5</button>
    <button class="Card6">Card 6</button>
   </div>
    </div>
</main>

<footer class="Footer">
    <div>
    <div class="FooterTxT">Mon Footer</div>
    </div>
</footer>
</body>