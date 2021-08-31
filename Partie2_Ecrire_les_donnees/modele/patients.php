<?php
// déclaration de la classe Patients
class Patients
{
    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $birthdate = '';
    public $phone = '';
    public $mail = '';
    public $dateHour = '';
    public $idPatients = '';
    private $pdo = null;

    // pour faire le lien avec la bdd, on appelle la fonction construct et on y instancie un nouvel objet 
    function __construct()
    {
        $this->pdo = DataBase::getPdo();
    }

    public function beginTransaction()
    {
        return $this->pdo->beginTransaction();
    }

    public function commit()
    {
        return $this->pdo->commit();
    }

    public function rollBack()
    {
        return $this->pdo->rollBack();
    }


    // on ajoute un patient
    public function addPatient()
    {
        $addPatientQuery = $this->pdo->prepare(
            'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`,`phone`,`mail`) 
        VALUES (:lastname, :firstname, :birthdate, :phone, :mail)'
        );
        $addPatientQuery->bindParam(':lastname', $this->lastname, PDO::PARAM_STR); // ':quelquechose' -> MARQUEUR NOMINATIF 
        $addPatientQuery->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $addPatientQuery->bindParam(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $addPatientQuery->bindParam(':phone', $this->phone, PDO::PARAM_STR);
        $addPatientQuery->bindParam(':mail', $this->mail, PDO::PARAM_STR);
        $addPatientQuery->execute();
        return $this->pdo->lastInsertId();
    }

    // on liste les patients
    public function getPatientsList()
    {
        // On récupère tout le contenu de la table patients
        $getPatientListQuery = $this->pdo->query(
            'SELECT `id`, `lastname`, `firstname` 
            FROM patients
            ORDER BY `lastname` ASC'
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

    // fonction pour vérifier qu'un patient existe
    public function checkPatientExist()
    {
        $query = 'SELECT COUNT(*) AS `isExist` FROM `patients` WHERE `id` = :id';
        $checkPatientExistRequest = $this->pdo->prepare($query);
        $checkPatientExistRequest->bindValue(':id', $this->id, PDO::PARAM_INT);
        $checkPatientExistRequest->execute();
        $result = $checkPatientExistRequest->fetch(PDO::FETCH_OBJ); // result = objet
        return $result->isExist;
    }

    // fonction pour supprimer un patient 
    public function deletePatient()
    {
        $deletePatientQuery = $this->pdo->prepare(
            'DELETE FROM `patients` 
            WHERE `id`= :id '
        );
        $deletePatientQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        $deletePatientQuery->execute();
        return !$this->checkPatientExist(); // Le point d'exclamation devant $this renvoie un false
    }

    // fonction pour rechercher un patient
    // public function searchPatient($SearchResult)
    // {
    //     $searchPatientQuery = $this->pdo->prepare(
    //         'SELECT `id`, `lastname`, `firstname`
    //         FROM `patients`
    //         WHERE `lastname` OR `firstname` LIKE :SearchResult'
    //     );
    //     $searchPatientQuery->bindValue(':SearchResult', '%' . $SearchResult . '%', PDO::PARAM_STR);
    //     $searchPatientQuery->execute();
    //     return $searchPatientQuery->fetchAll(PDO::FETCH_OBJ);
    // }

    // fonctions pour la pagination
    // d'abord on détermine le nombre total de patients


    /**
     * Méthode permettant d'avoir le nombre de pages à afficher. Elle a besoin de plusieurs paramètres pour fonctionner.
     *
     * @param string $SearchPatientsList = l'input de recherche
     * @param integer $numberPatientPerPage = nombre de patients par page
     * @param array $patientFilter = filtre patient (select multiple), 'lastname' indique le filtre par défaut (au cas où rien est sélectionné)
     * @return int
     */
    public function totalPagesPatient($SearchPatientsList, $numberPatientPerPage = 5, $patientFilter = ['lastname'])
    {
        $where = '';
        if ($SearchPatientsList != '') {
            $whereArray = [];
            foreach ($patientFilter as $filter) {
                // ceci va permettre d'avoir par exemple : `lastname` LIKE `:SearchPatientsList`(etc)
                $whereArray[] = '`' . $filter . '` LIKE :SearchPatientsList ';
            }
            // implode = transforme le tableau whereArray en chaîne de caractères 
            $where = 'WHERE ' . implode(' OR ', $whereArray);
        }
        $totalPages = $this->pdo->prepare(
            'SELECT COUNT(*) / :numberPatientPerPage
            AS numberPages
        FROM `patients` ' . $where
        ); // nombre de pages = nombre de patients divisé par nombre de patients par page
        // on concatène avec une chaîne vide (s'il n'y a pas de recherches) ou avec ce qui a été recherché ($whereArray)
        $totalPages->bindValue(':numberPatientPerPage', $numberPatientPerPage, PDO::PARAM_INT);
        if ($SearchPatientsList != '') {
            $totalPages->bindValue(':SearchPatientsList', '%' . $SearchPatientsList . '%', PDO::PARAM_STR);
        }
        $totalPages->execute();
        // Autre méthode :
        // $toto = $totalPages->fetch(PDO::FETCH_OBJ);
        // return ceil($toto->numberPages);
        return ceil($totalPages->fetch(PDO::FETCH_OBJ)->numberPages); // ceil = arrondit au supérieur
    }
    public function infoPagePatient($firstPatients, $numberResultsPage, $SearchPatientsList, $patientFilter = ['lastname'])
    {
        $where = '';
        if ($SearchPatientsList != '') {
            $whereArray = [];
            foreach ($patientFilter as $filter) {
                $whereArray[] = '`' . $filter . '` LIKE :SearchPatientsList ';
            }
            $where = 'WHERE ' . implode(' OR ', $whereArray);
        }
        $infoPage = $this->pdo->prepare(
            'SELECT `id`, `lastname`, `firstname` 
            FROM patients '
                . $where
                . 'ORDER BY `lastname`
            LIMIT :numberResultsPage
            OFFSET :firstPatients'
        );
        $infoPage->bindValue(':numberResultsPage', $numberResultsPage, PDO::PARAM_INT);
        $infoPage->bindValue(':firstPatients', $firstPatients, PDO::PARAM_INT);
        if ($SearchPatientsList != '') {
            $infoPage->bindValue(':SearchPatientsList', '%' . $SearchPatientsList . '%', PDO::PARAM_STR);
        }
        $infoPage->execute();
        return $infoPage->fetchAll(PDO::FETCH_OBJ);
    }
}
