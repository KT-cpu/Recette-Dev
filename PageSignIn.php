<?php

    require_once('signin.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon" href= "../../Rattrapage Bloc 3/Ressources/stir-fry.png">
    <link rel="stylesheet" href="PageSignIn.css">
    
</head>

<body>
    <header>
    </header>
    <main>
        <h1 class="TitreSite">Les Recettes du Programmeur</h1>
        <div class="container">
            <div class="form_area">
                <p class="title">Sign In</p>
                <form method="POST">
                    <div class="form_group">
                        <label class="sub_title" for="name">Pseudo</label>
                        <input placeholder="Entre votre pseudo" class="form_style" type="text" id="nom" name="nom">
                    </div>

                    <div class="form_group">
                        <label class="sub_title" for="password">Password</label>
                        <input placeholder="Enter your password" id="password" class="form_style" type="password" name="password">
                    </div>
                    <div>
                        <button class="btn" name="submit">Inscription</button>
                        <p class="account">Vous avez un compte ? <a class="link" href="PageLogin.php">Log in !</a></p>
                    </div>
                </form></div>
        </div>
    </main>

    <footer class="Footer">
        <div>
        <div class="FooterTxT">Mon Footer</div>
        </div>
    </footer>