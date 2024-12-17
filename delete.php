<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;


    if ($id) {

    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


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