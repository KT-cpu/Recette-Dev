<?php
    
   /* header("Content-Type:application/json");


    $host = "localhost";
    $dbname = "recettedev";
    $username = 'root';
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=recettedev';

    try {
        $pdo = new PDO($dsn, $username, $password);
    } catch(PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }

    $pseudo = $_POST["pseudo"];
    $mdp = $_POST["mdp"];

    $stmt = $pdo->prepare("SELECT * FROM user WHERE MDP=:mdp AND Pseudo=:pseudo");
    $stmt->execute(array(':mdp' => $email, ':pseudo' => $password));
    $count = $stmt->rowCount();

    if($count > 0){
        $json = array("status" => 200,'message' => "Success");
    } else {
        $json = array("status" => 300,'message' => "Error");
    }

    echo json_encode($json);

    $pdo = null;*/

    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon" href= "../../Rattrapage Bloc 3/Ressources/stir-fry.png">
    <link rel="stylesheet" href="PageLogin.css">
    
</head>

<body>
    <header>
    </header>
    <main>
        <h1 class="TitreSite">Les Recettes du Programmeur</h1>
        <div class="container">
            <div class="form_area">
                <p class="title">Login</p>
                <form action="">
                    <div class="form_group">
                        <label class="sub_title">Pseudo</label>
                        <input placeholder="Entrer votre pseudo" class="form_style" type="text">
                    </div>

                    <div class="form_group">
                        <label class="sub_title" for="password">Mot de Passe</label>
                        <input placeholder="Entrer votre mot de passe" id="password" class="form_style" type="password">
                    </div>
                    <div>
                        <button class="btn"><a href="" class="fill-div">Connexion</a></button>
                        <p class="account">Vous n'avez pas de compte ? <a class="link" href="PageSignIn.php">Sign in !</a></p><a class="link" href="">
                    </a></div><a class="link" href="">
                
            </a></form></div><a class="link" href="">
        </a></div>
    </main>

    <footer class="Footer">
        <div>
        <div class="FooterTxT">Mon Footer</div>
        </div>
    </footer>
