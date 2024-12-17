<?php

$con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'refuser') {
    if (isset($_POST['id'])) {
        //$ingredientID = intval($_POST['id']);

        //var_dump($_POST);


//if (isset($_GET['action']) && $_GET['action'] === 'refuser') {

    $sql = "DELETE FROM check_ingredients WHERE IDCheckIng = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()){

        echo "L'ingrédient à bien été supprimé";
        header("Location: PageMainMods.php");
        exit;
    } else {
        echo "Erreur lors de la suppression";
    }
} else {
    echo "ID de l'ingrédient manquant";
}
} else {
//echo "Requête invalide";
}


?>