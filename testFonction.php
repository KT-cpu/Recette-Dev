<?php

session_start();


/////////////////////////// GET TEST //////////////////////////////////////


function getUserTest(){

    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

    $sql = "SELECT * FROM user";
        $result = $con->prepare($sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($data > 0) {
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            

            } else {
http_response_code(404);
echo json_encode(["message" => "Recette non trouvée"]);
}

}


/////////////////////////// GET User //////////////////////////////////////

            function getUser() {

                if (isset($_POST['submit']))
{
    $name = ($_POST['nom']);
    $password = ($_POST['password']);

    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

    if (empty($name) || empty($password)) {
        $_SESSION['message'] = "Login échoué, vérifiez que tous les champs soient bien remplis.";
        echo $_SESSION['message'];
    } else {
        $sql = "SELECT * FROM user WHERE MDP = :password AND Pseudo = :name";
        $result = $con->prepare($sql);
        $result->bindvalue(":password", $password,PDO::PARAM_STR);
        $result->bindvalue(":name", $name,PDO::PARAM_STR);
        $result->execute();
        $data = $result->fetch();
        
        if ($data > 0) {
    $_SESSION['user_id'] = $data['IDUsers'];
    $_SESSION['user_pseudo'] = $data['Pseudo'];
    $_SESSION['user_role'] = $data['Role'];


    if ($_SESSION['user_role'] == "2" ) {
       header("Location: PageMain.php");
       $_SESSION['user_login'] = "Logged in";
    }
    if ($_SESSION['user_role'] == "1" ) {
        header("Location: PageMainMods.php");
        $_SESSION['user_login'] = "Logged in";
    }
}
} 
}
            }



/////////////////////////// POST User //////////////////////////////////////

function postUser() {
if (isset($_POST['submit']))
{
    $name = ($_POST["nom"]);
    $password = ($_POST["password"]);


    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


    if (empty($name) || empty($password)) {

        echo "L'inscription a échoué, vérifiez que tous les champs soient remplis";


    } else {

        $sql = "SELECT * FROM user WHERE MDP = :password  AND Pseudo = :name ";
        $result = $con->prepare($sql);
        $result->bindvalue(":password", $password,PDO::PARAM_STR);
        $result->bindvalue(":name", $name,PDO::PARAM_STR);
        $result->execute();
        $data = $result->fetch();
        
        if ($data > 0) {

            echo "Vous possédez déjà un compte. Veuillez vous connectez.";
            exit;

        } else {

        $sql = "INSERT INTO user (Pseudo, MDP, Role) VALUES ('$name', '$password', '2')";
        $req = $con->prepare($sql);
        $req->execute();

        header("Location: PageMain.php");
        exit;
    }
    
    }
}
}



/////////////////////////// GET Page Recette Mods //////////////////////////////////////



            //Permet de récupérer les infos d'une recette selon son ID
            function getRecipeSubmittedByID($recipeID) {
            
                $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


                    $sql = "SELECT IDIng, Pseudo, Titre, Temps, File, Portion, Description
                            FROM check_recette_ingredient
                            JOIN check_recettes ON check_recette_ingredient.IDRecette = check_recettes.IDCheckRecette
                            JOIN user ON check_recettes.IDUsers = user.IDUsers
                            WHERE IDRecette = $recipeID";

            
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
            
                    $data = $stmt->fetch();

                    if ($data > 0) {
                        echo json_encode($data);

                        } else {
            http_response_code(404);
            echo json_encode(["message" => "Recette non trouvée"]);
        }

}


function DeleteRecipeByID($id) {
            
    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


    $sql = "DELETE * FROM check_recette_ingredient WHERE IDRecette = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()){

    echo json_encode(['message' => "La recette a bien été supprimé"]);

    } else {

        http_response_code(500);
        echo json_encode(['error' => 'Erreur lors de la suppression']);
        //echo "Erreur lors de la suppression";

    }
}



function DeleteRecipeByID2($id) {
            
    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


    $sql = "DELETE FROM check_recettes WHERE IDCheckRecette = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()){

    echo json_encode(['message' => "La recette a bien été supprimé"]);

    } else {

        http_response_code(500);
        echo json_encode(['error' => 'Erreur lors de la suppression']);
        //echo "Erreur lors de la suppression";

    }
}



