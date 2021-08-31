<?php
// On charge le fichier du modèle.
require('../modele/patients.php');
require('../modele/appointments.php');
require('../modele/dataBase.php');

$NewPatient = new Patients;
$NewAppointment = new Appointments;

/**
 * Ajout d'un patient ET d'un RDV
 */
// initialisation d'un tableau qui va contenir les erreurs
$errors = [];
if (isset($_POST['buttonAddPatientAndAppointment'])) {
    $regex = '/^[A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç][A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç\-\s\']*$/';

    // verif nom
    if (!empty($_POST['lastname'])) {
        if (preg_match($regex, $_POST['lastname'])) {
            $NewPatient->lastname = htmlspecialchars($_POST['lastname']); // On hydrate l'attribut lastname de l'objet $NewPatient et on convertit les caractères spéciaux en entités HTML
        } else {
            $errors['lastname'] = 'Les caractères saisis ne sont pas valides et/ou le nombre de caractère limite (25) a été atteint.';
        }
    } else {
        $errors['lastname'] = 'Le nom de famille n\'a pas été renseigné.';
    }

    // verif prénom
    if (!empty($_POST['firstname'])) {
        if (preg_match($regex, $_POST['firstname'])) {
            $NewPatient->firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $errors['firstname'] = 'Les caractères saisis ne sont pas valides et/ou le nombre de caractère limite (25) a été atteint.';
        }
    } else {
        $errors['firstname'] = 'Le prénom n\'a pas été renseigné.';
    }

    // verif email
    if (!empty($_POST['mail'])) {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) // Valide une adresse de courriel selon la syntaxe défini par la RFC 822.
        {
            $NewPatient->mail = htmlspecialchars($_POST['mail']);
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
        $NewPatient->birthdate = htmlspecialchars($_POST['birthdate']);
    }

    // verif téléphone
    if (!empty($_POST['phone'])) {
        if (preg_match('#^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}#', $_POST['phone'])) {
            $NewPatient->phone = htmlspecialchars($_POST['phone']);
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
        $NewPatient->dateHour = htmlspecialchars($_POST['appointmentDateHour']);
    }
    if (empty($errors)) {
        try {
            $NewPatient->beginTransaction();
            $AddNewPatient = $NewPatient->addPatient();
            $AddNewAppointment = $NewAppointment->addAppointment();
            $NewPatient->commit();
        } catch (PDOException $e) {
            $NewPatient->rollBack();
        }
    }
}

require('../vue/ajout-patient-rendezvous.php');
