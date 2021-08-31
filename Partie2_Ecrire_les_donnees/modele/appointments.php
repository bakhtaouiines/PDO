<?php
// déclaration de la classe Appointments
class Appointments
{
    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $dateHour = '';
    public $idPatients = '';
    private $pdo = null;

    public function __construct() {
        $this->pdo = DataBase::getPdo();

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
            FROM `patients`
            ORDER BY `lastname` ASC'
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

        $addAppointmentQuery->bindParam(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $addAppointmentQuery->bindParam(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $addAppointmentQuery->execute();
    }

    // fonction pour lister les rdv
    public function getAppointmentsList()
    {
        $getAppointmentsListQuery = $this->pdo->query(
            'SELECT `appointments`.`id`, `dateHour`, `idPatients`, `lastname`, `firstname`
            FROM appointments
            LEFT JOIN patients ON `idPatients` = `patients`.`id`
            ORDER BY `dateHour`ASC'
        );
        return $getAppointmentsListQuery->fetchAll(PDO::FETCH_OBJ);
    }

    // fonction pour récupérer les informations du rdv $_GET['patientId']
    public function getAppointmentInfoPatient()
    {
        $getAppointmentInfoQuery = $this->pdo->prepare(
            'SELECT `id`, `dateHour`, `idPatients` 
            FROM appointments
            WHERE `idPatients` = :idPatients'
        );
        $getAppointmentInfoQuery->bindParam(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $getAppointmentInfoQuery->execute();
        return $getAppointmentInfoQuery->fetchAll(PDO::FETCH_OBJ);
    }

    // fonction pour récupérer les informations du rdv $_GET['rdvId']
    public function getAppointmentInfo()
    {
        $getAppointmentInfoQuery = $this->pdo->prepare(
            'SELECT `id`, `dateHour`, `idPatients` 
            FROM appointments
            WHERE `id` = :id'
        );
        $getAppointmentInfoQuery->bindParam(':id', $this->id, PDO::PARAM_INT);
        $getAppointmentInfoQuery->execute();
        return $getAppointmentInfoQuery->fetch(PDO::FETCH_OBJ);
    }

    // fonction pour modifier les infos d'un rdv
    public function updateAppointmentInfo()
    {
        $updatePatientInfoQuery = $this->pdo->prepare(
            'UPDATE `appointments` SET `dateHour` = :dateHour 
            WHERE `id` = :id'
        );
        $updatePatientInfoQuery->bindParam(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $updatePatientInfoQuery->bindParam(':id', $this->id, PDO::PARAM_INT);
        $updatePatientInfoQuery->execute();
    }

    // fonction pour supprimer un rdv
    public function deleteAppointment()
    {
        $deleteAppointmentQuery = $this->pdo->prepare(
            'DELETE FROM `appointments` 
            WHERE `id`= :id '
        );
        $deleteAppointmentQuery->bindParam(':id', $this->id, PDO::PARAM_INT);
        $deleteAppointmentQuery->execute();
    }

    // fonction pour supprimer rdv + patient 
    public function deleteAppointmentPatient()
    {
        $deleteAppointmentQuery = $this->pdo->prepare(
            'DELETE FROM `appointments` 
            WHERE `idPatients`= :idPatients'
        );
        $deleteAppointmentQuery->bindParam(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $deleteAppointmentQuery->execute();
    }
}
