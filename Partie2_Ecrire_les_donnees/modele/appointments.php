<?php
// déclaration de la classe Appointments
class Appointments
{
    public $id = '';
    public $lastname = '';
    public $firstname = '';
    public $dateHour = '';
    public $idPatients = '';
    private $pdo;


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
            'SELECT `id`, `dateHour`, `idPatients`
            FROM appointments
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

        // On retourne une ligne depuis un jeu de résultats associé à l'objet 
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

        // On retourne une ligne depuis un jeu de résultats associé à l'objet 
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
    
    // fonction pour supprimer un rdv depuis la liste des patients 
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

    // on liste les rendez-vous du patient
    // public function listAppointmentsByPatient()
    // {
    //     $listAppointmentsByPatientQuery = $this->pdo->query(
    //         'SELECT `dateHour`
    //     FROM `appointments`'
    //     );
    //     return $listAppointmentsByPatientQuery->fetch(PDO::FETCH_OBJ);
    // }
