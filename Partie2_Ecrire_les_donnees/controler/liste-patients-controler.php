<?php
// On charge le fichier du modèle.
require('../modele/patients.php');
require('../modele/appointments.php');
$Patients = new Patients;
$PatientsList = $Patients->getPatientsList();


// suppression du patient de la liste
if (isset($_POST['deletePatientAndAppointment'])) {
    $DeletePatientInfo = new Appointments;
    $DeletePatientInfo->idPatients;
    $DeletePatient = $DeletePatientInfo->deleteAppointmentPatient();
}

// suppression du patient ET ses rdv depuis la liste 
if (isset($_POST['deletePatient'])) {
    $DeletePatientFromList = new Patients;
    $DeletePatientFromListTest = $DeletePatientFromList->deletePatient();
    // si tout est ok, on redirige vers la page de la liste des patients
    header('Location: liste-patients-controler.php');
}

// On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('../vue/liste-patients.php');
