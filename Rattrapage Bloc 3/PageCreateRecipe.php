<?php
var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon" href= "../../Rattrapage Bloc 3/Ressources/stir-fry.png">
    <link rel="stylesheet" href="PageCreateRecipe.css">
    
</head>



<body>
    <header>
    <div class="container">
        <button class="Menu_Back"><a href="PageUser.php" class="fill-div"></a></button>
    </div>
    </header>

    <main>
        <div>
            <h2 class="Ingrédient">Nouvelle Recette :</h2>
        </div>
        <div id="display-image">
            
                <img src="">

        </div>
        <div class="FormRec">
            <form class="Form" method='post'>
              <label for="Image" class="ImageStyle">Upload</label>
              <input type="file" id="Image" name="Image" placeholder="Image">
          
              <label for="Nom" class="H2">Ajouter le nom de la recette :</label>
              <input type="text" id="Nom" name="Nom" placeholder="Nom de la recette">
          
              <label for="Categorie" class="H2">Recherche des ingrédients :</label>
              <input type="text" id="Ing" name="Ing" >
              <select id="Categorie" name="Categorie">
                <option value="">- - -</option>
                <option value="Fruits">Fruits</option>
                <option value="Légumes">Légumes</option>
                <option value="Viandes">Viandes</option>
                <option value="Poissons">Poissons</option>
                <option value="Oeufs">Oeufs</option>
                <option value="Féculents">Féculents</option>
                <option value="Viandes">Produits laitiers</option>
                <option value="Matières Grasses">Matières Grasses</option>
                <option value="Produits Transformés">Produits Transformés</option>
              </select>

              <div class="Ingrédients">
                <button class="Card1"><img src="" class="IMGButton1">
                    <div class="name">Lait</div>
                </a></button>
                <button class="Card2"><img src="" class="IMGButton2">
                    <div class="name">Vanille</div>
                </a></button>
                <button class="Card3"><img src="" class="IMGButton3">
                    <div class="name">Riz</div>
                </a></button>
                <button class="Card4"><img src="" class="IMGButton1">
                    <div class="name">Lait</div>
                </a></button>
                <button class="Card5"><img src="" class="IMGButton2">
                    <div class="name">Vanille</div>
                </a></button>
                <button class="Card6"><img src="" class="IMGButton3">
                    <div class="name">Riz</div>
                </a></button>
                <button class="Card7"><img src="" class="IMGButton1">
                    <div class="name">Lait</div>
                </a></button>
                <button class="Card8"><img src="" class="IMGButton2">
                    <div class="name">Vanille</div>
                </a></button>
                <button class="Card9"><img src="" class="IMGButton3">
                    <div class="name">Riz</div>
                </a></button>
                <button class="Card10"><img src="" class="IMGButton1">
                    <div class="name">Lait</div>
                </a></button>
            </div>
            <div>
            <label for="TempsNec" class="H2">Temps Nécessaire :</label>
            <input type="time" class="Tps" name="Tps" min="00:05" max="23:59" required/>
            </div>

            <div>
            <label for="Portion" class="H2"> Portions : </label>
            <div class="StylePortion">Pour <input type="number" class="Portion" name="Portion" min = "1" max = "20" placeholder = "0" required/> personnes</div>
            </div>

            <div class="Prep">
            <div class="H2">Préparation :</div>
            <textarea class="Desc" name="Desc" rows="5" cols="50"></textarea>
             </div>
             <input type="submit" value="Valider" class="Valider">
            </form>
          </div>
    </main>

    <footer class="Footer">
        <div> 
        <div class="FooterTxT">Mon Footer</div>
        </div>
    </footer>
</body>