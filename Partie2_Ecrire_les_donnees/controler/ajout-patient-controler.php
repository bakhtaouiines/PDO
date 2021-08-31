<?php
// On charge le fichier du modèle.
require('../modele/patients.php');
require('../modele/dataBase.php');
require('../modele/appointments.php');
$newPatient = new Patients;

// initialisation d'un tableau qui va contenir les erreurs
$errors = [];
if (isset($_POST['buttonAddPatient'])) {
    $regex = '/^[A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç][A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç\-\s\']*$/';

    // verif nom
    if (!empty($_POST['lastname'])) {
        if (preg_match($regex, $_POST['lastname'])) {
            $newPatient->lastname = htmlspecialchars($_POST['lastname']); // On hydrate l'attribut lastname de l'objet $newPatient et on convertit les caractères spéciaux en entités HTML
        } else {
            $errors['lastname'] = 'Les caractères saisis ne sont pas valides et/ou le nombre de caractère limite (25) a été atteint.';
        }
    } else {
        $errors['lastname'] = 'Le nom de famille n\'a pas été renseigné.';
    }

    // verif prénom
    if (!empty($_POST['firstname'])) {
        if (preg_match($regex, $_POST['firstname'])) {
            $newPatient->firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $errors['firstname'] = 'Les caractères saisis ne sont pas valides et/ou le nombre de caractère limite (25) a été atteint.';
        }
    } else {
        $errors['firstname'] = 'Le prénom n\'a pas été renseigné.';
    }

    // verif email
    if (!empty($_POST['mail'])) {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $newPatient->mail = htmlspecialchars($_POST['mail']);
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
        $newPatient->birthdate = htmlspecialchars($_POST['birthdate']);
    }

    // verif téléphone
    if (!empty($_POST['phone'])) {
        if (preg_match('#^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}#', $_POST['phone'])) {
            $newPatient->phone = htmlspecialchars($_POST['phone']);
        } else {
            $errors['phone'] = 'Le téléphone n\'est pas au bon format.';
        }
    } else {
        $errors['phone'] = 'Le champ "Téléphone" n\'a pas été renseigné.';
    }
}

if (empty($errors)) {
    // s'il n'y a pas d'erreur on exécute la méthode addPatient liée à l'instance PDO qui permet d'ajouter un patient
    $newPatient->addPatient();
}
// On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('../vue/ajout-patient.php');


// regex telephone = 
// (?:(?:\+|00)33|0)     # Dialing code
// \s*[1-9]              # First number (from 1 to 9)
// (?:[\s.-]*\d{2}){4}   # End of the phone number
// It allows whitespaces or . or - as a separator, or no separator at all