/////////////////////////// GET Page Ingr Mods //////////////////////////////////////


function getIngrByID($id) {
            
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



        function DeleteIngrByID($id) {
            
            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


            $sql = "DELETE FROM check_ingredients WHERE IDCheckIng = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if ($stmt->execute()){

            echo json_encode(['message' => "L'ingrédient a bien été supprimé"]);

            } else {

                http_response_code(500);
                echo json_encode(['error' => 'Erreur lors de la suppression']);
                //echo "Erreur lors de la suppression";

            }
        }





/////////////////////////// GET Page Recette + Page Recette Déco //////////////////////////////////////



            //Permet de récupérer les infos d'une recette selon son ID
            function getRecipeByID($id) {
            
                $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

                //if (isset($_GET['id'])) {
                    //$id = $_GET['id'];

                    $sql = "SELECT IDIng, Pseudo, Titre, Temps, Image, Portion, Description
                            FROM recette_ingredient
                            JOIN recettes ON recette_ingredient.IDRecette = recettes.IDRecette
                            JOIN user ON recettes.IDUsers = user.IDUsers
                            WHERE recette_ingredient.IDRecette = :idRecette";

                            /*:recipeID AND IDUser = $MyID*/
            
                    $stmt = $con->prepare($sql);
                    $stmt->bindParam(':idRecette', $id, PDO::PARAM_INT);
                    $stmt->execute();
            
                    //$data = $stmt->fetch(PDO::FETCH_ASSOC);
                    $data = $stmt->fetch();

                    if ($data > 0) {

                        return($data);

                        //echo json_encode($data);

                        } else {
                        http_response_code(404);
                        echo json_encode(["message" => "Recette non trouvée"]);
                        }

}
            //}




/////////////////////////// GET Page Main + Page Main Déco + Page User //////////////////////////////////////





            function getOldestRecipe1() {

                try{
            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

            //Requête la première recette en partant du haut + récupère l'id de la recette
            $sql = "SELECT Titre, IDRecette, Pseudo, Image FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette ASC";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {

            //echo json_encode($data);
            return($data);

            } else {

                echo json_encode(['error' => 'Aucune recette trouvée']);
                http_response_code(404); // Pas de données disponibles

            }
        } catch (PDOException $e) {

            echo json_encode(['error' => 'Erreur de connexion à la base de données', 'message' => $e->getMessage()]);
            http_response_code(500); // Erreur serveur

        }
    }


        function getOldestRecipe2() {


            try{
            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

            //Requête la deuxième recette en partant du haut + récupère l'id de la recette 2
            $sql = "SELECT Titre, IDRecette, Pseudo, Image FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette ASC LIMIT 1, 1";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            
            //echo json_encode($data);
            return($data);

            } else {

                echo json_encode(['error' => 'Aucune recette trouvée']);
                http_response_code(404); // Pas de données disponibles

            }
        } catch (PDOException $e) {

            echo json_encode(['error' => 'Erreur de connexion à la base de données', 'message' => $e->getMessage()]);
            http_response_code(500); // Erreur serveur

        }
    }




        function getOldestRecipe3() {

            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

            try{
            //Requête la troisième recette en partant du haut + récupère l'id de la recette 3
            $sql = "SELECT Titre, IDRecette, Pseudo, Image FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette ASC LIMIT 2, 1";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {

            //echo json_encode($data);
            return($data);

            } else {

                echo json_encode(['error' => 'Aucune recette trouvée']);
                http_response_code(404); // Pas de données disponibles

            }
        } catch (PDOException $e) {

            echo json_encode(['error' => 'Erreur de connexion à la base de données', 'message' => $e->getMessage()]);
            http_response_code(500); // Erreur serveur

        }
    }


        function getLatestRecipe1() {

            try{
            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

            //Requête la première recette en partant du bas + récupère l'id de la recette 1
            $sql = "SELECT Titre, IDRecette, Pseudo, Image FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette DESC";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {

            //echo json_encode($data);
            return($data);

        } else {

            echo json_encode(['error' => 'Aucune recette trouvée']);
            http_response_code(404); // Pas de données disponibles

        }
    } catch (PDOException $e) {

        echo json_encode(['error' => 'Erreur de connexion à la base de données', 'message' => $e->getMessage()]);
        http_response_code(500); // Erreur serveur

    }
    }



    

        function getLatestRecipe2() {

            try{
            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

            //Requête la deuxième recette en partant du bas + récupère l'id de la recette 2
            $sql = "SELECT Titre, IDRecette, Pseudo, Image FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette DESC LIMIT 1, 1";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            
            //echo json_encode($data);
            return($data);
            
        } else {

            echo json_encode(['error' => 'Aucune recette trouvée']);
            http_response_code(404); // Pas de données disponibles

        }
    } catch (PDOException $e) {

        echo json_encode(['error' => 'Erreur de connexion à la base de données', 'message' => $e->getMessage()]);
        http_response_code(500); // Erreur serveur

    }
    }





        function getLatestRecipe3() {

            try{
            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

            //Requête la troisième recette en partant du bas + récupère l'id de la recette 3
            $sql = "SELECT Titre, IDRecette, Pseudo, Image FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette DESC LIMIT 2, 1";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            
            //echo json_encode($data);
            return($data);

            } else {

            echo json_encode(['error' => 'Aucune recette trouvée']);
            http_response_code(404); // Pas de données disponibles

        }
    } catch (PDOException $e) {

        echo json_encode(['error' => 'Erreur de connexion à la base de données', 'message' => $e->getMessage()]);
        http_response_code(500); // Erreur serveur

    }
    }




