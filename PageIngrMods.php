<?php

//require_once("afficheIng.php");
//require_once("testdelete.php");

session_start();

 $id = $_GET['id'] ?? null;

 // Si un ID est présent, récupère les données de l'API
 if ($id) {
    $data = json_decode(file_get_contents("http://localhost/Rattrapage_Bloc_3/api/IngrMods/$id"), true);
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="PageIngrMods.css">
    
</head>

<body>
    <header>
    <div class="container">
        <button class="Menu_Back"><a href="PageMainMods.php" class="fill-div"></a></button>
    </div>
    </header>

    <main>
        <div>
        <div class="Recette">
            <img src="Images/<?php echo $data['File'] ?>" class="IMGIng">
            <div class="Nom"><?php echo $data['Nom'] ?></div>
            <div class="Cat"><?php echo $data['Cat'] ?></div>
        </div>
        </div>
        <div id="display-image">
        <form method="POST" action="validateIng.php">
        <input type="hidden" name="action" value="accepte">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button class="Valider" name="Envoyer">Valider</button>

        <form method="POST" action="deleteIng.php">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button class="Refuser" name="Delete">Refuser</button>

    </main>

    <footer class="Footer">
        <div>
        <div class="FooterTxT">Mon Footer</div>
        </div>
    </footer>
</body>