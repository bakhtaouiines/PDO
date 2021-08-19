<?php
// On charge le fichier du modèle.
require('../modele/patients.php');
require('../modele/appointments.php');
$Patients = new Patients;
$PatientsList = $Patients->getPatientsList();

// suppression du patient ET du rdv de la liste
if (isset($_POST['delete_idPatients'])) {
    $DeletePatient = new Appointments;
    $DeletePatient->idPatients = htmlspecialchars($_POST['delete_idPatients']);
    $DeletePatientFromList = $DeletePatient->deleteAppointmentPatient();
    $Patients->id = htmlspecialchars($_POST['delete_idPatients']);
    $Patients->deletePatient();
    header('Refresh:0');
}

// recherche de patient
if (isset($_POST['submitSearchPatient'])) {
    if (!empty($_GET['searchPatient'])) {
        $SearchPatientsList = htmlspecialchars($_GET['patientId']);
        $SearchPatientsList = $Patients->getPatientsList();
        header('Location: ../controler/profil-patient-controler.php?patientId=' . $_GET['patientId']);
    }
}

// On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('../vue/liste-patients.php');
