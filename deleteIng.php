<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;


    if ($id) {

    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


    $sql = "DELETE FROM check_ingredients WHERE IDCheckIng = $id";
    $stmt = $con->prepare($sql);
    $stmt->execute();

        echo "Ingrédient supprimé";
        header("Location: PageMainMods.php");
        exit;
    }

} else {
    echo "ID non valide.";
}

?>