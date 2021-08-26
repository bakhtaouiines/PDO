<?php
// On charge le fichier du modèle.
require('../modele/patients.php');
require('../modele/appointments.php');
$Patients = new Patients;

/**
 * Suppression patient + RDV
 */
if (isset($_POST['delete_idPatients'])) {
    $DeletePatient = new Appointments;
    $DeletePatient->idPatients = htmlspecialchars($_POST['delete_idPatients']);
    $DeletePatientFromList = $DeletePatient->deleteAppointmentPatient();
    $Patients->id = htmlspecialchars($_POST['delete_idPatients']);
    $Patients->deletePatient();
    $PatientsList = $Patients->getPatientsList();
}

/**
 * Barre de recherche
 */
$SearchPatientsList = '';
$patientFilter = ['lastname'];
if (!empty($_GET['searchPatient'])) {
    if (!empty($_GET['patientFilter'])) {
        $patientFilter = $_GET['patientFilter'];
    }
    $patientFilterString = implode('&patientFilter%5B%5D=', $patientFilter);
    $SearchPatientsList = htmlspecialchars($_GET['searchPatient']);
    $SearchPatientsList = trim($SearchPatientsList); // supprime les espaces dans la requête AVANT ou APRES
    // $PatientsList = $Patients->searchPatient($SearchPatientsList);
}

/**
 * Pagination
 */
// On détermine le nombre d'articles par page
$numberPatientPerPage = 5;
// On détermine sur quelle page on se trouve
// On récupère le nombre de patients
$numberOfPages = $Patients->totalPagesPatient($SearchPatientsList, $numberPatientPerPage, $patientFilter);
$isCorrectPage = true;
if (!empty($_GET['page'])) {
    if ($_GET['page'] >= 1 && $_GET['page'] <= $numberOfPages) {
        $currentPage = htmlspecialchars($_GET['page']);
    } else {
        $isCorrectPage = false;
    }
} else {
    $currentPage = 1;
}
if ($isCorrectPage) {
    // Calcul du 1er affichage de la page
    $firstPatients = ($currentPage * $numberPatientPerPage) - $numberPatientPerPage;
    // On récupère les valeurs
    $PatientsList = $Patients->infoPagePatient($firstPatients, $numberPatientPerPage, $SearchPatientsList, $patientFilter);
}
// On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('../vue/liste-patients.php');
