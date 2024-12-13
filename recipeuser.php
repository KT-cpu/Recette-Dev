<?php

session_start();

$MyID = $_SESSION['user_id'];
$Myname = $_SESSION['user_pseudo'];

            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


            /////////////////////////Requête dernier éléments + récupère l'id de la recette/////////////////////

            $sql = "SELECT Titre, IDRecette, Image, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers WHERE recettes.IDUsers = :myID ORDER BY IDRecette DESC";
            $result = $con->prepare($sql);
            $result->bindParam(':myID', $MyID, PDO::PARAM_INT);
            $result->execute();

            $data = $result->fetch();
        
            if ($data) {
            $Titre1 = $data['Titre'];
            $Pseudo1 = $data['Pseudo'];
            $img1 = $data['Image'];
            $_SESSION['id_recette1'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }

            $sql = "SELECT Titre, IDRecette, Image, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers WHERE recettes.IDUsers = :myID ORDER BY IDRecette DESC LIMIT 1, 1";
            $result = $con->prepare($sql);
            $result->bindParam(':myID', $MyID, PDO::PARAM_INT);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            $Titre2 = $data['Titre'];
            $Pseudo2 = $data['Pseudo'];
            $img2 = $data['Image'];
            $_SESSION['id_recette2'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }


            $sql = "SELECT Titre, IDRecette, Image, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers WHERE recettes.IDUsers = :myID ORDER BY IDRecette DESC LIMIT 2, 1";
            $result = $con->prepare($sql);
            $result->bindParam(':myID', $MyID, PDO::PARAM_INT);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            $Titre3 = $data['Titre'];
            $Pseudo3 = $data['Pseudo'];
            $img3 = $data['Image'];
            $_SESSION['id_recette3'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }
    
            
        ?>