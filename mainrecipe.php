<?php
            //require_once('mainrecipe.php');
            session_start();

            //echo $_SESSION['user_role'];

            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

            //Simple requête + récupère l'id de la recette
            $sql = "SELECT Titre, IDRecette, Pseudo, Image FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette ASC";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            $Titre = $data['Titre'];
            $Pseudo = $data['Pseudo'];
            $img = $data['Image'];
            $_SESSION['id_recette'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }


            $sql = "SELECT Titre, IDRecette, Pseudo, Image FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette ASC LIMIT 1, 1";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            $Titre2 = $data['Titre'];
            $Pseudo2 = $data['Pseudo'];
            $img2 = $data['Image'];
            $_SESSION['id_recette'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }


            $sql = "SELECT Titre, IDRecette, Pseudo, Image FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette ASC LIMIT 2, 1";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            $Titre3 = $data['Titre'];
            $Pseudo3 = $data['Pseudo'];
            $img3 = $data['Image'];
            $_SESSION['id_recette'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }


            /////////////////////////Requête dernier éléments + récupère l'id de la recette/////////////////////

            $sql = "SELECT Titre, IDRecette, Pseudo, Image FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette DESC";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            $Titre4 = $data['Titre'];
            $Pseudo4 = $data['Pseudo'];
            $img4 = $data['Image'];
            $_SESSION['id_recette'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }

            $sql = "SELECT Titre, IDRecette, Pseudo, Image FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette DESC LIMIT 1, 1";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            $Titre5 = $data['Titre'];
            $Pseudo5 = $data['Pseudo'];
            $img5 = $data['Image'];
            $_SESSION['id_recette'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }


            $sql = "SELECT Titre, IDRecette, Pseudo, Image FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette DESC LIMIT 2, 1";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            $Titre6 = $data['Titre'];
            $Pseudo6 = $data['Pseudo'];
            $img6 = $data['Image'];
            $_SESSION['id_recette'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }


        

            /*foreach ($con->query("SELECT Titre, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers") as $row)
            {
                echo "<br />" . $row['Titre'] . " " . $row['Pseudo'];
            }*/

    
            
        ?>