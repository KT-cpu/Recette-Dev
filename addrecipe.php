<?php 

session_start();

$MyID = $_SESSION['user_id'];
$_SESSION['message_form'] = array();
//$_SESSION['value_form'] = array();

$con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


$query = $con->query("SELECT IDIng, Nom FROM base_ingredients");
$ingrédients = $query->fetchAll(PDO::FETCH_ASSOC);

// Traitement du formulaire pour insérer les ingrédients sélectionnés
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $titreRecette = $_POST['Nom'];
    //$_SESSION['value_form']['titreRecette'] = $titreRecette;
    if(empty($titreRecette)) {$_SESSION['message_form'][] = 'Le titre de la recette doit être rempli';}

    $temps = $_POST['Tps'];
    //$_SESSION['value_form']['temps'] = $temps;
    if(empty($temps)) {$_SESSION['message_form'][] = 'Le temps de la recette doit être rempli';}

    $portion = $_POST['Portion'];
    //$_SESSION['value_form']['portion'] = $portion;
    if(empty($portion)) {$_SESSION['message_form'][] = 'Le nombre de portion pour la recette doit être rempli';}

    $description = $_POST['Desc'];
    //$_SESSION['value_form']['description'] = $description;
    if(empty($description)) {$_SESSION['message_form'][] = 'Veuillez entrer les étapes de votre recette';}

    $selectedIngredientIds = isset($_POST['selectedIngredients']) ? $_POST['selectedIngredients'] : [];
    //$_SESSION['value_form']['selectedIngredientIds'] = $selectedIngredientIds;
    if(empty($selectedIngredientIds)) {$_SESSION['message_form'][] = "Veuillez sélectionner des ingrédients pour votre recette. Si vous ne trouvez pas l'ingrédient qu'il vous faut, n'hésitez pas à nous soumettre l'ingrédient dans l'onglet 'Soumettre un nouvel ingrédient' situé en base de votre profil";}

    // Gestion de l'upload de l'image
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'Images/' .$file_name;
    if(move_uploaded_file($tempname, $folder)) {
        echo "FILE UPLOADED !!!!";
    } else {
        echo "The file couldn't be uploaded";
    }

    if(count($_SESSION['message_form']) == 0)
    {
    try {
        // Insertion de la recette dans la table check_recette
        $stmtRecette = $con->prepare("INSERT INTO check_recettes (Titre, File, Temps, Portion, Description, IDUsers) VALUES (:titre, :image, :temps, :portion, :description, '$MyID')");
        $stmtRecette->execute([
            'titre' => $titreRecette,
            'image' => $file_name,
            'temps' => $temps,
            'portion' => $portion,
            'description' => $description
        ]);

        // Récupération de l'ID de la recette insérée
        $recetteId = $con->lastInsertId();

        // Insertion des ingrédients sélectionnés dans la table check_recette_ingredient
        if (!empty($selectedIngredientIds)) {
            $stmtIngr = $con->prepare("INSERT INTO check_recette_ingredient (IDRecette, IDIng) VALUES (:recette_id, :ingredient_id)");
            foreach ($selectedIngredientIds as $ingredientId) {
                $stmtIngr->execute([
                    'recette_id' => $recetteId,
                    'ingredient_id' => $ingredientId
                ]);
            }
        }

        //echo "<p style='color: green;'>Recette et ingrédients enregistrés avec succès !</p>";
        unset($_SESSION['value_form']);       // efface les valeurs des champs du formulaire si tout est correct
        header("Location: PageUser.php");
        exit;
     

    } catch (PDOException $e) {
        echo "<p style='color: red;'>Erreur : " . $e->getMessage() . "</p>";
    }
}
}

?>




