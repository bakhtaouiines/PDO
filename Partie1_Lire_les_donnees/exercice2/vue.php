<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PDO-Exercice 2</title>
</head>

<body>
<h1 class="text-center fs-3 fw-lighter my-3">Types de spectacles</h1>
    <div class="container mx-auto" style="width: 200px;">
        
        <ul class="list-group">
            <li class="list-group-item list-group-item-success">Types de spectacles</li>
            <?php
            // On affiche chaque entrée une à une
            foreach ($listeShowTypes as $key => $value) {
            ?>
                <li class="list-group-item list-group-item-action" style="background-color: #F8D7DA;"><?= $value->type ?></li>
            <?php
            }
            ?>
        </ul>
    </div>
</body>

</html>