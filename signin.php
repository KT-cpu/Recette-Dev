<?php

session_start();

if (isset($_POST['submit']))
{
    $name = htmlspecialchars($_POST["nom"]);
    $password = htmlspecialchars($_POST["password"]);

    print_r($_POST);

    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


    if (empty($name) || empty($password)) {

        echo "Sign in Failed, please try again";
        
    } else {
        

        $sql = "INSERT INTO user (Pseudo, MDP, Role) VALUES ('$name', '$password', '2')";
        $req = $con->prepare($sql);
        $req->execute();

        header("Location: PageMain.php");
        
    }
    }
