<?php
// On charge le fichier du modèle.
require('../modele/appointments.php');

// instance d'un nouvel objet pour appeler les info du clients
$PatientId = new Appointments;
// on stocke dans une variable la fonction qui va appeler les informations souhaitées du patient
// on appelle la variable dans la VUE
$getPatientId = $PatientId->getAllPatientById();

// instance d'un nouvel objet pour créer un rdv
$NewAppointment = new Appointments;

$errors = [];

// lorsqu'on clique sur le bouton "ajouter un rendez-vous"
if (isset($_POST['buttonAddAppointment'])) {
    // on vérifie qu'un patient a bien été sélectionné
    if (empty($_POST['idPatients'])) {
        $errors['idPatients'] = 'Aucun patient n\'a été sélectionné';
    } else {
        // On hydrate l'attribut idPatients de l'objet $PatientId et on convertit les caractères spéciaux en entités HTML
        $NewAppointment->idPatients = htmlspecialchars($_POST['idPatients']);
    }

    if (empty($_POST['appointmentDateHour'])) {
        $errors['appointmentDateHour'] = 'Aucune date et/ou heure n\'a été sélectionné';
    } else {
        $NewAppointment->dateHour = htmlspecialchars($_POST['appointmentDateHour']);
    }
    if (empty($errors)) {
        $NewAppointment->addAppointment();
    }
}

require('../vue/ajout-rendezvous.php');
