<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon" href= "../../../Ressources/stir-fry.png">
    <link rel="stylesheet" href="PageIngrMods.css">
    
</head>

<body>
    <header>
    <div class="container">
        <button class="Menu_Back"><a href="http://127.0.0.1:5500/PageUser.php" class="fill-div"></a></button>
    </div>
    </header>

    <main>
        <div>
            <h2 class="Ingrédient">Proposer un ingrédient :</h2>
        </div>
        <div id="display-image">
            
                <img src="">

        </div>
        <div class="FormIng">
            <form action="/action_page.php" class="Form">
              <label for="Image" class="ImageStyle">Upload</label>
              <input type="file" id="Image" name="firstname" placeholder="Image">

              <div class="Nom">Oignon</div>
          
              <label for="Categorie" class="Cat">Catégorie :</label>
              <div class="Catégorie">Légumes</div>
            
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