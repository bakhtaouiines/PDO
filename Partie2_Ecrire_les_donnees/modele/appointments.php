<?php
// déclaration de la classe Patients
class Appointments
{
    public $id = '';
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


    // on ajoute un rdv
    public function addAppointment()
    {
        $addAppointmentQuery = $this->pdo->prepare(
            'INSERT INTO `appointments` (`dateHour`, `idPatients`) 
        VALUES (:dateHour, :idPatients)'
        );
        $addAppointmentQuery->bindParam(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $addAppointmentQuery->bindParam(':idPatients', $this->idPatients, PDO::PARAM_STR);
        $addAppointmentQuery->execute();
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
}
