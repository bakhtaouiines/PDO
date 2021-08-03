<?php
// On charge le fichier du modèle.
require('../modele/patients.php');
$Patients = new Patients;
$PatientsList = $Patients->getPatientsList();
// On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('../vue/index.php');
