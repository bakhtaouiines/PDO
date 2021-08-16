<?php
// On charge le fichier du modèle.
require('../modele/patients.php');

// affichage du patient sélectionné

// on instancie un nouvel objet patient pour modifier les infos d'un patient
$Patient = new Patients;
// on y stocke l'ID du patient, que l'on va modifier
$Patient->id = $_GET['patientId'];
// on stocke dans une variable la fonction qui va appeler toutes les informations du patient
$PatientInfo = $Patient->getPatientInfo();

// //affichage de la liste des rendez-vous du patient sélectionné   
// $listAppointmentsPatient = new Appointments();
// $listAppointmentsPatient->idPatients = $patients->id;
// $listInfoAppointments = $listAppointmentsPatient->listAppointmentsByPatient();
// $patientInfo = $patient->getPatientById();

$errors = [];
// lorsqu'on clique sur le bouton "modifier les informations : 
if (isset($_POST['updatePatient'])) {
    $regex = '/^[A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç][A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç\-\s\']*$/';

    // verif nom
    if (!empty($_POST['updatedLastname'])) {
        if (preg_match($regex, $_POST['updatedLastname'])) {
            $Patient->lastname = htmlspecialchars($_POST['updatedLastname']); // On hydrate l'attribut lastname de l'objet $Patient et on convertit les caractères spéciaux en entités HTML
        } else {
            $errors['updatedLastname'] = 'Les caractères saisis ne sont pas valides et/ou le nombre de caractère limite (25) a été atteint.';
        }
    } else {
        $errors['updatedLastname'] = 'Le nom de famille n\'a pas été renseigné.';
    }

    // verif prénom
    if (!empty($_POST['updatedFirstname'])) {
        if (preg_match($regex, $_POST['updatedFirstname'])) {
            $Patient->firstname = htmlspecialchars($_POST['updatedFirstname']);
        } else {
            $errors['updatedFirstname'] = 'Les caractères saisis ne sont pas valides et/ou le nombre de caractère limite (25) a été atteint.';
        }
    } else {
        $errors['updatedFirstname'] = 'Le prénom n\'a pas été renseigné.';
    }

    // verif email
    if (!empty($_POST['updatedMail'])) {
        if (filter_var($_POST['updatedMail'], FILTER_VALIDATE_EMAIL)) {
            $Patient->mail = htmlspecialchars($_POST['updatedMail']);
        } else {
            $errors['updatedMail'] = 'Les caractères saisis ne sont pas valides et/ou le nombre de caractère limite (100) a été atteint.';
        }
    } else {
        $errors['updatedMail'] = 'L\'adresse mail n\'a pas été renseigné.';
    }

    // verif date de naissance
    if (empty($_POST['updatedBirthdate'])) {
        $errors['updatedBirthdate'] = 'La date de naissance n\'a pas été renseigné.';
    } else {
        $Patient->birthdate = htmlspecialchars($_POST['updatedBirthdate']);
    }

    // verif téléphone
    if (!empty($_POST['updatedPhone'])) {
        if (preg_match('#^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}#', $_POST['updatedPhone'])) {
            $Patient->phone = htmlspecialchars($_POST['updatedPhone']);
        } else {
            $errors['updatedPhone'] = 'Le téléphone n\'est pas au bon format.';
        }
    } else {
        $errors['updatedPhone'] = 'Le champ "Téléphone" n\'a pas été renseigné.';
    }
    if (empty($errors)) {
        if ($Patient->updatePatientInfo()) {
            header('Location: ../controler/profil-patient-controler.php?patientId=' . $_GET['patientId']);
        } else {
            $errors = 'Une erreur est survenue, veuillez réessayer.';
        }
    }
}

// suppression du patient
if (isset($_POST['deletePatient'])) {
    // si l'ID de l'utilisateur a été récupéré dans l'URL
    if (isset($_GET['patientId'])) {
        $DeletePatientInfo = new Patients;
        $DeletePatientInfo->id = htmlspecialchars($_GET['patientId']);
        // on appelle la méthode pour supprimer la fiche d'un patient
        if ($DeletePatientInfo->deletePatient()) {
            // si tout est ok, on redirige vers la page de la liste des patients
            header('Location: ../controler/liste-patients-controler.php');
            exit;
        } else {
            // sinon, on affiche un msg d'erreur
            $errors = 'Une erreur est survenue, veuillez réessayer.';
        }
    }
}

// On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('../vue/profil-patient.php');
