<?php
// On charge le fichier du modèle.
require('modele.php');
$ShowTypes = new ShowTypes;
$listeShowTypes = $ShowTypes->getAllShowTypes();
// On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('vue.php');