/////////////////////////// GET Page Main Mods  //////////////////////////////////////




        function getLatestSubmittedRecipe1() {


            try{ 

            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

            //Requête derniers éléments + récupère l'id de la recette
            $sql = "SELECT Titre, IDCheckRecette, Pseudo, File FROM check_recettes JOIN user ON check_recettes.IDUsers = user.IDUsers ORDER BY IDCheckRecette ASC";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();

            if ($data) {

                return($data);

            } else {

            echo json_encode(['error' => 'Aucune recette trouvée']);
            http_response_code(404); // Pas de données disponibles

        }
    } catch (PDOException $e) {

        echo json_encode(['error' => 'Erreur de connexion à la base de données', 'message' => $e->getMessage()]);
        http_response_code(500); // Erreur serveur

    }
}


           

        function getLatestSubmittedRecipe2() {

            try{
            
            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

            $sql = "SELECT Titre, IDCheckRecette, Pseudo, File FROM check_recettes JOIN user ON check_recettes.IDUsers = user.IDUsers ORDER BY IDCheckRecette ASC LIMIT 1, 1";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();

            if ($data) {
                return($data);

            } else {

            echo json_encode(['error' => 'Aucune recette trouvée']);
            http_response_code(404); // Pas de données disponibles

        }
    } catch (PDOException $e) {

        echo json_encode(['error' => 'Erreur de connexion à la base de données', 'message' => $e->getMessage()]);
        http_response_code(500); // Erreur serveur

    }
        }




        function getLatestSubmittedRecipe3() {

            try{

            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

            $sql = "SELECT Titre, IDCheckRecette, Pseudo, File FROM check_recettes JOIN user ON check_recettes.IDUsers = user.IDUsers ORDER BY IDCheckRecette ASC LIMIT 2, 1";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();

            if ($data) {
                return($data);

            } else {

            echo json_encode(['error' => 'Aucune recette trouvée']);
            http_response_code(404); // Pas de données disponibles

        }
    } catch (PDOException $e) {

        echo json_encode(['error' => 'Erreur de connexion à la base de données', 'message' => $e->getMessage()]);
        http_response_code(500); // Erreur serveur

    }
        }



        function getLatestSubmittedIngredient1() {

            try{

            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

            $sql = "SELECT Nom, IDCheckIng, File, Pseudo FROM check_ingredients JOIN user ON check_ingredients.IDUsers = user.IDUsers ORDER BY IDCheckIng DESC";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();

            if ($data) {
                return($data);

            } else {

            echo json_encode(['error' => 'Aucune recette trouvée']);
            http_response_code(404); // Pas de données disponibles

        }
    } catch (PDOException $e) {

        echo json_encode(['error' => 'Erreur de connexion à la base de données', 'message' => $e->getMessage()]);
        http_response_code(500); // Erreur serveur

    }
}



