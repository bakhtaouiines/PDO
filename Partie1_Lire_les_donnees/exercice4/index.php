<?php
// On charge le fichier du modèle.
require('modele.php');
$CardClients = new Clients;
$listeCardClients = $CardClients->getCardClient();
// On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('vue.php');
