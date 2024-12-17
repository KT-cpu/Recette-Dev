<?php
    //- Définir les constantes de connexion à la BDD
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'cooking');
    define('DB_USER', 'root');
    define('DB_PASS', '');


    //- Inclure le fichier de configuration de la base de données
    require_once 'config/db_connection.php';

    //- Établir la connexion à la base de données
    try {
        $database = new Database();
        $pdo = $database->getConnection();
    } catch (PDOException $e) {
        header('Content-Type: application/json');
        http_response_code(500);
        echo json_encode(['error' => 'Erreur de connexion à la base de données: ' . $e->getMessage()]);
        exit;
    }



    //- Variables de 
    $uri            = $_SERVER['REQUEST_URI']; //- Permet de récupérer l'adresse requêtée par le client
    $method         = $_SERVER['REQUEST_METHOD']; //- Permet de récupérer la méthode utilisée par le client POST, GET, PUT, DELETE

    //- Tableau des utilisateurs autorisés
    $validUsers = [
        'kassandre' => 'Azerty123',
        'florian' => 'Azerty456'
    ];
    

    //- Encodage du contenu renvoyé par la page web en JSON
    header('Content-Type: application/json');


    //- Vérifie l'authentification
    if (!isset($_SERVER['PHP_AUTH_USER']) || 
        !isset($_SERVER['PHP_AUTH_PW']) || 
        !array_key_exists($_SERVER['PHP_AUTH_USER'], $validUsers) || 
        $validUsers[$_SERVER['PHP_AUTH_USER']] !== $_SERVER['PHP_AUTH_PW']) {
        
        header('WWW-Authenticate: Basic realm="My Ingredients API"');
        header('HTTP/1.0 401 Unauthorized');
        echo json_encode(['error' => 'Authentication required']);
        exit;
    }



    /**
     * Gestion des routes
     */
    switch ($method | $uri) {
        
        /*
        * Path: GET /api/ingredients
        * Task: Pour afficher tous les ingrédients
        */
        case ($method == 'GET' && $uri == '/ingredients'):
            // echo json_encode(['message' => "Someday there will be ingredients here ! You must fill the fridge first ..."]);
            
            $stmt = $pdo->query('SELECT * FROM ingredients');
            $ingredients = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($ingredients, JSON_PRETTY_PRINT);

        break;

        /*
        * Path: GET /api/ingredients/{id}
        * Task: Pour n'avoir qu'un seul ingrédient
        */
        case ($method == 'GET' && preg_match('/\/ingredients\/[1-9]/', $uri)):
            $id = basename($uri);
            $stmt = $pdo->prepare('SELECT * FROM ingredients WHERE id = ?');
            $stmt->execute([$id]);
            $ingredient = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$ingredient) {
                http_response_code(404);
                echo json_encode(['error' => "Cet ingrédient n'existe pas"]);
                break;
            }
            
            echo json_encode($ingredient, JSON_PRETTY_PRINT);
        break;

        

        /*
        * Path: POST /ingredients
        * Task: Enregistrer un ingredient
        */
        case ($method == 'POST' && $uri == '/ingredients'):
            
            //- 1 - Je décode le contenu envoyé par le client dans le Body
            $requestBody = json_decode(file_get_contents('php://input'), true);         
            
            //- 2 - On récupère le contenu de chaque clé du body dans des variables dédiées
            $nom   = $requestBody['nom'] ?? '';
            $unite  = $requestBody['unite'] ?? '';
            
            //- 3 - On vérifie que ce que l'on reçoit du client n'est pas vide 
            if (empty($nom) || empty($unite)) {
                http_response_code(400);
                echo json_encode(['error' => "Veuillez entrer le nom de l'ingrédient et l'unite"]);
                break;
            }
            
            //- 4 - Utilisation de l'objet PDO pour préparer la requête d'insertion en BDD
            $stmt = $pdo->prepare('INSERT INTO ingredients (nom, unite) VALUES (?, ?)');
            $stmt->execute([$nom, $unite]);
            
            //- 5 - On récupère le dernier id pour la table dans laquelle on insère
            $newId = $pdo->lastInsertId();
            
            //- 6 - On envoie un message de confirmation au client comme quoi tout s'est bien déroulé.
            echo json_encode([
                'message' => 'Ingrédient ajouté avec succès', 
                'id' => $newId
            ]);
        break;



        case ($method == 'PUT' && preg_match('/\/ingredients\/[1-9]/', $uri)):
            
            $id = basename($uri);
            $requestBody = json_decode(file_get_contents('php://input'), true);
        
            // Récupérer les valeurs avec des valeurs par défaut
            $name = $requestBody['nom'] ?? null;
            $unit = $requestBody['unite'] ?? null;
        
            // Vérifier s'il y a au moins une valeur à mettre à jour
            if ($name === null && $unit === null) {
                http_response_code(400);
                echo json_encode(['error' => 'Aucune donnée à mettre à jour']);
                break;
            }
        
            // Préparer la requête de mise à jour dynamiquement
            $updateFields = [];
            $params = [];
        
            if ($name !== null) {
                $updateFields[] = 'nom = ?';
                $params[] = $name;
            }
        
            if ($unit !== null) {
                $updateFields[] = 'unite = ?';
                $params[] = $unit;
            }
        
            // Ajouter l'ID à la fin des paramètres
            $params[] = $id;
        
            // Construire la requête SQL
            $sql = 'UPDATE ingredients SET ' . implode(', ', $updateFields) . ' WHERE id = ?';
            
            try {
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute($params);
                
                if ($stmt->rowCount() === 0) {
                    http_response_code(404);
                    echo json_encode(['error' => "Cet ingrédient n'existe pas"]);
                    break;
                }
                
                echo json_encode(['message' => 'Ingrédient modifié avec succès']);
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(['error' => 'Erreur lors de la mise à jour : ' . $e->getMessage()]);
            }
        break;
        

        /*
        * Path: DELETE /ingredients/{id}
        * Task: Effacer un ingredient
        */
        case ($method == 'DELETE' && preg_match('/\/ingredients\/[1-9]/', $uri)):
            $id = basename($uri);

            $stmt = $pdo->prepare('DELETE FROM ingredients WHERE id = ?');
            $stmt->execute([$id]);
            
            if ($stmt->rowCount() === 0) {
                http_response_code(404);
                echo json_encode(['error' => "Cet ingrédient n'existe pas"]);
                break;
            }

            echo json_encode(['message' => 'Ingredient retiré avec succès']);
        break;


        default:
            http_response_code(404);
            echo json_encode(['error' => "We cannot find what you're looking for."]);
        break;
    
    }


?>