<?php
require('../modele/appointments.php');
// instance d'un nouvel objet pour appeler les info du clients
$PatientId = new Appointments;
// on stocke dans une variable la fonction qui va appeler les informations souhaitées du patient
// on appelle la variable dans la VUE
$getPatientId = $PatientId->getAllPatientById();

$Appointments = new Appointments;
$AppointmentsList = $Appointments->getAppointmentsList();

// $Patient = new Appointments;
// $Patient->id = $_GET['patientId'];


// $errors = [];
// // suppression du rdv
// if (isset($_POST['deleteAppointment'])) {
//     // si l'ID de l'utilisateur a été récupéré dans l'URL
//     if (isset($_GET['patientId'])) {
//         $DeleteAppointmentInfo = new Appointments;
//         $DeleteAppointmentInfo->id = htmlspecialchars($_GET['patientId']);
//         // on appelle la méthode pour supprimer la fiche du rdv
//         if ($DeleteAppointmentInfo->deleteAppointment()) {
//             // si tout est ok, on redirige vers la page de la liste des rdv
//             header('Location: ../controler/liste-rendezvous-controler.php');
//             exit;
//         } else {
//             // sinon, on affiche un msg d'erreur
//             $errors = 'Une erreur est survenue, veuillez réessayer.';
//         }
//     }
// }
require('../vue/liste-rendezvous.php');
