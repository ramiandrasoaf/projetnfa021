<?php
session_start();

// Inclus des fichiers de dépendances.
include_once 'inc/db_connection_inc.php';


//Déclaration des variables globales
$instrumentTypes = [];

// Preparation de la requête
$query = "SELECT id_instr_type, code, libelle FROM `types_instrument`";

$result = mysqli_query($con, $query) or die(mysqli_error($con));


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $instrumentTypes[] = array("id_instr_type" => $row["id_instr_type"],
            "code" => $row["code"],
            "libelle" => $row["libelle"]
        );
    }
}

echo json_encode($instrumentTypes, JSON_UNESCAPED_UNICODE);
