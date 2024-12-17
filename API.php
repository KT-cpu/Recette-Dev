<?php

require_once("testFonction.php");

//echo $_SERVER['PATH_INFO'];
//echo $_SERVER['REQUEST_URI'];

$method = $_SERVER['REQUEST_METHOD'];
header('Content-Type: application/json');


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
                }else {
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
                    if ($id) {
                        if ($method === 'GET') {

                        $recipesUser = [
                            'MyRecipe1' => getMyRecipe1($id),
                            'MyRecipe2' => getMyRecipe2($id),       // A terminer, on a arrêté car il fallait un token lol
                            'MyRecipe3' => getMyRecipe3($id),
                            'SubmittedRecipe1' => getMySubmittedRecipe1($id),
                            'SubmittedRecipe2' => getMySubmittedRecipe2($id),
                            'SubmittedRecipe3' => getMySubmittedRecipe3($id),
                            'SubmittedIngr1' => getLatestSubmittedIngr1($id),
                            'SubmittedIngr2' => getLatestSubmittedIngr2($id),
                            'SubmittedIngr3' => getLatestSubmittedIngr3($id),
                        ];

                        echo json_encode($recipesUser);

                    exit;

                        }
        
                        // Récupère l'ID utilisateur depuis la session
                        
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

                            $recipeSubmitted = getSubmittedRecipeByID($id);
                            
                            if ($recipeSubmitted) {

                                echo json_encode($recipeSubmitted, JSON_UNESCAPED_UNICODE);

                                exit;

                            } else {
                                http_response_code(404);
                                //echo json_encode(['error' => 'Recette non trouvée']);
                            }
                      
                    }
                    exit;




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
                


    
            default:
                // Ressource inconnue
                http_response_code(404);
                echo json_encode(['error' => 'Ressource non trouvée']);
                exit;
        }
    }
}

?>