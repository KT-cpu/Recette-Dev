<?php

session_start();

if (isset($_POST['submit']))
{
    $name = htmlspecialchars($_POST['nom']);
    $password = htmlspecialchars($_POST['password']);

    $con = new PDO("mysql:host=localhost;dbname=recettedev", 'root', '');

    if (empty($name) || empty($password)) {
        $_SESSION['message'] = "Login failed.";
        echo $_SESSION['message'];
        header('Location: PageLogin.php');
    } else {
        $sql = "SELECT * FROM user WHERE MDP = '$password' ";
        $result = $con->prepare($sql);
        $result->execute();
        $data = $result->fetch();
        
        if ($data) {
    $_SESSION['user_id'] = $data['IDUsers'];
    $_SESSION['user_pseudo'] = $data['Pseudo'];
    $_SESSION['user_role'] = $data['Role'];

    //$nom = $data['Pseudo'];
    //$role = $data['Role']; // Attribuer la valeur à une variable PHP
    echo "mon rôle est", $data['Role'];
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
} else {
    echo "Aucun utilisateur trouvé.";
}

?>