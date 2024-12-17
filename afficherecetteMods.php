<?php

session_start();

                $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


                $sql = "SELECT IDIng, Pseudo, Titre, Temps, File, Portion, Description
                        FROM check_recette_ingredient
                        JOIN check_recettes ON check_recette_ingredient.IDRecette = check_recettes.IDCheckRecette
                        JOIN user ON check_recettes.IDUsers = user.IDUsers
                        WHERE IDCheckRecette = 8";

                        /*:recipeID AND IDUser = $MyID*/
        
                $stmt = $con->prepare($sql);
                //$stmt->bindParam(':recipeID', $recipeID, PDO::PARAM_INT);
                $stmt->execute();
        
                //$data = $stmt->fetch(PDO::FETCH_ASSOC);
                $data = $stmt->fetch();

                if ($data > 0) {
                    //echo json_encode($data);

                    //$IDRecette = $data['IDRecette'];
                    //echo json_encode($data);

                    $IDIng = $data['IDIng'];
                    $Pseudo = $data['Pseudo'];
                    $Titre = $data['Titre'];
                    $Temps = $data['Temps'];
                    $img = $data['File'];
                    $Portion = $data['Portion'];
                    $Description = $data['Description'];

                    }



                    // Where ID = $ID récupéré
                    /*$sql = "INSERT INTO recette_ingredient SELECT * FROM check_recette_ingredient WHERE IDCheckRecette = 8";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();


                    // Where ID = $ID récupéré
                    $sql = "INSERT INTO recettes SELECT * FROM check_recettes WHERE IDCheckRecette = 8";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();


                    //Efface l'enregistrement afin d'éviter les doublons
                    $sql = "DELETE FROM check_recette_ingredient WHERE IDCheckRecette = 8";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();


                    $sql = "DELETE FROM check_recettes WHERE IDCheckRecette = 8";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();*/

?>