<?php
function getShowTypes(){
    try {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
    }
    // On récupère tout le contenu de la table showtypes
$req = $bdd->query('SELECT * FROM showtypes');
return $req;
}