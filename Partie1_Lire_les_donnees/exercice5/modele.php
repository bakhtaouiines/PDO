<?php

class Clients
{

    private $pdo;
    // on crée un nouvel objet 
    function __construct()
    {
        try {
            // On se connecte à MySQL
            $this->pdo = new PDO("mysql:host=localhost;dbname=colyseum;charset=utf8", 'root', '');
        } catch (PDOException $Exception) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Error : ' . $Exception->getMessage());
        }
    }

    public function getClient()
    {
        // On récupère tout le contenu de la table clients dont le nom commence par la lettre M
        $sql = $this->pdo->query('SELECT `lastName` as nom, `firstname` as prenom FROM `clients` WHERE `lastName` LIKE "M%" ORDER BY `lastName` ASC');

        // On retourne un tableau contenant toutes les lignes du jeu d'enregistrements. Le tableau représente chaque ligne comme soit un tableau de valeurs des colonnes, soit un objet avec des propriétés correspondant à chaque nom de colonne.
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
}
