<?php

 session_start();

 $id = $_GET['id'] ?? null;

 // Si un ID est présent, récupère les données de l'API
 if ($id) {
     $data = json_decode(file_get_contents("http://localhost/Rattrapage_Bloc_3/api/recetteMods/$id"), true);
 }

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="PageRecipeMods.css">
    
</head>

<?php if ($_SESSION['user_role'] === 1): ?>
<body>
    <header>
    <div class="container">
        <button class="Menu_Back"><a href="PageMainMods.php" class="fill-div"></a></button>
    <div class="dropdown">
        <button class="Menu_User"><a href="PageMods.php" class="fill-div"></a></button>
        <div class="dropdown-content">
            <a href="PageMods.php">Mon Espace</a>
            <a href="PageMainDeco.php">Déconnexion</a>
          </div>
    </div>
    </div>
    </header>
    <main>
        <div class="Recette">
            <img src="Images/<?php echo $data['File'] ?>" class="IMGRecette">
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
        <form method="POST" action="validate.php">
        <input type="hidden" name="action" value="accepte">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button class="Valider" name="Envoyer">Valider</button>
        <form method="POST" action="delete.php">
        <input type="hidden" name="action" value="refuser">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button class="Refuser" name="Supprimer">Refuser</button>


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
    <?php else: ?>
    <?php echo "Vous ne possédez pas les droits pour accéder à cette page"; ?>
<?php endif; ?>