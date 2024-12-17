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

            $data1 = $result->fetch();
        
            if ($data1 > 0) {
            $Titre1 = $data1['Titre'];
            $Pseudo1 = $data1['Pseudo'];
            $img1 = $data1['Image'];
            $IDRecette1 = $data1['IDRecette'];
            //echo $_SESSION['id_recette'];
            } else {

                $Titre1 = "Vous n'avez créer aucune recette";

            }

            $sql = "SELECT Titre, IDRecette, Image, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers WHERE recettes.IDUsers = :myID ORDER BY IDRecette DESC LIMIT 1, 1";
            $result = $con->prepare($sql);
            $result->bindParam(':myID', $MyID, PDO::PARAM_INT);
            $result->execute();
            $data2 = $result->fetch();
        
            if ($data2 > 0) {
            $Titre2 = $data2['Titre'];
            $Pseudo2 = $data2['Pseudo'];
            $img2 = $data2['Image'];
            $IDRecette2 = $data2['IDRecette'];
            //echo $_SESSION['id_recette'];
            } else {

                $Titre2 = "Vous n'avez créer aucune recette";

            }


            $sql = "SELECT Titre, IDRecette, Image, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers WHERE recettes.IDUsers = :myID ORDER BY IDRecette DESC LIMIT 2, 1";
            $result = $con->prepare($sql);
            $result->bindParam(':myID', $MyID, PDO::PARAM_INT);
            $result->execute();
            $data3 = $result->fetch();
        
            if ($data3 > 0) {
            $Titre3 = $data3['Titre'];
            $Pseudo3 = $data3['Pseudo'];
            $img3 = $data3['Image'];
            $IDRecette3 = $data3['IDRecette'];
            //echo $_SESSION['id_recette'];
            } else {
                
                $Titre3 = "Vous n'avez créer aucune recette";
            }
    

            /////////////////////////Requête dernier éléments en cours de validation + récupère l'id de la recette/////////////////////


            $sql = "SELECT Titre, IDCheckRecette, File, Pseudo FROM check_recettes JOIN user ON check_recettes.IDUsers = user.IDUsers WHERE check_recettes.IDUsers = :myID ORDER BY IDCheckRecette DESC";
            $result = $con->prepare($sql);
            $result->bindParam(':myID', $MyID, PDO::PARAM_INT);
            $result->execute();

            $data4 = $result->fetch();
        
            if ($data4 > 0) {
            $Titre4 = $data4['Titre'];
            $Pseudo4 = $data4['Pseudo'];
            $img4 = $data4['File'];
            $IDRecette4 = $data4['IDCheckRecette'];
            //echo $_SESSION['id_recette'];
            } else {

                $Titre4 = "Vous n'avez créer aucune recette";

            }

            $sql = "SELECT Titre, IDCheckRecette, File, Pseudo FROM check_recettes JOIN user ON check_recettes.IDUsers = user.IDUsers WHERE check_recettes.IDUsers = :myID ORDER BY IDCheckRecette DESC LIMIT 1, 1";
            $result = $con->prepare($sql);
            $result->bindParam(':myID', $MyID, PDO::PARAM_INT);
            $result->execute();
            $data5 = $result->fetch();
        
            if ($data5 > 0) {
            $Titre5 = $data5['Titre'];
            $Pseudo5 = $data5['Pseudo'];
            $img5 = $data5['File'];
            $IDRecette5 = $data5['IDCheckRecette'];
            //echo $_SESSION['id_recette'];
            } else {

                $Titre5 = "Vous n'avez créer aucune recette";

            }


            $sql = "SELECT Titre, IDCheckRecette, File, Pseudo FROM check_recettes JOIN user ON check_recettes.IDUsers = user.IDUsers WHERE check_recettes.IDUsers = :myID ORDER BY IDCheckRecette DESC LIMIT 2, 1";
            $result = $con->prepare($sql);
            $result->bindParam(':myID', $MyID, PDO::PARAM_INT);
            $result->execute();
            $data6 = $result->fetch();
        
            if ($data6 > 0) {
            $Titre6 = $data6['Titre'];
            $Pseudo6 = $data6['Pseudo'];
            $img6 = $data6['File'];
            $IDRecette6 = $data6['IDCheckRecette'];
            //echo $_SESSION['id_recette'];
            } else {
                
                $Titre6 = "Vous n'avez créer aucune recette";
            }
            
        ?>