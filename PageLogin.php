<?php
    session_start();
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

    <main>
        <h1 class="TitreSite">Les Recettes du Programmeur</h1>
        <div class="container">
            <div class="form_area">
                <p class="title">Login</p>
                <form method="POST" action="login.php">
                    <div class="form_group">
                        <label class="sub_title">Pseudo</label>
                        <input placeholder="Entrer votre pseudo" class="form_style" id="nom" type="text" name="nom" required>
                    </div>

                    <div class="form_group">
                        <label class="sub_title" for="password" required>Mot de Passe</label>
                        <input placeholder="Entrer votre mot de passe" id="password" class="form_style" type="password" name="password">
                    </div>
                    <div>
                        <button class="btn" name="submit">Connexion</button>
                        <p class="account">Vous n'avez pas de compte ? <a href="PageSignIn.php" class="link">Sign in !</a></p>
                    </div>
                
            </form></div>
        </div>

        
            <!--let form = document.querySelector("form")
            let nom = document.getElementById("nom")
            let mdp = document.getElementById("password")


            function verifchamps(balise) {
                if (balise.value === "") {
                    balise.classList.add("error")
                } else {
                    balise.classList.remove("error")
                }
            }

            function verifmdp(balise) {
                let mdpRegExp = new RegExp("^[a-zA-Z0-9]*$")
                if (mdpRegExp.test(balise.value)) {
                    balise.classList.remove("error")
                } else {
                    balise.classList.add("error")
                }
            }

            form.addEventListener("submit", (event) => {
                event.preventDefault()
                verifchamps(nom)
                console.log(nom.value) // affiche ce qui est contenu dans la balise name
                console.log(mdp.value)
            })

            nom.addEventListener("change", () => {
                verifchamps(nom)
            })

            mdp.addEventListener("change", () => {
                verifmdp(mdp)
}) -->

    </main>

    <footer class="Footer">
        <div>
        <div class="FooterTxT">Mon Footer</div>
        </div>
    </footer>
