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

    // on créé un rdv + on récupère l'id du patient
    public function makeAppointment()
    {
        $makeAppointmentQuery = $this->pdo->prepare(
            'SELECT `appointments`.`dateHour`, `appointments`.`idPatients`, `patients`.`id`
FROM `appointments`, `patients`
WHERE `appointments`.`idPatient` = `patients`.`id`'

        );
        $makeAppointmentQuery->bindValue('`patients`.`id`', $this->id, PDO::PARAM_INT);
        $makeAppointmentQuery->execute();
        // On retourne une ligne depuis un jeu de résultats associé à l'objet 
        return $makeAppointmentQuery->fetch(PDO::FETCH_OBJ);
    }

    // on ajoute un rdv
    public function addAppointment()
    {
        $addAppointmentQuery = $this->pdo->prepare(
            'INSERT INTO `appointments` (`dateHour`) 
        VALUES (:dateHour'
        );
        $addAppointmentQuery->bindParam(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $addAppointmentQuery->execute();
    }
}
