<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion</title>
    <?php include_once "inc/head_inc.php"; ?>
</head>
<body>

<?php include_once "inc/header_inc.php"; ?>
<form id="Formconnexion" class="text-center border border-light p-5" method="post" enctype="multipart/form-data"
      action="connexion_action.php">
    <div class="card w-25 mx-auto"  >
        <div class="card-body ">
        <label for="exampleInputEmail">Utilisateur</label>
        <input type="text" class="form-control" id="exampleInput" aria-describedby="emailHelp" placeholder="Email/pseudo">
        </div>
        <div class="card-body ">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="" >
        </div>
        <div class="card-body ">
    <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>
    </div>
</form>

<?php include_once "inc/footer_inc.php"; ?>

<?php include_once "inc/javascript_body_inc.php"; ?>

<script src="js/inscription.js" type="text/javascript"></script>

</body>
</html>
