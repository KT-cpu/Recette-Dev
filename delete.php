<?php


    $sql = "DELETE FROM check_recette_ingredient WHERE IDCheckRecette = :id";
    $stmt = $con->prepare($sql);
    $stmt->execute();


    $sql = "DELETE FROM check_recettes WHERE IDCheckRecette = :id";
    $stmt = $con->prepare($sql);
    $stmt->execute();

?>