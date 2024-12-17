<?php

 session_start();

 $id = $_GET['id'] ?? null;

 // Si un ID est présent, récupère les données de l'API
 if ($id) {

    $url = "http://localhost/Rattrapage_Bloc_3/api/recetteMods/$id";
//var_dump($url);
$response = file_get_contents($url);

$response = mb_convert_encoding($response, 'UTF-8', 'auto');
//echo htmlspecialchars($response);

$data = json_decode($response, true);

// Vérifie si une erreur s'est produite lors du décodage
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Erreur lors du décodage JSON: " . json_last_error_msg();
} else {
    //var_dump($data);  // Vérifie les données décodées
}

     /*$data = json_decode(file_get_contents("http://localhost/Rattrapage_Bloc_3/api/recetteMods/$id"), true);
     var_dump($data);
     var_dump($id);*/
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
            <a href="index.php">Déconnexion</a>
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
                Bonjour hahaha je souffre
            </div>
            <h2 class="H2">Préparation :</h2>
            <div class="Desc"><?php echo $data['Description'] ?></div>
        </div>
        <button class="Valider" name="Envoyer" a href="afficherecetteMods.php">Valider</button>

        <button class="Refuser" id="deleteButton">Refuser</button>


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

<script>
document.getElementById('deleteButton').addEventListener('click', function() {
    const id = "<?php echo $id; ?>";

    if (confirm("Voulez-vous vraiment supprimer cette recette ?")) {
        fetch(`http://localhost/Rattrapage_Bloc_3/api/recetteMods/${id}`, {
            method: 'DELETE',
        })
        .then(response => response.json())
.then(data => {
    console.log(data); // Affiche la réponse dans la console
    if (response.ok) {
        alert(data.message);
        window.location.href = 'PageMainMods.php';
    } else {
        throw new Error(data.error);
       window.location.href = 'PageMainMods.php';
    }
})
.catch(error => {
    console.error('Erreur :', error);
    alert(error.message);
})
    }
});