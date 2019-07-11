<?php

// Inclus des fichiers de dépendances.
include_once 'inc/db_connection_inc.php';


//Déclaration des variables globales
$utilisateur = [];


// Preparation de la requête
$query = "SELECT email,password,pseudo  FROM `utilisateurs` WHERE `password`= password_hash('$login') AND (`email`='$username' OR `pseudo`='$username')";

$result = mysqli_query($con, $query) or die(mysqli_error($con));


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $utilisateur[] = array("email" => $row["email"],
            "password" => $row["password"],
            "pseudo" => $row["pseudo"]
        );
    }
}

echo json_encode($utilisateur, JSON_UNESCAPED_UNICODE);

