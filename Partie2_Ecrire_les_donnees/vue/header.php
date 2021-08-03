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
        <nav class="navbar navbar-expand-lg navbar-light sticky-top p-3" style="background-color: #deded5;">
            <div class="container-fluid mx-auto ">

                <a class="navbar-brand" href="index-controler.php">
                    <img src="../images/logo.png" alt="logo de l'hôpital E2N" width="200" height="80">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ">
                        <li class="nav-item px-5 fw-bolder">
                            <a class="nav-link active" aria-current="page" href="index-controler.php" style="color: #818963;">Accueil</a>
                        </li>
                        <li class="nav-item px-4">
                            <a class="nav-link" href="../controler/ajout-patient-controler.php" style="color: #818963;">Ajouter un patient</a>
                        </li>
                        <li class="nav-item px-4">
                            <a class="nav-link" href="liste-patients-controler.php" style="color: #818963;">Liste des patients</a>
                        </li>
                        <li class="nav-item px-4">
                            <a class="nav-link" href="#" style="color: #818963;">Ajouter un rendez-vous</a>
                        </li>
                        <li class="nav-item px-4">
                            <a class="nav-link" href="#" style="color: #818963;">Liste des rendez-vous</a>
                        </li>
                        <li class="nav-item px-4">
                            <a class="nav-link" href="#" style="color: #818963;">Ajouter un patient et un rendez-vous</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>