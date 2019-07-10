<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Formulaire d'inscription</title>
    <?php include_once "inc/head_inc.php"; ?>
</head>
<body>

<?php include_once "inc/header_inc.php"; ?>

<form id="inscriptionForm" class="text-center border border-light p-5" method="post" enctype="multipart/form-data"
      action="inscription_action.php">
    <div class="card w-25 mx-auto">
        <div class="card-body ">
            <h4 class="card-title text-center my-4">Inscription</h4>

            <div class="form-row mb-4">
                <div class="col">
                    <input type="text" id="nomImput" class="form-control" placeholder="Nom" required>
                </div>
                <div class="col">
                    <input type="text" id="prenomInput" class="form-control" placeholder="Prénom" required>
                </div>
            </div>

            <input type="text" id="pseudoInput" class="form-control mb-4" placeholder="Pseudo" required>

            <input type="email" id="emailInput" class="form-control mb-4" placeholder="E-mail" required>


            <input type="password" id="passwordInput" class="form-control" placeholder="Mot de passe"
                   aria-describedby="passwordBlockAide" required>
            <small id="passwordBlockAide" class="form-text text-muted mb-4">
                Au moins 8 caractères et 1 nombre
            </small>

            <input type="password" id="confirmationPasswordInput" class="form-control mb-4"
                   placeholder="Confirmation du mot de passe" required>


            <input type="text" id="phoneInput" class="form-control" placeholder="Numéro téléphone" required>


            <button class="btn btn-primary my-4 btn-block" type="submit">Envoyer</button>
        </div>
    </div>

</form>

<?php include_once "inc/footer_inc.php"; ?>

<?php include_once "inc/javascript_body_inc.php"; ?>

<script src="js/inscription.js" type="text/javascript"></script>

</body>
</html>