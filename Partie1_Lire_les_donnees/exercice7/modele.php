<?php

class Clients
{

    private $pdo;
    // on crée un nouvel objet 
    function __construct()
    {
        try {
            // On se connecte à MySQL
            $this->pdo = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
        } catch (PDOException $Exception) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Error : ' . $Exception->getMessage());
        }
    }

    public function getAllClient()
    {
        // On récupère tout le contenu de la table clients
        $sql = $this->pdo->query('SELECT `lastName` as nom, `firstname` as prenom, `birthDate` as dateNaissance, `card` as carte, `cardNumber` as carteFidelite, CASE WHEN `card` = 1 THEN \'OUI\' WHEN `card` = 0 THEN \'NON\' END AS carte FROM clients');
        // On retourne un tableau contenant toutes les lignes du jeu d'enregistrements. Le tableau représente chaque ligne comme soit un tableau de valeurs des colonnes, soit un objet avec des propriétés correspondant à chaque nom de colonne.
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
}
