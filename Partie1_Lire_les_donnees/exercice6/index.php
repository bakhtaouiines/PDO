<?php
// On charge le fichier du modèle.
require('modele.php');
$Shows = new Shows;
$listShows = $Shows->getAllShows();
// On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('vue.php');
