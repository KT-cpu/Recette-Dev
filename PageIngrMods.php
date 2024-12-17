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
        <button class="Valider" name="Envoyer" a href="afficherecetteMods.php">Valider</button>

        <button class="Refuser" id="deleteButton">Refuser</button>

    </main>

    <footer class="Footer">
        <div>
        <div class="FooterTxT">Mon Footer</div>
        </div>
    </footer>
</body>

<script>
document.getElementById('deleteButton').addEventListener('click', function() {
    const id = "<?php echo $id; ?>";

    if (confirm("Voulez-vous vraiment supprimer cet ingrédient ?")) {
        fetch(`http://localhost/Rattrapage_Bloc_3/api/IngrMods/${id}`, {
            method: 'DELETE',
        })
        .then(response => response.json())
.then(data => {
    console.log(data); // Affiche la réponse dans la console
    if (response.ok) {
        alert(data.message);
        window.location.href = 'PageMainMods.php';
    } else {
       // throw new Error(data.error);
       window.location.href = 'PageMainMods.php';
    }
})
.catch(error => {
    console.error('Erreur :', error);
    alert(error.message);
})
    }
});

</script>
