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
    <form method="post" enctype="multipart/form-data">

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
            <div class="form-check">
                <input class="form-check-input" id="instr_cord" name="instr_type_radio" type="radio" value="instr_cord">
                <label class="form-check-label" for="instr_cord">
                    Instrument à  cordes
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" id="instr_vent" name="instr_type_radio" type="radio" value="instr_vent">
                <label class="form-check-label" for="instr_vent">
                    Instrument à vent
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" id="instr_percu" name="instr_type_radio" type="radio"
                       value="instr_percu">
                <label class="form-check-label" for="instr_percu">
                    Instrument à  percussion
                </label>
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

<script src="js/instrument.js" type="text/javascript" ></script>

</body>
</html>