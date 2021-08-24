<?php
// On charge le fichier du modèle.
require('../modele/patients.php');
require('../modele/appointments.php');

$newPatientAppointment = new Patients;
// instance d'un nouvel objet pour appeler les info du clients
$newAppointmentPatient = new Appointments;

// initialisation d'un tableau qui va contenir les erreurs
$errors = [];
if (isset($_POST['buttonAddPatientAndAppointment'])) {
    $regex = '/^[A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç][A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç\-\s\']*$/';

    // verif nom
    if (!empty($_POST['lastname'])) {
        if (preg_match($regex, $_POST['lastname'])) {
            $newPatientAppointment->lastname = htmlspecialchars($_POST['lastname']); // On hydrate l'attribut lastname de l'objet $newPatientAppointment et on convertit les caractères spéciaux en entités HTML
        } else {
            $errors['lastname'] = 'Les caractères saisis ne sont pas valides et/ou le nombre de caractère limite (25) a été atteint.';
        }
    } else {
        $errors['lastname'] = 'Le nom de famille n\'a pas été renseigné.';
    }

    // verif prénom
    if (!empty($_POST['firstname'])) {
        if (preg_match($regex, $_POST['firstname'])) {
            $newPatientAppointment->firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $errors['firstname'] = 'Les caractères saisis ne sont pas valides et/ou le nombre de caractère limite (25) a été atteint.';
        }
    } else {
        $errors['firstname'] = 'Le prénom n\'a pas été renseigné.';
    }

    // verif email
    if (!empty($_POST['mail'])) {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $newPatientAppointment->mail = htmlspecialchars($_POST['mail']);
        } else {
            $errors['mail'] = 'Les caractères saisis ne sont pas valides et/ou le nombre de caractère limite (100) a été atteint.';
        }
    } else {
        $errors['mail'] = 'L\'adresse mail n\'a pas été renseigné.';
    }

    // verif date de naissance
    if (empty($_POST['birthdate'])) {
        $errors['birthdate'] = 'La date de naissance n\'a pas été renseigné.';
    } else {
        $newPatientAppointment->birthdate = htmlspecialchars($_POST['birthdate']);
    }

    // verif téléphone
    if (!empty($_POST['phone'])) {
        if (preg_match('#^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}#', $_POST['phone'])) {
            $newPatientAppointment->phone = htmlspecialchars($_POST['phone']);
        } else {
            $errors['phone'] = 'Le téléphone n\'est pas au bon format.';
        }
    } else {
        $errors['phone'] = 'Le champ "Téléphone" n\'a pas été renseigné.';
    }

    // verif champs rdv
    if (empty($_POST['appointmentDateHour'])) {
        $errors['appointmentDateHour'] = 'Aucune date et/ou heure n\'a été sélectionné';
    } else {
        $newPatientAppointment->dateHour = htmlspecialchars($_POST['appointmentDateHour']);
    }
}

if (empty($errors)) {
    $newPatient = $newPatientAppointment->addPatient();
    $newAppointment = $newAppointmentPatient->addAppointment();
}

// instance d'un nouvel objet pour appeler les info du clients
$PatientId = new Appointments;
// on stocke dans une variable la fonction qui va appeler les informations souhaitées du patient
// on appelle la variable dans la VUE
$getPatientId = $PatientId->addAppointment();
// instance d'un nouvel objet pour créer un rdv
$NewAppointment = new Appointments;

require('../vue/ajout-patient-rendezvous.php');
