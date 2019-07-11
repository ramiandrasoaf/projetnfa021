<?php

// Inclus des fichiers de dépendances.
include_once 'inc/db_connection_inc.php';


//Déclaration des variables globales
$utilisateur = [];
$_SESSION["login_empty"] = null;

// Recupération des données postées depuis l'écran.

if(isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];


    // Preparation de la requête
    $query = "SELECT id_utilisateur, password, pseudo  FROM `utilisateurs` WHERE  (`email`='$username' OR `pseudo`='$username')";

    $result = mysqli_query($con, $query) or die(mysqli_error($con));


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            if(password_verify($password, $row["password"])) {
                $utilisateur = array("id_utilisateur" => $row["id_utilisateur"] , "pseudo" => $row["pseudo"] );
                $_SESSION["user"] = $utilisateur;
            }   else {
                $_SESSION["error"] = "Le nom ou mot de passe est incorrect.";
                break;
            }
        }
    }

    if(isset($_SESSION["user"])) {
        header('Location: index.php');
    } else {
        header("Location: connexion.php");
    }
}


