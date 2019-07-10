<?php

//include_once 'inc/db_connection_inc.php';


// Récupération des données postées

$instrument = $_POST['instrument'];
$instrumentType = $_POST['instrumentType'];
$instrumentApropos = $_POST['instrumentApropos'];

$erreurExiste = false;
$erreurs = [];

// Validation des données
if(!isset($instrument)) {
    // TODO remonter l'erreur
}

if(!isset($instrumentType)) {
    // TODO remonter l'erreur
}

if(!$erreurExiste) {
    $con->query("insert into instruments values ('$instrument','')");


} else {

}



