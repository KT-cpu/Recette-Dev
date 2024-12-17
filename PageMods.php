<?php

session_start();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes du Programmeur</title>
    <link rel="shortcut icon" type="image/x-icon" href= "../../Rattrapage Bloc 3/Ressources/stir-fry.png">
    <link rel="stylesheet" href="PageMods.css">
    
</head>

<?php if ($_SESSION['user_role'] === 1): ?>
<body>
    <header>
    <div class="container">
        <button class="Menu_Back"><a href="PageMainMods.php" class="fill-div"></a></button>
    <div>
        <button class="Menu_User"><a href="" class="fill-div"></a></button>
        <div class="Username"><?php echo $_SESSION['user_pseudo'] ?></div>
    </div>
    <div class="dropdown">
        <button class="Menu_Hamburger"><a href="" class="fill-div"></a></button>
        <div class="dropdown-content">
            <a href="PageMainDeco.php" action="disconnect.php">Déconnexion</a>
          </div>
    </div>
    </div>
    </header>

    <main>
        
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
</body>
    <?php else: ?>
    <?php echo "Vous ne possédez pas les droits pour accéder à cette page"; ?>
<?php endif; ?>