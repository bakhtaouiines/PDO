<?php
// On charge le fichier du modèle.
require('../modele/appointments.php');

$PatientId = new Appointments;
$getPatientId = $PatientId->getAllPatientById();

$NewAppointment = new Appointments;

$errors = [];
if (isset($_POST['buttonAddAppointment'])) {
    if (empty($_POST['patient'])) {
        $errors['patient'] = 'Aucun patient n\'a été sélectionné';
    } else {
        $PatientId->patient = htmlspecialchars($_POST['patient']);
    }
    if (empty($errors)) {
        $NewAppointment->addAppointment();
    }
}

require('../vue/ajout-rendezvous.php');
