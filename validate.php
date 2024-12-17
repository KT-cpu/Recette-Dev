<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;


    if ($id) {

    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


    // Where ID = $ID récupéré
    $sql = "INSERT INTO recettes SELECT * FROM check_recettes WHERE IDCheckRecette = $id";
    $stmt = $con->prepare($sql);
    $stmt->execute();


    // Where ID = $ID récupéré
    $sql = "INSERT INTO recette_ingredient (IDRecette, IDIng) SELECT IDRecette, IDIng FROM check_recette_ingredient WHERE IDRecette = $id";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    
    $sql = "DELETE FROM check_recettes WHERE IDCheckRecette = $id";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    echo "Recette supprimée";
        header("Location: PageMainMods.php");
        exit;
    }

} else {
    echo "ID non valide.";
}


?>