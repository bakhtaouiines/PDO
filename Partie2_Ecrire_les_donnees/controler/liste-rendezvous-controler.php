<?php
require('../modele/appointments.php');

$Appointments = new Appointments;
$AppointmentsList = $Appointments->getAppointmentsList();

//suppression du rdv depuis la liste
if (isset($_GET['deleteAppointment'])) {
    // si l'ID de l'utilisateur a été récupéré dans l'URL
    if (isset($_GET['rdvId'])) {
    $DeleteAppointment = new Appointments;
    $DeleteAppointment->id = htmlspecialchars($_GET['rdvId']);
    $DeleteAppointmentFromList = $DeleteAppointment->deleteAppointment();
    }
}
require('../vue/liste-rendezvous.php');
