<?php

// Liste des routes disponibles
$routes = [
    '/Rattrapage_Bloc_3/' => './PageMainDeco.php',
    '/Rattrapage_Bloc_3/api/home' => '/Rattrapage_Bloc_3/API.php',
    '/Rattrapage_Bloc_3/home' => './PageMainDeco.php',

    '/Rattrapage_Bloc_3/loginuser' => './PageLogin.php',
    '/Rattrapage_Bloc_3/signinuser' => './PageSignIn.php',


    '/Rattrapage_Bloc_3/accueil' => './PageMain.php',
    '/Rattrapage_Bloc_3/api/accueilMods' => '/Rattrapage_Bloc_3/API.php',
    '/Rattrapage_Bloc_3/accueilMods' => './PageMainMods.php',
    '/Rattrapage_Bloc_3/recette/([0-9]+)' => './PageRecipe.php', 
    '/Rattrapage_Bloc_3/api/recette/([0-9]+)' => '/Rattrapage_Bloc_3/API.php',     # Permet d'afficher une recette selon son ID
    '/Rattrapage_Bloc_3/recetteMods/([0-9]+)' => './PageRecipeMods.php',
    '/Rattrapage_Bloc_3/api/recetteMods/([0-9]+)' => '/Rattrapage_Bloc_3/API.php',
    '/Rattrapage_Bloc_3/IngrMods' => './PageIngrMods.php',
    '/Rattrapage_Bloc_3/api/IngrMods/([0-9]+)' => '/Rattrapage_Bloc_3/API.php',
    

    '/Rattrapage_Bloc_3/user' => './PageUser.php',
    '/Rattrapage_Bloc_3/api/Recipeuser' => '/Rattrapage_Bloc_3/API.php',
    '/Rattrapage_Bloc_3/newIngredient' => './PageAddIngredient.php',
    '/Rattrapage_Bloc_3/newRecipe' => './PageCreateRecipe.php',
    '/Rattrapage_Bloc_3/SubmittedRecipe' => './RecetteEnCours.php',
    '/Rattrapage_Bloc_3/SubmittedIngredient' => './IngredientEnCours.php',

    '/Rattrapage_Bloc_3/mods' => './PageMods.php',

];

// Récupérer l'URL demandée
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Vérifier si la route existe dans le tableau
if (array_key_exists($request, $routes)) {
    require $routes[$request];   // Si la route existe, alors on affiche la page correspondante.
    exit;
    
} else {

    foreach ($routes as $route => $page) {

        // Vérifie si l'URL demandée correspond à un pattern de route
        if (preg_match('#^/Rattrapage_Bloc_3/recette/([0-9]+)$#', $request, $matches)){

            // Si une recette avec un ID est demandée et est trouvée
            $idRecette = $matches[1];  // Récupère l'ID de la recette depuis l'URL
            $_GET['id'] = $idRecette;  // Met l'ID dans $_GET pour l'utiliser dans la page
            require $page; // Charge la page associée
            exit;

        } elseif (preg_match('#^/Rattrapage_Bloc_3/recetteMods/([0-9]+)$#', $request, $matches)) {

            require $page; // Charge la page associée
            exit;

        }
    }

    // Si la route n'existe pas, afficher une page d'erreur 404
    echo "Cette page n'existe pas";
    http_response_code(404);
}