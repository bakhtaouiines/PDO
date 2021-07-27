<?php
// On charge le fichier du modèle.
require('modele.php');
// On appelle la fonction, ce qui exécute le code à l'intérieur de modele.php, et on y récupère les noms des clients dans $req
$req = getClients();
// On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('vue.php');
?>