<?php
// On charge le fichier du modèle.
require('../modele/appointments.php');


$Patient = new Appointments;
// on y stocke l'ID du patient, que l'on va modifier
$Patient->id = $_GET['patientId'];
// on stocke dans une variable la fonction qui va appeler toutes les informations du patient
$PatientInfo = $Patient->getPatientById();

// on instancie un nouvel objet Appointment pour modifier ultérieurement les infos d'un rdv
$Appointment = new Appointments;
// on stocke dans une variable la fonction qui va appeler toutes les informations du rdv
$AppointmentInfo = $Appointment->getAppointmentInfo();

$errors = [];
// lorsqu'on clique sur le bouton "modifier les informations : 
if (isset($_POST['updateAppointment'])) {

    if (!empty($_POST['updatedDateHour'])) {
        if (preg_match($regex, $_POST['updatedDateHour'])) {
            $Appointment->dateHour = htmlspecialchars($_POST['updatedDateHour']); // On hydrate l'attribut dateHour de l'objet $Appointment et on convertit les caractères spéciaux en entités HTML
        } else {
            $errors['updatedDateHour'] = 'Les modifications de jour et d\'horaire n\'ont pas été renseigné';
        }
        if (empty($errors)) {
            if ($Appointment->updateAppointmentInfo()) {
                header('Location: ../controler/rendezvous-controler.php?patientId=' . $_GET['patientId']);
            } else {
                $errors = 'Une erreur est survenue, veuillez réessayer.';
            }
        }
    }
}

require('../vue/rendezvous.php');
