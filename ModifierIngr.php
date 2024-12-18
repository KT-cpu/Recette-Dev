<?php

//Permet à l'utilisateur de modifier un ingrédient qu'il a soumis et qui n'a pas encore été traité par la modération

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {

$id = $_POST['id'];


if ($id) {

$con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

$name = $_POST["Nom"];
$cat = $_POST["Categorie"];


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
    $stmt = $con->prepare("UPDATE check_ingredients SET Nom = :nom, Categorie = :cat, File = :file WHERE IDCheckIng = $id");
    $stmt->bindParam(':nom', $name);
    $stmt->bindParam(':cat', $cat);
    $stmt->bindParam(':file', $file_name);
    $stmt->execute();


    echo "Ingrédient mit à jour avec succès.";
    header("Location: PageUser.php");
    exit;
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
}
}

?>