<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion</title>
    <?php include_once "inc/head_inc.php"; ?>
</head>
<body>

<?php include_once "inc/header_inc.php"; ?>

<form id="form_connexion" class="text-center p-5" method="post" enctype="multipart/form-data"
      action="connexion_action.php">
    <div class="card w-17 mx-auto">
        <div class="card-body ">
            <h5 class="card-title">Connexion</h5>
            <?php
            if (isset($_SESSION["error"])) {
                ?>
                <div class="text-danger my-2">
                    <small><?= $_SESSION["error"] ?> </small>
                </div>
            <?php } ?>

            <div class="my-4">
                <input type="text" class="form-control" name="username" id="username_input" aria-describedby="emailHelp"
                       placeholder="Email / Pseudo" required>
            </div>
            <div class="my-4">
                <input type="password" class="form-control" name="password" id="password_input"
                       placeholder="Mot de passe" required>
            </div>
        </div>
        <div class="mb-2">
            <button id="connexionbtn" type="submit" class="btn btn-primary">Se connecter</button>
        </div>
        <div class="mb-2">
            <a href="inscription.php">
                <small>Créer un nouveau compte</small>
            </a>
        </div>
    </div>
</form>

<?php include_once "inc/footer_inc.php"; ?>

<?php include_once "inc/javascript_body_inc.php"; ?>

<script src="js/inscription.js" type="text/javascript"></script>

</body>
</html>
