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
    <header>
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a class="navbar-brand" href="index-controler.php">
                <img src="../images/logo.png" alt="logo de l'hôpital E2N" width="200" height="80">
            </a>
            <a href="index-controler.php">Accueil</a>
            <a href="../controler/ajout-patient-controler.php">Ajouter un patient</a>
            <a href="../controler/liste-patients-controler.php">Liste des patients</a>
            <a href="#">Ajouter un rendez-vous</a>
            <a href="#">Liste des rendez-vous</a>
            <a href="#">Ajouter un patient et un rendez-vous</a>
        </div>

        <div id="main">
            <button class="openbtn" onclick="openNav()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
        </div>
    </header>