<?php
            require_once('mainrecipe.php');
            //session_start();

            //echo $_SESSION['user_role'];

            /*$con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

            //Simple requête + récupère l'id de la recette
            $sql = "SELECT Titre, IDRecette, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette ASC";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            $Titre = $data['Titre'];
            $Pseudo = $data['Pseudo'];
            $_SESSION['id_recette'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }


            $sql = "SELECT Titre, IDRecette, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette ASC LIMIT 1, 1";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            $Titre2 = $data['Titre'];
            $Pseudo2 = $data['Pseudo'];
            $_SESSION['id_recette'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }


            $sql = "SELECT Titre, IDRecette, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette ASC LIMIT 2, 1";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            $Titre3 = $data['Titre'];
            $Pseudo3 = $data['Pseudo'];
            $_SESSION['id_recette'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }


            /////////////////////////Requête dernier éléments + récupère l'id de la recette/////////////////////

            $sql = "SELECT Titre, IDRecette, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette DESC";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            $Titre4 = $data['Titre'];
            $Pseudo4 = $data['Pseudo'];
            $_SESSION['id_recette'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }

            $sql = "SELECT Titre, IDRecette, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette DESC LIMIT 1, 1";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            $Titre5 = $data['Titre'];
            $Pseudo5 = $data['Pseudo'];
            $_SESSION['id_recette'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }


            $sql = "SELECT Titre, IDRecette, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers ORDER BY IDRecette DESC LIMIT 2, 1";
            $result = $con->prepare($sql);
            $result->execute();
            $data = $result->fetch();
        
            if ($data) {
            $Titre6 = $data['Titre'];
            $Pseudo6 = $data['Pseudo'];
            $_SESSION['id_recette'] = $data['IDRecette'];
            //echo $_SESSION['id_recette'];
            }


        

            /*foreach ($con->query("SELECT Titre, Pseudo FROM recettes JOIN user ON recettes.IDUsers = user.IDUsers") as $row)
            {
                echo "<br />" . $row['Titre'] . " " . $row['Pseudo'];
            }*/

    
            
        ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon" href= "../../Rattrapage Bloc 3/Ressources/stir-fry.png">
    <link rel="stylesheet" href="PageMain.css">
    
</head>

    <body>
    <header>
    <div class="container">
        <button class="Menu_Principal"><a href="PageMain.php" class="fill-div"></a></button>
    <div>
        <form name="searchbar" method="get">
            <input type="text" name="keywords" placeholder="Recherche" class="BarreRecherche"/>
            <button class="Valider"><a href="PageRecherche.php" class="fill-div"></a></button>
        </form>
    </div>
    <div class="dropdown">
        <button class="Menu_User"><a href="" class="fill-div"></a></button>
        <div class="dropdown-content">
            <a href="PageUser.php">Mon Espace</a>
            <a href="PageCreateRecipe.php">Créer une recette</a>
            <a href="PageAddIngredient.php">Ajouter un ingrédient</a>
            <a href="PageMainDeco.php" action="disconnect.php">Déconnexion</a>
          </div>
    </div>
    </div>
    </header>
    <main>
    <div class="Nouveau">
   <h2 class="H2New">Nouveautés :</h2>
   <div>

        <button class="Card1"><a href="PageRizauLait.php" class="fill-div"><img src="Images/<?php echo $img4 ?>" class="IMGButton1">
            <div class="Test">
            <div class="title"><?php echo $Titre4 ?></div>
            <div class="name"><?php echo $Pseudo4 ?></div>
            </div>
        </a></button>
        <button class="Card2"><a href="PageRizauLait.php" class="fill-div"><img src="Images/<?php echo $img5 ?>" class="IMGButton2">
            <div class="Test2">
            <div class="title"><?php echo $Titre5 ?></div>
            <div class="name"><?php echo $Pseudo5 ?></div>
            </div>
        </a></button>
        <button class="Card3"><a href="PageRizauLait.php" class="fill-div"><img src="Images/<?php echo $img6 ?>" class="IMGButton3">
            <div class="Test3">
            <div class="title"><?php echo $Titre6 ?></div>
            <div class="name"><?php echo $Pseudo6 ?></div>
            </div>
        </a></button>
   </div>
    </div>
    <hr class="HR">
    <div class="Recettes">
   <h2 class="H2Receip">Recettes :</h2>
   <div>
    <button class="Card4"><a href="PageRizauLait.php" class="fill-div"><img src="Images/<?php echo $img ?>" class="IMGButton4">
            <div class="Test4">
            <div class="title"><?php echo $Titre ?></div>
            <div class="name"><?php echo $Pseudo ?></div>
            </div>
            </a></button>
    <button class="Card5"><a href="PageRizauLait.php" class="fill-div"><img src="Images/<?php echo $img2 ?>" class="IMGButton5">
            <div class="Test5">
            <div class="title"><?php echo $Titre2 ?></div>
            <div class="name"><?php echo $Pseudo2 ?></div>
            </div>
            </a></button>
    <button class="Card6"><a href="PageRizauLait.php" class="fill-div"><img src="Images/<?php echo $img3 ?>" class="IMGButton6">
            <div class="Test6">
            <div class="title"><?php echo $Titre3 ?></div>
            <div class="name"><?php echo $Pseudo3 ?></div>
            </div>
            </a></button>
   </div>
    </div>
</main>

<footer class="Footer">
    <div>
    <div class="FooterTxT">Mon Footer</div>
    </div>
</footer>

<style>
  .dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

</body>