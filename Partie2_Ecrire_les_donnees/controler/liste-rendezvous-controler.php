<?php
require('../modele/appointments.php');
require('../modele/dataBase.php');

$Appointments = new Appointments;
$AppointmentsList = $Appointments->getAppointmentsList();

//suppression du rdv depuis la liste
if (isset($_POST['delete_id'])) {
    $DeleteAppointment = new Appointments;
    $DeleteAppointment->id = htmlspecialchars($_POST['delete_id']);
    $DeleteAppointmentFromList = $DeleteAppointment->deleteAppointment();
    header('Refresh:0');
}

require('../vue/liste-rendezvous.php');
