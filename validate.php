<?php

    //Where ID = $ID récupéré
    $sql = "INSERT INTO recette_ingredient SELECT * FROM check_recette_ingredient WHERE IDCheckRecette = 8";
    $stmt = $con->prepare($sql);
    $stmt->execute();


    // Where ID = $ID récupéré
    $sql = "INSERT INTO recettes SELECT * FROM check_recettes WHERE IDCheckRecette = 8";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    
    $sql = "DELETE FROM check_recette_ingredient WHERE IDCheckRecette = 8";
    $stmt = $con->prepare($sql);
    $stmt->execute();


    $sql = "DELETE FROM check_recettes WHERE IDCheckRecette = 8";
    $stmt = $con->prepare($sql);
    $stmt->execute();

?>