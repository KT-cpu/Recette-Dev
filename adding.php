<?php 

session_start();

$MyID = $_SESSION['user_id'];


if (isset($_POST['submit'])) {

    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


    $name = $_POST["Nom"];
    $cat = $_POST["Categorie"];


    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'Images/' .$file_name;

    if (empty($name) || empty($cat)) {

        echo "Veuillez remplir le nom ainsi que la catégorie";
        
    } else {

    $sql = "INSERT INTO check_ingredients (IDUsers, Nom, File, Categorie) VALUES ('$MyID', '$name', '$file_name', $cat)";
    $req = $con->prepare($sql);
    $req->execute();

    if(move_uploaded_file($tempname, $folder)) {
        echo "Votre ingrédient à bien été soumis à la modération";
    } else {
        echo "Votre ingrédient à rencontrer un problème, veuillez vérifier que tous les champs sont bien remplis";
    }
}
} else {
    //echo "Les données n'ont pas pu être envoyés";
    //var_dump($_POST);
}

?>