<?php
// déclaration de la classe Patients
class Appointments
{
  
    // pour faire le lien avec la bdd, on appelle la fonction construct et on y instancie un nouvel objet 
    function __construct()
    {
        try {
            // On se connecte à MySQL pour faire le lien avec la BDD
            $this->pdo = new PDO('mysql:host=localhost;dbname=hospitale2n;charset=utf8', 'root', '');
        } catch (PDOException $Exception) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Error : ' . $Exception->getMessage());
        }
    }

    // on récupère les informations d'un patient
    public function getPatientById()
    {
        $getPatientInfoQuery = $this->pdo->prepare(
            'SELECT `id`, `lastname`, `firstname` 
                FROM `patients`
                WHERE `id` = :id'
        );
        $getPatientInfoQuery->bindParam(':id', $this->id, PDO::PARAM_INT);
        $getPatientInfoQuery->execute();
        // On retourne une ligne depuis un jeu de résultats associé à l'objet 
        return $getPatientInfoQuery->fetch(PDO::FETCH_OBJ);
    }

    // on récupère tous les patients 
    public function getAllPatientById()
    {
        $getAllPatientInfoQuery = $this->pdo->prepare(
            'SELECT `id`, `lastname`, `firstname` 
            FROM `patients`'
        );
        $getAllPatientInfoQuery->bindParam(':id', $this->id, PDO::PARAM_INT);
        $getAllPatientInfoQuery->execute();
        // On retourne une ligne depuis un jeu de résultats associé à l'objet 
        return $getAllPatientInfoQuery->fetchAll(PDO::FETCH_OBJ);
    }

    // on ajoute un rdv
    public function addAppointment()
    {
        $addAppointmentQuery = $this->pdo->prepare(
            'INSERT INTO `appointments` (`dateHour`, `idPatients`) 
        VALUES (:dateHour,:idPatients)'
        );
        $addAppointmentQuery->bindParam(':dateHour', $this->dateHour, PDO::PARAM_INT);
        $addAppointmentQuery->bindParam(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $addAppointmentQuery->execute();
    }

    // fonction pour récupérer les informations du rdv
    public function getAppointmentInfo()
    {
        $getAppointmentInfoQuery = $this->pdo->query(
            'SELECT `dateHour`, `idPatients` 
            FROM `appointments`'
        );
        return $getAppointmentInfoQuery->fetch(PDO::FETCH_OBJ);
    }

    // fonction pour modifier les infos d'un rdv
    public function updateAppointmentInfo()
    {
        $updatePatientInfoQuery = $this->pdo->prepare(
            'UPDATE `appointments` SET `dateHour` = :dateHour 
            WHERE `id` = :id'
        );
        $updatePatientInfoQuery->bindParam(':dateHour', $this->dateHour, PDO::PARAM_INT);
        $updatePatientInfoQuery->execute();
    }

    // fonction pour lister les rdv
    public function getAppointmentsList()
    {
        $getAppointmentsListQuery = $this->pdo->query(
            'SELECT `dateHour`
            FROM `appointments`'
        );
        return $getAppointmentsListQuery->fetchAll(PDO::FETCH_OBJ);
    }
}

    // on liste les rendez-vous du patient
    // public function listAppointmentsByPatient()
    // {
    //     $listAppointmentsByPatientQuery = $this->pdo->query(
    //         'SELECT `dateHour`
    //     FROM `appointments`'
    //     );
    //     return $listAppointmentsByPatientQuery->fetch(PDO::FETCH_OBJ);
    // }
