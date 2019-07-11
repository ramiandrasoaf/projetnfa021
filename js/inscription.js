/**
 * Fichier javascript contenant les scripts pour l'inscription
 */

$(function () {

    // Un regex pour validater le format d'un adresse email.
    const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    /**
     * Créer une inscription de l'utilisateur
     */
    const creerInscription = () => {

        // Recupération des données

        let nom = $("#nomInput").val();
        let prenom = $("#prenomInput").val();
        let pseudo = $("#pseudoInput").val();
        let email = $("#emailInput").val();
        let password = $("#passwordInput").val();
        let confirmPassword = $("#confirmationPasswordInput").val();
        let phone = $("#phoneInput").val();

        // Défintion des functions de retour d'appel

        //console.log("Sending response", nom, prenom, pseudo,email,password, confirmPassword);
        const success = (reponse) => {
            console.log(reponse);
        }

        const fail = (statut, erreur) => {
            console.log(statut);
        }

        // Validation des données

        if (nom &&
            prenom &&
            pseudo &&
            emailRegex.test(email) &&
            password &&
            confirmPassword &&
            confirmPassword === password &&
            phone) {

            let donnee = {
                nom: nom,
                prenom: prenom,
                pseudo: pseudo,
                email: email,
                password: password,
                confirmPassword: confirmPassword,
                phone: phone
            }

            console.log("sending", donnee)
            $.post("inscription_action.php", donnee, success, "json").fail(fail);

        }

    }

    // Appeler lors de la soumission du formulaire
    $("#inscriptionForm").submit(function(event){
        event.preventDefault();
        creerInscription();
    });

});