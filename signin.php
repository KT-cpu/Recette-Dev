<?php

session_start();

if (isset($_POST['submit']))
{
    $name = ($_POST["nom"]);
    $password = ($_POST["password"]);
    //print_r($_POST);

    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


    if (empty($name) || empty($password)) {

        echo "L'inscription a échoué, vérifiez que tous les champs soient remplis";


    } else {

        $sql = "SELECT * FROM user WHERE MDP = :password  AND Pseudo = :name ";
        $result = $con->prepare($sql);
        //$result = $con->prepare($sql);
        $result->bindvalue(":password", $password,PDO::PARAM_STR);
        $result->bindvalue(":name", $name,PDO::PARAM_STR);
        $result->execute();
        $data = $result->fetch();
        
        if ($data > 0) {

            echo "Vous possédez déjà un compte. Veuillez vous connectez.";
            //exit;

        } else {

        $sql = "INSERT INTO user (Pseudo, MDP, Role) VALUES ('$name', '$password', '2')";
        $req = $con->prepare($sql);
        $req->execute();

        header("Location: PageMain.php");
        exit;
    }
    
    }
}