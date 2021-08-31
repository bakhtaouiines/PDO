<?php

class DataBase {
    //L'attribut $pdo sera disponible dans ses enfants
    public $pdo = null;
    private static $instance = null;


   
    public function __construct() {
        try {
            // On se connecte à MySQL pour faire le lien avec la BDD
            $this->pdo = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // En cas d'erreur, on affiche un message et on arrête tout
             
        } catch (PDOException $Exception) {
            die('Erreur : ' . $Exception->getMessage());
        }
    }

    public static function getPdo()
    {
        if(is_null(self::$instance)){
            self::$instance = new DataBase();
        }
        return self::$instance->pdo;
    }
    public function __destruct() {

        $this->pdo = null;
        
    }

}
