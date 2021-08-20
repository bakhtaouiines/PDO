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
if (isset($_GET['submitSearchPatient'])) {
    if (!empty($_GET['searchPatient'])) {
        $SearchPatientsList = htmlspecialchars($_GET['searchPatient']);
        $SearchPatientsList = trim($SearchPatientsList); // supprime les espaces dans la requête de l'internaute
        $SearchPatientsList = strip_tags($SearchPatientsList); // supprime les balises html dans la requête
        $PatientsList = $Patients->searchPatient($SearchPatientsList);
    }

}

// On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('../vue/liste-patients.php');
