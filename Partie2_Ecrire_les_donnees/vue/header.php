<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@100&display=swap" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <title>Hôpital E2N</title>
</head>

<body>

    <button class="btn btn-primary m-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" style="background-color: #04AA6D;">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
    </button>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="opacity: 0.8; background-color: #478658;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                <a href="index-controler.php">
                    <img src="../images/logo.png" alt="logo de l'hôpital E2N" width="250" height="250">
                </a>
            </h5>
            <button type="button" class="btn-close btn-lg btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ">
            <div class="list-group">
                <a href="index-controler.php" class="list-group-item list-group-item-action">Accueil</a>
                <a href="../controler/ajout-patient-controler.php" class="list-group-item list-group-item-action">Ajouter un patient</a>
                <a href="../controler/liste-patients-controler.php" class="list-group-item list-group-item-action">Liste des patients</a>
                <a href="../controler/ajout-rendezvous-controler.php" class="list-group-item list-group-item-action">Ajouter un rendez-vous</a>
                <a href="../controler/liste-rendezvous-controler.php" class="list-group-item list-group-item-action">Liste des rendez-vous</a>
                <a href="#" class="list-group-item list-group-item-action">Ajouter un patient et un rendez-vous</a>
            </div>
        </div>
    </div>