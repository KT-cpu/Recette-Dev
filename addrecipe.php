<?php 

session_start();

$MyID = $_SESSION['user_id'];

$con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


$query = $con->query("SELECT IDIng, Nom FROM base_ingredients");
$ingrédients = $query->fetchAll(PDO::FETCH_ASSOC);

// Traitement du formulaire pour insérer les ingrédients sélectionnés
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $titreRecette = $_POST['Nom'];
    $temps = $_POST['Tps'];
    $portion = $_POST['Portion'];
    $description = $_POST['Desc'];
    $selectedIngredientIds = isset($_POST['selectedIngredients']) ? $_POST['selectedIngredients'] : [];

    // Gestion de l'upload de l'image
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'Images/' .$file_name;
    if(move_uploaded_file($tempname, $folder)) {
        echo "FILE UPLOADED !!!!";
    } else {
        echo "The file couldn't be uploaded";
    }

    try {
        // Insertion de la recette dans la table recette
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

        // Insertion des ingrédients sélectionnés dans la table ingrédients_recette
        if (!empty($selectedIngredientIds)) {
            $stmtIngr = $con->prepare("INSERT INTO check_recette_ingredient (IDRecette, IDIng) VALUES (:recette_id, :ingredient_id)");
            foreach ($selectedIngredientIds as $ingredientId) {
                $stmtIngr->execute([
                    'recette_id' => $recetteId,
                    'ingredient_id' => $ingredientId
                ]);
            }
        }

        echo "<p style='color: green;'>Recette et ingrédients enregistrés avec succès !</p>";

    } catch (PDOException $e) {
        echo "<p style='color: red;'>Erreur : " . $e->getMessage() . "</p>";
    }
}

?>




