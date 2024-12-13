<?php 

session_start();

$MyID = $_SESSION['user_id'];


if (isset($_POST['submit'])) {

    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

    //var_dump($_POST);

    $name = $_POST["Nom"];
    $cat = $_POST["Categorie"];


    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'Images/' .$file_name;

    if (empty($name) || empty($cat)) {

        echo "Veuillez remplir le nom ainsi que la catégorie";
        
    } else {

    $sql = "INSERT INTO check_ingredients (IDUsers, Nom, File, Cat) VALUES ('$MyID', '$name', '$file_name', $cat)";
    $req = $con->prepare($sql);
    $req->execute();

    if(move_uploaded_file($tempname, $folder)) {
        echo "FILE UPLOADED !!!!";
    } else {
        echo "The file couldn't be uploaded";
    }
}
} else {
    //echo "Les données n'ont pas pu être envoyés";
    //var_dump($_POST);
}

?>