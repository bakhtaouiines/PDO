<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PDO-Exercice 4</title>
</head>

<body>
    <h1 class="text-center">Clients fidélisés</h1>
    <div class="container">
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Numéro carte de fidélité</th>
                </tr>
            </thead>

            <tbody>
                <?php
                // On affiche chaque entrée une à une
                foreach ($listeCardClients as $key => $value) {
                    
                ?>
                    <tr>
                        <td><?= $value->nom ?></td>
                        <td><?= $value->prenom ?></td>
                        <td><?= $value->dateNaissance ?></td>
                        <td><?= $value->carteFidelite ?></td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>