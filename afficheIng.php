<?php

session_start();


            function getRecipeByID($id) {
            
                $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


                    $sql = "SELECT Nom, File, Cat, IDCheckIng
                            FROM check_ingredients
                            JOIN categorie ON check_ingredients.Categorie = categorie.IDCat
                            WHERE IDCheckIng = :idIng";
            
                    $stmt = $con->prepare($sql);
                    $stmt->bindParam(':idIng', $id, PDO::PARAM_INT);
                    $stmt->execute();
                    $data = $stmt->fetch();

                    if ($data) {
                        return($data);

                        //echo json_encode($data);
            
                        } else {

                        http_response_code(404);
                        echo json_encode(["message" => "Recette non trouvée"]);

                        }
                    }

                        

?>