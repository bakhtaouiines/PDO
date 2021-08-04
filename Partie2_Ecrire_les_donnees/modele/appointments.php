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

    // on ajoute un patient
    public function addAppointment()
    {
        $addPatientQuery = $this->pdo->prepare(
            'INSERT INTO `appointments` (`dateHour`) 
        VALUES (:dateHour'
        );
        $addPatientQuery->bindParam(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $addPatientQuery->execute();
    }
    
}
