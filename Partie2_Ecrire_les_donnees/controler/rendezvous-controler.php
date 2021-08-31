<?php
// On charge le fichier du modèle.
require('../modele/appointments.php');
require('../modele/patients.php');
require('../modele/dataBase.php');

// on instancie un nouvel objet Appointment pour modifier ultérieurement les infos d'un rdv
$AppointmentInfo = new Appointments;
// on stocke dans une variable la fonction qui va appeler toutes les informations du rdv
$AppointmentInfo->id = $_GET['rdvId'];
$Appointment = $AppointmentInfo->getAppointmentInfo();

///////////////////////////
$Patient = new Patients;
// on stocke l'ID du patient, que l'on va modifier
$Patient->id = $Appointment->idPatients;
// on stocke dans une variable la fonction qui va appeler toutes les informations du patient
$PatientInfo = $Patient->getPatientInfo();


$errors = [];
// lorsqu'on clique sur le bouton "modifier les informations : 
if (isset($_POST['updateAppointment'])) {

    if (empty($_POST['updatedDateHour'])) {
        $errors['updatedDateHour'] = 'Les modifications de jour et d\'horaire n\'ont pas été renseigné';
    } else {
        $AppointmentInfo->dateHour = htmlspecialchars($_POST['updatedDateHour']); // On hydrate l'attribut dateHour de l'objet $Appointment et on convertit les caractères spéciaux en entités HTML
    }
    if (empty($errors)) {
        $AppointmentInfo->updateAppointmentInfo();
        header('Location: ../controler/rendezvous-controler.php?rdvId=' . $_GET['rdvId']);
    }
}

// suppression du rdv
if (isset($_POST['deleteAppointment'])) {
    // si l'ID de l'utilisateur a été récupéré dans l'URL
    if (isset($_GET['rdvId'])) {
        $DeleteAppointmentInfo = new Appointments;
        $DeleteAppointmentInfo->id = htmlspecialchars($_GET['rdvId']);
        $DeleteAppointment = $DeleteAppointmentInfo->deleteAppointment();
        // si tout est ok, on redirige vers la page de la liste des rdv
        header('Location: liste-rendezvous-controler.php');
    }
}


require('../vue/rendezvous.php');
