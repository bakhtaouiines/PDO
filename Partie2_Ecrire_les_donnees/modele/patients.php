<?php
// déclaration de la classe Patients
class Patients
{
    public $id = '';
    public $lastname = '';
    public $firstname = '';
    public $birthdate = '';
    public $phone = '';
    public $mail = '';
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

    // on ajoute un patient
    public function addPatient()
    {
        $addPatientQuery = $this->pdo->prepare(
            'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`,`phone`,`mail`) 
        VALUES (:lastname, :firstname, :birthdate, :phone, :mail)'
        );
        $addPatientQuery->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
        $addPatientQuery->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $addPatientQuery->bindParam(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $addPatientQuery->bindParam(':phone', $this->phone, PDO::PARAM_STR);
        $addPatientQuery->bindParam(':mail', $this->mail, PDO::PARAM_STR);
        $addPatientQuery->execute();
    }

    // on liste les patients
    public function getPatientsList()
    {
        // On récupère tout le contenu de la table patients
        $getPatientListQuery = $this->pdo->query(
            'SELECT `id`, `lastname`, `firstname` 
            FROM patients'
        );
        // On retourne un tableau contenant toutes les lignes du jeu d'enregistrements. Le tableau représente chaque ligne comme soit un tableau de valeurs des colonnes, soit un objet avec des propriétés correspondant à chaque nom de colonne.
        // FETCH_OBJ retourne un objet anonyme avec les noms de propriétés qui correspondent aux noms des colonnes retournés dans le jeu de résultats
        return $getPatientListQuery->fetchAll(PDO::FETCH_OBJ);
    }

    // on récupère les informations d'un patient
    public function getPatientInfo()
    {
        $getPatientInfoQuery = $this->pdo->prepare(
            'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` 
            FROM `patients`
            WHERE `id` = :id'
        );
        $getPatientInfoQuery->bindParam(':id', $this->id, PDO::PARAM_INT);
        $getPatientInfoQuery->execute();
        // On retourne une ligne depuis un jeu de résultats associé à l'objet 
        return $getPatientInfoQuery->fetch(PDO::FETCH_OBJ);
    }

    // fonction pour modifier les infos d'un patient
    public function updatePatientInfo()
    {
        $updatePatientInfoQuery = $this->pdo->prepare(
            'UPDATE `patients` SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail 
            WHERE `id` = :id'
        );
        $updatePatientInfoQuery->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
        $updatePatientInfoQuery->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $updatePatientInfoQuery->bindParam(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $updatePatientInfoQuery->bindParam(':phone', $this->phone, PDO::PARAM_STR);
        $updatePatientInfoQuery->bindParam(':mail', $this->mail, PDO::PARAM_STR);
        $updatePatientInfoQuery->bindParam(':id', $this->id, PDO::PARAM_INT);
        $updatePatientInfoQuery->execute();
    }

    // fonction pour supprimer un patient 
    public function deletePatient()
    {
        $deletePatientQuery = $this->pdo->prepare(
            'DELETE FROM `patients` WHERE `id`= :id '
        );
        $deletePatientQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        $deletePatientQuery->execute();
    }
}
