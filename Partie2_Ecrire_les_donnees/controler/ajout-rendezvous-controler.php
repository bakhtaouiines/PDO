<?php
// On charge le fichier du modèle.
require('../modele/appointments.php');
$Appointment = new Appointments;
$NewAppointment = $Appointment->makeAppointment();

require('../vue/ajout-rendezvous.php');