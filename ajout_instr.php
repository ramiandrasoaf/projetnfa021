<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ajouter instrument</title>
    <?php include_once "inc/head_inc.php"; ?>
</head>
<body>


<?php include_once "inc/header_inc.php"; ?>

<div class="container">

    <!-- On envoie les données au serveur par javascript -->
    <form method="post" enctype="multipart/form-data" action="ajout_instr_action.php">

        Si vous voulez ajoutez un instrument à ce site, remplissez ce formulaire :<br>

        <div class="form-group mt-2">
            <label for="instrumentInput">Instrument :</label>
            <input class="form-control col-3" id="instrumentInput" name="instrument" placeholder="Votre instrument"
                   type="text">
            <span class="error" id="instr_nom_error"></span>
        </div>

        <div class="mb-2">
            Type :
            <span class="error" id="instr_type_error"></span>
            <br id="instr_type_content">
                <input type="radio" id="1" name="choice">Instrument à cordes </br>
                <input type="radio" id="2" name="choice">Instrument à vent</br>
                <input type="radio" id="3" name="choice">Instrument à percussion</br>
            </div>
        </div>

        <div class="form-group">
            <label for="aproposTextArea">A propos :</label>
            <textarea class="form-control" cols="20" id="aproposTextArea" name="instr_apropos" rows="5"></textarea>
        </div>
        <input type="button" class="float-right btn btn-secondary" id="submitInstrument" value="Ajouter">

    </form>

    <div class="clearfix"></div>
</div>

<?php include_once "inc/footer_inc.php"; ?>

<?php include_once "inc/javascript_body_inc.php"; ?>

<script src="js/instrument.js" type="text/javascript"></script>

</body>
</html>