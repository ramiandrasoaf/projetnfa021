/**
 *  Ce javascript renvoie le nouveau instrument au serveur en utilisant ajax de jquery
 *
 */


$(function () {

    const effaceAlert = () => {
        $('#instr_nom_error').text("");
        $('#instr_nom_error').removeClass("text-danger");
        $('#instr_type_error').text("");
        $('#instr_type_error').removeClass("text-danger");
        $('#message').removeClass("alert alert-danger");
        $('#message').removeClass("alert alert-success");
    }

    const afficherInstrumentObligatoire = () => {
        $('#instr_nom_error').text("L'instrument est obligatoire.");
        $('#instr_nom_error').removeClass("text-danger").addClass("text-danger");
    }

    const afficherTypeInstrumentObligatoire = () => {
        $('#instr_type_error').text("Le type de l'instrument est obligatoire.");
        $('#instr_type_error').removeClass("text-danger").addClass("text-danger");
    }

    /**
     *  Ajouter un nouveau instrument.
     */
    const ajouterInstrument = (donnee) => {

        /**
         *  Cette fonction est appelée dans le cas où le serveur repond avec succès.
         */
        const success = (reponse) => {
            $('#message').removeClass("alert alert-danger");
            $('#message').removeClass("alert alert-success");

            if (reponse.error) {
                $("#message").text(reponse.error.value);
                $('#message').addClass("alert alert-danger");
            } else {
                $("#message").text(reponse.success.value);
                $('#message').addClass("alert alert-success");
            }
        };

        /**
         *  Cette fonction est appelée dans le cas où le serveur présente une erreur.
         */
        const erreur = (statut, erreur) => {

        };

        /**
         * Envoie les données vers le serveur de manière asynchrone.
         */
        $.post('ajout_instr_action.php', donnee, success, "json").fail(erreur);
    };


    // Appeler lors d'un clique sur le bouton Ajouter.
    $("#addInstrumentForm").submit(function (event) {
        event.preventDefault();

        let instrument = $('#instrumentInput').val();
        let instrumentType =  $('input[name=instr_type_radio]:checked').val();
        let instrumentApropos =  $('#aproposTextArea').val();
        let erreurExiste = false;

        effaceAlert();

        //  Validation des données
        if(!instrument) {
            // Envoie le message d'erreur à l'ecran
            afficherInstrumentObligatoire();

            // Empêche le renvoie des données postées depuis l'ecran
            event.preventDefault();
            erreurExiste = true;
        }

        if(!instrumentType) {

            // Envoie le message d'erreur à l'ecran
            afficherTypeInstrumentObligatoire();

            // Empêche le renvoie des données postées depuis l'ecran
            event.preventDefault();

            erreurExiste = true;
        }
        //-- Fin validation


        if(!erreurExiste) {
            let donnee = {
                instrument: instrument,
                instrumentType: instrumentType,
                instrumentApropos: instrumentApropos,
            }

            ajouterInstrument(donnee);
            this.reset();
        }

    });

});

$(function () {

    const success = (array) => {
        $("#instr_type_content").empty();

        array.forEach((el, index, arr) => {
            let dom = '<div class="form-check">' +
                '           <input class="form-check-input" id="instr_cord' + index + '" name="instr_type_radio" type="radio" value="' + el.id_instr_type + '">' +
                '           <label class="form-check-label" for="instr_cord' + index + '">' + el.libelle + '</label>' +
                '      </div>';

            $("#instr_type_content").append(dom);
        });
    }

    const fail = (status, erreur) => {
    }

    let chargerInstrumentType = () => {
        $.get("charger_instrument_type_action.php", success, "json").fail(fail);
    }

    chargerInstrumentType();

});