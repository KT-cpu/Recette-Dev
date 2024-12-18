<?php
 
 session_start();

 $id = $_GET['id'] ?? null;

 // Si un ID est présent, récupère les données de l'API
 if ($id) {
     $data = json_decode(file_get_contents("http://localhost/Rattrapage_Bloc_3/api/recette/$id"), true);
 }
 
 //var_dump($data);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="PageRecipe.css">
    
</head>

<body>
    <header>
    <div class="container">
        <button class="Menu_Back"><a href="PageMain.php" class="fill-div"></a></button>
    <div class="dropdown">
        <button class="Menu_User"><a href="PageUser.php" class="fill-div"></a></button>
        <div class="dropdown-content">
        <?php if ($_SESSION['user_role'] === 2): ?>
            <a href="PageUser.php">Mon Espace</a>
            <!--<a href="PageCreateRecipe.php">Modifier ma recette</a>-->
            <a href="PageCreateRecipe.php">Créer une recette</a>
            <a href="PageAddIngredient.php">Ajouter un ingrédient</a>
            <a href="PageMainDeco.php" action="disconnect.php">Déconnexion</a>
            <?php else: ?>
                <a href="PageLogin.php">Connexion</a>
            <a href="PageSignIn.php">Inscription</a>
            <?php endif; ?>
    </div>
    </header>
    <main>
        <div class="Recette">
            <img src="Images/<?php echo $data['Image'] ?>" class="IMGRecette">
            <div class="Title"><?php echo $data['Titre'] ?></div>
            <div class="Username"><?php echo $data['Pseudo'] ?></div>
            <h2 class="H2">Nombre de portions :</h2>
            <div class="Quantité"><?php echo $data['Portion'] ?></div>
            <h2 class="H2">Temps de Préparation :</h2>
            <div class="TempsPrépa"><?php echo $data['Temps'] ?></div>
            <h2 class="H2">Ingrédients :</h2>
            <div class="Ingrédients">
                <?php foreach ($data['Nom'] as $ingredient): ?>
                <li><?= htmlspecialchars($ingredient) ?></li>
                <?php endforeach; ?>
            </div>
            <h2 class="H2">Préparation :</h2>
            <div class="Desc"><?php echo $data['Description'] ?></div>
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