function getLatestSubmittedIngredient2() {

    try{

        $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

        $sql = "SELECT Nom, IDCheckIng, File, Pseudo FROM check_ingredients JOIN user ON check_ingredients.IDUsers = user.IDUsers ORDER BY IDCheckIng DESC LIMIT 1, 1";
        $result = $con->prepare($sql);
        $result->execute();
        $data = $result->fetch();

    if ($data) {
        return($data);

    } else {

    echo json_encode(['error' => 'Aucune recette trouvée']);
    http_response_code(404); // Pas de données disponibles

}
} catch (PDOException $e) {

echo json_encode(['error' => 'Erreur de connexion à la base de données', 'message' => $e->getMessage()]);
http_response_code(500); // Erreur serveur

}
}



function getLatestSubmittedIngredient3() {

    try{

        $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

        $sql = "SELECT Nom, IDCheckIng, File, Pseudo FROM check_ingredients JOIN user ON check_ingredients.IDUsers = user.IDUsers ORDER BY IDCheckIng DESC LIMIT 2, 1";
        $result = $con->prepare($sql);
        $result->execute();
        $data = $result->fetch();        

    if ($data) {
        return($data);

    } else {

    echo json_encode(['error' => 'Aucune recette trouvée']);
    http_response_code(404); // Pas de données disponibles

}
} catch (PDOException $e) {

echo json_encode(['error' => 'Erreur de connexion à la base de données', 'message' => $e->getMessage()]);
http_response_code(500); // Erreur serveur

}
}




function getSubmittedRecipeByID($id) {
            
    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


        $sql = "SELECT IDIng, Pseudo, Titre, Temps, File, Portion, Description
                        FROM check_recette_ingredient
                        JOIN check_recettes ON check_recette_ingredient.IDRecette = check_recettes.IDCheckRecette
                        JOIN user ON check_recettes.IDUsers = user.IDUsers
                        WHERE IDCheckRecette = :idRecette";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(':idRecette', $id, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch();

        if ($data) {

            return($data);

            } else {
            http_response_code(404);
            echo json_encode(["message" => "Recette non trouvée"]);
            }

}



/////////////////////////// GET Page User  //////////////////////////////////////



        function getMyRecipe1($MyID){

            try{

            //session_start();

            //$MyID = $_SESSION['user_id'];
            //$Myname = $_SESSION['user_pseudo'];

            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


            $sql = "SELECT Titre, IDRecette, Image, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers WHERE recettes.IDUsers = :myID ORDER BY IDRecette DESC";
            $result = $con->prepare($sql);
            $result->bindParam(':myID', $MyID, PDO::PARAM_INT);
            $result->execute();

            $data = $result->fetch();
        
            if ($data > 0) {

                return($data);
            
            } else {

                //$Titre1 = "Vous n'avez créer aucune recette";
                echo json_encode(['error' => 'Aucune recette trouvée']);
                http_response_code(404); // Pas de données disponibles
            } 

} catch (PDOException $e) {

    echo json_encode(['error' => 'Erreur de connexion à la base de données', 'message' => $e->getMessage()]);
    http_response_code(500); // Erreur serveur

}
        }



        function getMyRecipe2($MyID){

            try{

            //session_start();

            //$MyID = $_SESSION['user_id'];
            //$Myname = $_SESSION['user_pseudo'];

            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

            $sql = "SELECT Titre, IDRecette, Image, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers WHERE recettes.IDUsers = :myID ORDER BY IDRecette DESC LIMIT 1, 1";
            $result = $con->prepare($sql);
            $result->bindParam(':myID', $MyID, PDO::PARAM_INT);
            $result->execute();
            $data = $result->fetch();
        
            if ($data > 0) {

                return($data);
            
            } else {

                //$Titre1 = "Vous n'avez créer aucune recette";
                echo json_encode(['error' => 'Aucune recette trouvée']);
                http_response_code(404); // Pas de données disponibles
            } 

} catch (PDOException $e) {

    echo json_encode(['error' => 'Erreur de connexion à la base de données', 'message' => $e->getMessage()]);
    http_response_code(500); // Erreur serveur

}
        }




