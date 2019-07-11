<?php

// Inclus des fichiers de dépendances.
include_once 'inc/db_connection_inc.php';


//Déclaration des variables globales
$utilisateurs = [];
$_SESSION["login_empty"] = false;

// Recupération des données postées depuis l'écran.
$username = $_POST["username"];
$login = $_POST["login"];


// Validation des données
if(!isset($username) || !isset($login)) {
    $_SESSION["login_empty"] = "Le nom ou mot de passe est obligatoire";
    return;
}



// Preparation de la requête
$query = "SELECT email,password,pseudo  FROM `utilisateurs` WHERE `password`= " . password_hash('$login') ."  AND (`email`='$username' OR `pseudo`='$username')";

$result = mysqli_query($con, $query) or die(mysqli_error($con));


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $utilisateurs[] = array("email" => $row["email"],
            "password" => $row["password"],
            "pseudo" => $row["pseudo"]
        );
    }
}

echo json_encode($utilisateurs, JSON_UNESCAPED_UNICODE);

