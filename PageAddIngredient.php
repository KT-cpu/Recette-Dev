<?php 

require_once('adding.php');

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon" href= "../../Rattrapage Bloc 3/Ressources/stir-fry.png">
    <link rel="stylesheet" href="PageAddIngredient.css">
    
</head>

<body>
    <header>
    <div class="container">
        <button class="Menu_Back"><a href="PageUser.php" class="fill-div"></a></button>
    </div>
    </header>

    <main>
        <div>
            <h2 class="Ingrédient">Proposer un ingrédient :</h2>
        </div>

        <div class="FormIng">
            <form method="POST" class="Form" enctype="multipart/form-data">
            
              <label for="Image" class="ImageStyle">Upload</label>
              <input type="file" id="Image" name="image" placeholder="Image">
              
          
              <label for="Nom"></label>
              <input type="text" id="Nom" name="Nom" placeholder="Nom de l'ingrédient">
          
              <label for="Categorie" class="Cat">Sélectionnez une catégorie :</label>
              <select id="Categorie" name="Categorie">
                <option value="">- - -</option>
                <option value="1">Fruits</option>
                <option value="2">Légumes</option>
                <option value="3">Viandes</option>
                <option value="4">Poissons</option>
                <option value="5">Oeufs</option>
                <option value="6">Féculents</option>
                <option value="7">Produits laitiers</option>
                <option value="8">Produits Transformés</option>
              </select>
            
              <button type="submit" name="submit" value="submit" class="Valider">Submit</button>
            </form>
          </div>
    </main>

    <footer class="Footer">
        <div>
        <div class="FooterTxT">Mon Footer</div>
        </div>
    </footer>
</body>