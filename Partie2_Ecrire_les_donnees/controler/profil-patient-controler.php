<?php
// On charge le fichier du modèle.
require('../modele/patients.php');
require('../modele/appointments.php');

/////////////// affichage du patient sélectionné //////////////////

// on instancie un nouvel objet patient pour modifier ultérieurement les infos d'un patient
$Patient = new Patients;
// on y stocke l'ID du patient, que l'on va modifier
$Patient->id = $_GET['patientId'];
// on stocke dans une variable la fonction qui va appeler toutes les informations du patient
$PatientInfo = $Patient->getPatientInfo();


// instance d'un nouvel objet pour lister les rendezvous du patient sélectionné
$AppointmentInfo = new Appointments;
$AppointmentInfo->idPatients = $Patient->id;
$Appointment = $AppointmentInfo->getAppointmentInfoPatient();



// tableau où seront stockées les erreurs
$errors = [];
// modification des informations du patient: 
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
    // s'il n'y a pas d'erreurs...
    if (empty($errors)) {
        $Patient->updatePatientInfo();
        // redirection vers la fiche du patient
        header('Location: profil-patient-controler.php?patientId=' . $_GET['patientId']);
    }
}

// suppression du patient
if (isset($_POST['deletePatient'])) {
    // si l'ID de l'utilisateur a été récupéré dans l'URL
    if (isset($_GET['patientId'])) {
        $DeletePatientInfo = new Patients;
        $DeletePatientInfo->id = htmlspecialchars($_GET['patientId']);
        $DeletePatient = $DeletePatientInfo->deletePatient();
        
// suppression du patient ET du rdv    
        $DeleteAppointmentAndPatient = new Appointments;
        $DeleteAppointmentAndPatient->idPatients = htmlspecialchars($_GET['patientId']);
        $DeleteAppointment = $DeleteAppointmentAndPatient->deleteAppointment();
        // si tout est ok, on redirige vers la page de la liste des patients
        header('Location: liste-patients-controler.php');
    }
}

// // suppression du rdv depuis la fiche patient
// if (isset($_POST['deleteAppointment'])) {
//     // si l'ID de l'utilisateur a été récupéré dans l'URL
//     if (isset($_GET['patientId'])) {
//         $DeleteAppointmentInfo = new Appointments;
//         $DeleteAppointmentInfo->idPatients = htmlspecialchars($_GET['patientId']);
//         $DeleteAppointment = $DeleteAppointmentInfo->deleteAppointmentPatient();
//         // si tout est ok, on redirige vers la page de la liste des rdv
//         header('Location: profil-patient-controler.php?patientId=' . $_GET['patientId']);
//     }
// }

// On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('../vue/profil-patient.php');
