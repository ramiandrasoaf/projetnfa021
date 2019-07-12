<?php

session_start();

include_once 'inc/db_connection_inc.php';


// Récupération des données postées
$instrument = $_POST['instrument'];
$instrumentType = $_POST['instrumentType'];
$instrumentApropos = $_POST['instrumentApropos'];

$erreurExiste = false;
$erreurs = [];

// Validation des données
if (!isset($instrument)) {
    echo json_encode(array("error" => array("code" => 500, "value" => "L'instrument $instrument est obligatoire.")), JSON_UNESCAPED_UNICODE);
    return;
}

if (!isset($instrumentType)) {
    echo json_encode(array("error" => array("code" => 500, "value" => "L'instrument $instrumentType est obligatoire.")), JSON_UNESCAPED_UNICODE);
    return;
}

if (!$erreurExiste) {
    $token = $_SESSION["user_token"];
    $url = $_SERVER['REQUEST_URI'];

    if (isset($token)) {
        $id_utilisateur = $_SESSION["user"]['id_utilisateur'];

        // Préparation de la requête sql pour l'enregistrement des données
        $query = "INSERT INTO `instruments` (`nom`, `a_propos`, `id_instr_type`, `id_createur`) VALUES ('$instrument', '$instrumentApropos', $instrumentType, $id_utilisateur)";

        $result = mysqli_query($con, $query) or die(mysqli_error($con));

        if ($result) {
            echo json_encode(array("success" => array("code" => 200, "value" => "L'instrument $instrument a bien été créé avec success")), JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(array("error" => array("code" => 500, "value" => "L'instrument $instrument n'a pas pu être créé.")), JSON_UNESCAPED_UNICODE);
        }

    } else {
        header('Location: connection.php?redirect=' . $url);
    }


}



