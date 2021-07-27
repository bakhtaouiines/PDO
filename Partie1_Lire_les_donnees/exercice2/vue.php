<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PDO-Exercice 2</title>
</head>

<body>
    <h1>Les types de spectacle</h1>
    <?php
    // On affiche chaque entrée une à une
    while ($donnees = $req->fetch()) {
    ?>
        <p><?= $donnees['type'] ?></p>
    <?php
    }
    $req->closeCursor(); // On libère la connexion au serveur, permettant ainsi à d'autres requêtes SQL d'être exécutées, mais on laisse la requête dans un état lui permettant d'être de nouveau exécutée.
    ?>
</body>

</html>