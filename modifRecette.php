<?php


//Permet à l'utilisateur de modifier une recette

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {

    $id = $_POST['id'];


    if ($id) {

    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

    $nom = $_POST['Nom'];
    $tempsNec = $_POST['Tps'];
    $portion = $_POST['Portion'];
    $description = $_POST['Desc'];
    $selectedIngredients = $_POST['selectedIngredients'];

    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'Images/' .$file_name;
    if(move_uploaded_file($tempname, $folder)) {
        echo "Le fichier à bien été envoyé";
    } else {
        echo "Le fichier n'a pas pu être envoyé, veuillez vérifier que tous les champs sont remplis";
    }

    try {
        // Mettre à jour les informations de la recette
        $stmt = $con->prepare("UPDATE check_recettes SET Titre = :nom, Temps = :tempsNec, Portion = :portion, Description = :description, File = :file WHERE IDCheckRecette = $id");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':tempsNec', $tempsNec);
        $stmt->bindParam(':portion', $portion, PDO::PARAM_INT);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':file', $file_name);
        $stmt->execute();

        // Mettre à jour les ingrédients (supprimer tous les anciens et insérer les nouveaux)
        $stmt = $con->prepare("DELETE FROM check_recette_ingredient WHERE IDRecette = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        foreach ($selectedIngredients as $ingredientID) {
            $stmt = $con->prepare("INSERT INTO check_recette_ingredient (IDRecette, IDIng) VALUES (:id, :ingredientID)");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':ingredientID', $ingredientID, PDO::PARAM_INT);
            $stmt->execute();
        }

        echo "Recette mise à jour avec succès.";
        header("Location: PageUser.php");
        exit;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
}
?>