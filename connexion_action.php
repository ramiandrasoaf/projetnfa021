<?php

session_start();


// Inclus des fichiers de dépendances.
include_once 'inc/db_connection_inc.php';

// Recupération des données postées depuis l'écran.

unset($_SESSION["user"]);
unset($_SESSION["user_token"]);
unset($_SESSION["error"]);

if(isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];


    // Preparation de la requête
    $query = "SELECT id_utilisateur, password, pseudo  FROM `utilisateurs` WHERE  (`email`='$username' OR `pseudo`='$username')";

    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    if (mysqli_num_rows($result) > 0) {
        $passwordMatched = false;

        while ($row = mysqli_fetch_assoc($result)) {

            if(password_verify($password, $row["password"])) {
                $passwordMatched = true;
                $_SESSION["user"] = array("id_utilisateur" => $row["id_utilisateur"], "pseudo" => $row["pseudo"]);
                $_SESSION["user_token"] = bin2hex(random_bytes(78));
                break;
            }

        }

        if (!$passwordMatched) {
            $_SESSION["error"] = "Le email/pseudo ou le mot de passe est incorrect.";
        }

    } else {
        $_SESSION["error"] = "L'utilisateur $username est introuvable";
    }

    if(isset($_SESSION["user"])) {

        if (isset($_SERVER['HTTP_REFERER']) == isset($_SERVER['REQUEST_URI'])) {
            header('Location: index.php');
        } else {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }

    } else {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

