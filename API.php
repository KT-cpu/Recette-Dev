<?php

require_once("testFonction.php");

//echo $_SERVER['PATH_INFO'];
//echo $_SERVER['REQUEST_URI'];

$method = $_SERVER['REQUEST_METHOD'];
header('Content-Type: application/json');

/*try {
    $path = explode('/', trim($_SERVER['PATH_INFO'], '/'));
    $resource = $path[0] ?? null;
    $id = $path[1] ?? null;
    var_dump($path);*/
    
    $path = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));

    if ($path[0] === 'Rattrapage_Bloc_3' && $path[1] === 'api') {
        $resource = $path[2] ?? null;  // Le 3ème segment après 'api'
        $id = $path[3] ?? $_GET['id'] ?? null;

        switch ($resource) {
            case 'home':
                if ($method === 'GET') {
                    // Récupérer les dernières et les plus anciennes recettes
                    $recipes = [
                        'oldest1' => getOldestRecipe1(),
                        'oldest2' => getOldestRecipe2(),
                        'oldest3' => getOldestRecipe3(),
                        'latest1' => getLatestRecipe1(),
                        'latest2' => getLatestRecipe2(),
                        'latest3' => getLatestRecipe3(),
                    ];
    
                    echo json_encode($recipes);
                    exit;
                } else {
                    // Méthode non autorisée
                    http_response_code(405);
                    echo json_encode(['error' => 'Méthode non autorisée']);
                    exit;
                }
    
            case 'recette':
                if ($id) {
                    if ($method === 'GET') {
                        // Récupérer une recette par son ID
                        $recipe = getRecipeByID($id);
    
                        if ($recipe) {
                            echo json_encode($recipe);
                        } else {
                            http_response_code(404);
                            echo json_encode(['error' => 'Recette non trouvée']);
                        }
                        exit;
                    } else {
                        http_response_code(405);
                        echo json_encode(['error' => 'Méthode non autorisée']);
                        exit;
                    }
                } else {
                    http_response_code(400);
                    echo json_encode(['error' => 'ID de recette manquant']);
                    exit;
                }

                case 'Recipeuser':
                    if ($method === 'GET') {

                        if (!isset($_SESSION['user_id'])) {
                            http_response_code(401);
                            echo json_encode(['error' => 'Utilisateur non authentifié']);
                            exit;
                        }
        
                        // Récupère l'ID utilisateur depuis la session
                        $MyID = $_SESSION['user_id'];

                        $recipesUser = [
                            'MyRecipe1' => getMyRecipe1($MyID),
                            'MyRecipe2' => getMyRecipe2($MyID),       // A terminer, on a arrêté car il fallait un token lol
                            //'oldest3' => getOldestRecipe3(),
                            //'latest1' => getLatestRecipe1(),
                            //'latest2' => getLatestRecipe2(),
                            //'latest3' => getLatestRecipe3(),
                        ];

                        echo json_encode($recipesUser);
                    exit;
                } else {
                    // Méthode non autorisée
                    http_response_code(405);
                    echo json_encode(['error' => 'Méthode non autorisée']);
                    exit;
                }

                case 'accueilMods':

                    if ($method === 'GET') {

                        $recipesSubmittedUser = [
                            'RecipeSubmit1' => getLatestSubmittedRecipe1(),
                            'RecipeSubmit2' => getLatestSubmittedRecipe2(),
                            'RecipeSubmit3' => getLatestSubmittedRecipe3(),
                            'IngSubmit1' => getLatestSubmittedIngredient1(),
                            'IngSubmit2' => getLatestSubmittedIngredient2(),
                            'IngSubmit3' => getLatestSubmittedIngredient3(),
                        ];

                        echo json_encode($recipesSubmittedUser);
                    exit;

                } else {
                    // Méthode non autorisée
                    http_response_code(405);
                    echo json_encode(['error' => 'Méthode non autorisée']);
                    exit;
                }



                case 'recetteMods':
                    switch ($method) {
                        case 'GET' :
                            // Récupérer une recette par son ID
                            //var_dump($id);
                            $recipeSubmitted = getSubmittedRecipeByID($id);
                            
                            if ($recipeSubmitted) {

                                echo json_encode($recipeSubmitted, JSON_UNESCAPED_UNICODE);
                                exit;

                            } else {
                                http_response_code(404);
                                //echo json_encode(['error' => 'Recette non trouvée']);
                            }



                        case 'DELETE' :
                            if ($id) {

                            DeleteRecipeByID($id);


                        } else {

                            http_response_code(404);

                        }
                      
                    }




                case 'IngrMods':
                    switch ($method) {
                        case 'GET' :

                        $IngrSubmitted = getIngrByID($id);
                        if ($IngrSubmitted) {

                            echo json_encode($IngrSubmitted, JSON_UNESCAPED_UNICODE);
                            exit;

                        } else {
                            http_response_code(404);
                            //echo json_encode(['error' => 'Recette non trouvée']);
                        }
                        exit;
                    


                    case 'DELETE' :
                                if ($id) {

                                DeleteIngrByID($id);

                            } else {

                                http_response_code(404);

                            }
                          
                        }
                

    


    
            default:
                // Ressource inconnue
                http_response_code(404);
                echo json_encode(['error' => 'Ressource non trouvée']);
                exit;
        }
    } else {
        // Endpoint non trouvé
        http_response_code(404);
        echo json_encode(['error' => 'Endpoint non trouvé']);
        exit;
    }

    //var_dump($path);
    // L'index 0 sera 'Rattrapage_Bloc_3'
    //$resource = $path[1] ?? null;  // L'index 1 sera 'api'
    //$resource2 = $path[2] ?? null; // L'index 2 sera 'home'
    //$id = $path[3] ?? null; // L'index 2 sera 'id'

    
    // Gérer les requêtes
    // Utiliser un switch case
    /*switch($resource) {
      case "home" :
       if(empty($id)){
        if ($method === 'GET') {*/
        /*if ($resource === 'api') {
            // Gérer la requête pour l'endpoint 'home' de l'API
            switch ($path[2] ?? '') {
                case 'home':
                    // Si la méthode est GET, exécuter la fonction qui récupère la recette la plus ancienne
                    if ($method === 'GET') {

                        $recipes = [
                            'oldest1' => getOldestRecipe1(),
                            'oldest2' => getOldestRecipe2(),
                            'oldest3' => getOldestRecipe3(),
                            'latest1' => getLatestRecipe1(),
                            'latest2' => getLatestRecipe2(),
                            'latest3' => getLatestRecipe3(),
                        ];

                        echo json_encode($recipes);
                        break;
                        exit;

        }

                case 'recette':
                    if ($id) {
                        if ($method === 'GET') {

                        getRecipeByID($id);
                        break;
                        }
                    }



        echo json_encode(['error' => 'Méthode non autorisée']);
            http_response_code(405); // Méthode non autorisée
            break;
        default:
            // Ressource inconnue
            echo json_encode(['error' => 'Ressource non trouvée']);
            http_response_code(404); // Ressource non trouvée
            break;
    }
        } else {
            // Si la ressource n'est pas 'api', afficher une erreur
            echo json_encode(['error' => 'Endpoint non trouvé']);
            http_response_code(404);
        }


	//$recipeID = intval($_GET['id']);
    //echo "je marche";
    //getRecipeByID($recipeID);
    //break; }

    /*else {

    }

    case "test" :

    echo "je marche aussi";
    break;*/

	  /*switch($method){

		case "GET" :

			getRecipeByID($recipeID);

                        break;
                        default:
                            http_response_code(405);
                            echo json_encode(["message" => "Méthode non autorisée"]);
                            break;
        }*/

/*} catch(Exception $e){
    $erreur =[
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}*/

?>