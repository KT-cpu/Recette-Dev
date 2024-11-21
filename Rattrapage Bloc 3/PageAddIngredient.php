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
        <div id="display-image">
            
                <img class="preview" src="">

        </div>

        <script>
            const inputPhoto = document.getElementById('Image');
            const image = document.getElementById('preview');
            
            inputPhoto.onchange = function(event) {
                const file = event.target.files[0];
                const reader = new FileReader();
            
                reader.onload = function(e) {
                    image.src = e.target.result;
                };
            
                reader.readAsDataURL(file);
            };
        </script>

        <div class="FormIng">
            <form action="#" class="Form">
              <label for="Image" class="ImageStyle">Upload</label>
              <input type="file" id="Image" name="firstname" placeholder="Image" accept="image/png, image/jpeg">
              
          
              <label for="Nom"></label>
              <input type="text" id="Nom" name="Nom" placeholder="Nom de l'ingrédient">
          
              <label for="Categorie" class="Cat">Sélectionnez une catégorie :</label>
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