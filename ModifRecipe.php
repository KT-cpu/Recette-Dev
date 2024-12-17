<?php


require_once('addrecipe.php');

$id = $_GET['id'] ?? null;

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon">
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
            <h2 class="Ingrédient">Modifier la Recette :</h2>
        </div>

        <div class="FormRec">
            <form class="Form" method='POST' enctype="multipart/form-data" action="modifRecette.php">
              <label for="Image" class="ImageStyle">Upload</label>
              <input type="file" id="Image" name="image" placeholder="Image" required>
          
              <label for="Nom" class="H2">Ajouter le nom de la recette :</label>
              <input type="text" id="Nom" name="Nom" placeholder="Nom de la recette" required>
          
              <label for="ingredient-list" class="H2">Sélectionnez des ingrédients :</label>

              <ul class="ingredient-list">
            <?php foreach ($ingrédients as $ingredient): ?>
                <li>
                    <label>
                        <input type="checkbox" name="selectedIngredients[]" value="<?= htmlspecialchars($ingredient['IDIng']) ?>">
                        <?= htmlspecialchars($ingredient['Nom']) ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>

              <div class="selection" id="selectedIngredients"></div>

            
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
            <div class="AddIng">Pensez à ajouter la quantité pour vos ingrédients :</div>
            <textarea class="Desc" name="Desc" rows="5" cols="50" required></textarea>
             </div>
             <input type="submit" name="update" value="Modidier" class="Modifier">
             <input type="hidden" name="id" value="<?php echo $id; ?>">
            </form>
          </div>
    </main>

    <footer class="Footer">
        <div> 
        <div class="FooterTxT">Mon Footer</div>
        </div>
    </footer>
</body>

<script>
        document.addEventListener('DOMContentLoaded', () => {
            const items = document.querySelectorAll('.ingredient-list li');

            // Ajoute le comportement de sélection par clic gauche
            items.forEach(item => {
                item.addEventListener('click', () => {
                    const checkbox = item.querySelector('input[type="checkbox"]');
                    checkbox.checked = !checkbox.checked;
                    item.classList.toggle('selected', checkbox.checked);
                });
            });
        });
    </script>