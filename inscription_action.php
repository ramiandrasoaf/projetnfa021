<?php


// Inclus des fichiers de dépendances.
include_once 'inc/db_connection_inc.php';


// Declaration des classes à utliser


// Defintion des constantes
define('EMAIL_REGEX', '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/');


//Déclaration des variables globales
$erreurs = [];
$erreurExists = false;

// Récupération des données postées depuis l'écran
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$pseudo = $_POST["pseudo"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$phone = $_POST["phone"];


// Validation des données
if (!isset($nom)) {
    $erreurs["nom"] = "Le nom est obligatoire.";
    $erreurExists = true;
}

if (!isset($prenom)) {
    $erreurs["prenom"] = "Le prénom est obligatoire.";
    $erreurExists = true;
}

if (!isset($pseudo)) {
    $erreurs["pseudo"] = "Le pseudo est obligatoire.";
    $erreurExists = true;
}

if (!isset($phone)) {
    $erreurs["phone"] = "Le numéro de téléphone est obligatoire.";
    $erreurExists = true;
}

if (!isset($password)) {
    $erreurs["password"] = "Le mot de passe est obligatoire.";
    $erreurExists = true;
}

if (!isset($confirmPassword)) {
    $erreurs["confirmPassword"] = "La confirmation du mot de passe est obligatoire.";
    $erreurExists = true;
}

if ($confirmPassword !== $password) {
    $erreurs["confirmedPassword"] = "Le mot de passe ne correspond pas à celui de la confirmation.";
    $erreurExists = true;
}

if (!isset($email)) {
    $erreurs["email"] = "L'e-mail est obligatoire.";
    $erreurExists = true;
} else if (!preg_match(EMAIL_REGEX, $email)) {
    $erreurs["email"] = "Le format de l'e-mail est incorrect. (xxxx@yyyy.zzz)";
    $erreurExists = true;
}
// --Fin validation


if (!$erreurExists) {

    //  Avant l'insertion vérifions s'il existe déjà des enregistrements liés aux clé unique
    //  $nbEmailQuery = "SELECT COUNT(id_utilisateur) as count FROM `utilisateurs` WHERE `email` = '$email'";
    //  $nbPseudoQuery= "SELECT COUNT(id_utilisateur) as count FROM `utilisateurs` WHERE `pseudo`= '$pseudo'";

    // $nbEmailResult = mysqli_query($con, $nbEmailQuery) or die(mysqli_error($con));


    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Préparation de la requête sql pour l'enregistrement des données
    $query = "INSERT INTO `utilisateurs` (`nom`, `prenom`, `email`, `password`, `phone`, `pseudo`) VALUES ('$nom', '$prenom', '$email', '$password_hash', '$phone', '$pseudo')";

    $result = mysqli_query($con, $query) or die(mysqli_error($con));


    if ($result) {

        // Mettre le type de contenue de la reponse a json
        header('Content-Type: application/json');

        // Encoder la reponse sous forme json
        echo json_encode(array("success" => array("code" => 200, "value" => "L'utilisateur $pseudo a bien été créé avec success")), JSON_UNESCAPED_UNICODE);
    }

} else {
    echo json_encode(array("error" => array("code" => 500, "value" => $erreurs)), JSON_UNESCAPED_UNICODE);
}
