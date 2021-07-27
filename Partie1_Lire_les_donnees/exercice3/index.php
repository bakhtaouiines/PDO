<?php
// On charge le fichier du modèle.
require('modele.php');
$Clients = new Clients;
$listeClients = $Clients->getAllClients(20);
// On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('vue.php');
