<?php

session_start();

if (isset($_POST['submit']))
{
    $name = $_POST['nom'];
    $password = $_POST['password'];

    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');
    foreach ($con->query('SELECT * FROM user') as $row) {
        print_r($row);
    }



    $sql = "SELECT * FROM user WHERE Pseudo = '$name' ";
    $result = $con->prepare($sql);
    $result->execute();

    if ($result->rowCount() > 0)
    {
        $data = $result->fetchAll();
        if (password_verify($password, $data[0]["MDP"]))
        {
            echo "Connexion Effectuée";
            $_SESSION['nom'] = $name;
            
        }

    } else {

        echo "Vous ne possédez pas de compte";

    }
}
?>