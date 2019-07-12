<?php session_start(); ?>

<!doctype html>
<html lang="fr">
<head>
    <?php include_once "inc/head_inc.php";?>
    <title>Page principale</title>
</head>
<body class="bg-img">

<?php include_once "inc/header_inc.php"; ?>
<div class="container-fluid text-white">
    <main>
        <div class="ml-4 w-50">
            <h2 class="my-5"><b>Bienvenue dans l'univers de la musique!</b></h2>
            <h6>Approfondissez vos connaissances des instruments de musique,
                partagez-les en ajoutant un <a href="ajout_instr.php">instrument</a> et tout ce qu'il y a à savoir sur
                lui en vous
                <a href="inscription.php">inscrivant</a> sur le site!</br>Si vous avez déjà passé l'étape de
                l'inscription,
                connectez-vous <a href="connexion.php">ici</a>.</h6>
        </div>

    </main>

</div>
<?php  include_once "inc/footer_inc.php";?>
<?php include_once "inc/javascript_body_inc.php"; ?>

</body>
</html>

