<?php
// On charge le fichier du modèle.
require('../modele/patients.php');
require('../modele/appointments.php');
$Patients = new Patients;
$PatientsList = $Patients->getPatientsList();

//////// Suppression patient + RDV
if (isset($_POST['delete_idPatients'])) {
    $DeletePatient = new Appointments;
    $DeletePatient->idPatients = htmlspecialchars($_POST['delete_idPatients']);
    $DeletePatientFromList = $DeletePatient->deleteAppointmentPatient();
    $Patients->id = htmlspecialchars($_POST['delete_idPatients']);
    $Patients->deletePatient();
    header('Refresh:0');
}

//////// Barre de recherche
if (isset($_GET['submitSearchPatient'])) {
    if (!empty($_GET['searchPatient'])) {
        $SearchPatientsList = htmlspecialchars($_GET['searchPatient']);
        $SearchPatientsList = trim($SearchPatientsList); // supprime les espaces dans la requête de l'internaute
        $SearchPatientsList = strip_tags($SearchPatientsList); // supprime les balises html dans la requête
        $PatientsList = $Patients->searchPatient($SearchPatientsList);
    }
}

//////// Pagination
// On détermine sur quelle page on se trouve
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}
// On récupère le nombre de patients
$numberOfPatients = $Patients->totalPagesPatient();
$nbPatient = $numberOfPatients->numberPatient;
// On détermine le nombre d'articles par page
$numberResultsPerPage = 5; 
// On calcule le nombre de pages total
$numberOfPages = ceil($nbPatient / $numberResultsPerPage);
// Calcul du 1er affichage de la page
$firstPage = ($currentPage * $numberResultsPerPage) - $numberResultsPerPage;
// On récupère les valeurs
$PatientsList = $Patients->infoPagePatient($firstPage, $numberResultsPerPage);
// On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('../vue/liste-patients.php');