/////////////////////////// POST Page Add Recipe //////////////////////////////////////


        function sendRecipe() {

            $MyID = $_SESSION['user_id'];
            $_SESSION['message_form'] = array();
            $_SESSION['value_form'] = array();

            $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');


            $query = $con->query("SELECT IDIng, Nom FROM base_ingredients");
            $ingrédients = $query->fetchAll(PDO::FETCH_ASSOC);

            // Traitement du formulaire pour insérer les ingrédients sélectionnés
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $titreRecette = $_POST['Nom'];
            $_SESSION['value_form']['titreRecette'] = $titreRecette;
            if(empty($titreRecette)) {$_SESSION['message_form'][] = 'Le titre de la recette doit être rempli';}

            $temps = $_POST['Tps'];
            $_SESSION['value_form']['temps'] = $temps;
            if(empty($temps)) {$_SESSION['message_form'][] = 'Le temps de la recette doit être rempli';}

            $portion = $_POST['Portion'];
            $_SESSION['value_form']['portion'] = $portion;
            if(empty($portion)) {$_SESSION['message_form'][] = 'Le nombre de portion pour la recette doit être rempli';}

            $description = $_POST['Desc'];
            $_SESSION['value_form']['description'] = $description;
            if(empty($description)) {$_SESSION['message_form'][] = 'Veuillez entrer les étapes de votre recette';}

            $selectedIngredientIds = isset($_POST['selectedIngredients']) ? $_POST['selectedIngredients'] : [];
            $_SESSION['value_form']['selectedIngredientIds'] = $selectedIngredientIds;
            if(empty($selectedIngredientIds)) {$_SESSION['message_form'][] = "Veuillez sélectionner des ingrédients pour votre recette. Si vous ne trouvez pas l'ingrédient qu'il vous faut, n'hésitez pas à nous soumettre l'ingrédient dans l'onglet 'Soumettre un nouvel ingrédient' situé en base de votre profil";}

            // Gestion de l'upload de l'image
            $file_name = $_FILES['image']['name'];
            $tempname = $_FILES['image']['tmp_name'];
            $folder = 'Images/' .$file_name;
            if(move_uploaded_file($tempname, $folder)) {
                echo "FILE UPLOADED !!!!";
            } else {
                echo "The file couldn't be uploaded";
            }

            if(count($_SESSION['message_form']) == 0)
            {
                try {
                    // Insertion de la recette dans la table check_recette
                    $stmtRecette = $con->prepare("INSERT INTO check_recettes (Titre, File, Temps, Portion, Description, IDUsers) VALUES (:titre, :image, :temps, :portion, :description, '$MyID')");
                    $stmtRecette->execute([
                    'titre' => $titreRecette,
                    'image' => $file_name,
                    'temps' => $temps,
                    'portion' => $portion,
                    'description' => $description
                    ]);

                    // Récupération de l'ID de la recette insérée
                    $recetteId = $con->lastInsertId();

                    // Insertion des ingrédients sélectionnés dans la table check_recette_ingredient
                    if (!empty($selectedIngredientIds)) {
                    $stmtIngr = $con->prepare("INSERT INTO check_recette_ingredient (IDRecette, IDIng) VALUES (:recette_id, :ingredient_id)");
                    foreach ($selectedIngredientIds as $ingredientId) {
                    $stmtIngr->execute([
                    'recette_id' => $recetteId,
                    'ingredient_id' => $ingredientId
                    ]);
                    }
                    }

                    //echo "<p style='color: green;'>Recette et ingrédients enregistrés avec succès !</p>";
                    unset($_SESSION['value_form']);       // efface les valeurs des champs du formulaire si tout est correct
                    header("Location: PageUser.php");
                    exit;
     

                } catch (PDOException $e) {
                    echo "<p style='color: red;'>Erreur : " . $e->getMessage() . "</p>";
                }
                }
            }
        }



/////////////////////////// SEND JSON //////////////////////////////////////

function sendJSON($infos){
    header("Content-Type : application/json");
    echo json_encode($infos,JSON_UNESCAPED_UNICODE);
}