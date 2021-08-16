<?php
require('../modele/appointments.php');
$Appointments = new Appointments;
$AppointmentsList = $Appointments->getAppointmentsList();
require('../vue/liste-rendezvous.php'); 