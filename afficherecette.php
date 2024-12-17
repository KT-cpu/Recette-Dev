<?php

session_start();


            //function getRecipeByID($recipeID) {
            
                $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

                if (isset($_GET['id'])) {
                    $idRecette = $_GET['id'];

                    $sql = "SELECT IDIng, Pseudo, Titre, Temps, File, Portion, Description
                            FROM check_recette_ingredient
                            JOIN check_recettes ON check_recette_ingredient.IDRecette = check_recettes.IDCheckRecette
                            JOIN user ON check_recettes.IDUsers = user.IDUsers
                            WHERE IDCheckRecette = :idRecette";

                            /*:recipeID AND IDUser = $MyID*/
            
                    $stmt = $con->prepare($sql);
                    $stmt->bindParam(':idRecette', $id, PDO::PARAM_INT);
                    $stmt->execute();
            
                    //$data = $stmt->fetch(PDO::FETCH_ASSOC);
                    $data = $stmt->fetch();

                    if ($data > 0) {
                        echo json_encode($data);

                        //$IDRecette = $data['IDRecette'];
                        //echo json_encode($data);

                        /*$IDIng = $data['IDIng'];
                        $Pseudo = $data['Pseudo'];
                        $Titre = $data['Titre'];
                        $Temps = $data['Temps'];
                        $img = $data['File'];
                        $Portion = $data['Portion'];
                        $Description = $data['Description'];*/

                        }
                    }
?>