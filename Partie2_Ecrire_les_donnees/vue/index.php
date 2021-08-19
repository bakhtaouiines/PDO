<?php include('header.php'); ?>

<div class="card mx-auto shadow-sm p-2" style="max-width: 60rem;">
    <div class="row g-0">
        <div class="col-md-4">
            <div class="card-body text-center">
                <h3 class="card-title fw-lighter text-success ">Bienvenue sur l'espace enregistrement</h3>
                <img src="../images/logo.png" alt="logo de l'hôpital E2N" width="220" height="220">
                <div class="card-text lh-lg mt-4">
                    <div class="btn-group-vertical me-4" role="group">
                        <a href="../controler/ajout-patient-controler.php" class="btn btn-outline-secondary  p-2">
                            <i class="homeIcon bi bi-person-plus"></i>
                        </a>
                        <a href="../controler/liste-patients-controler.php" class="btn btn-outline-secondary p-2">
                            <i class="homeIcon bi bi-person-lines-fill"></i>
                        </a>
                    </div>
                    <div class="btn-group-vertical" role="group">
                        <a href="../controler/ajout-rendezvous-controler.php" class="btn btn-outline-success p-2">
                            <i class="homeIcon bi bi-calendar-plus"></i>
                        </a>
                        <a href="../controler/liste-rendezvous-controler.php" class="btn btn-outline-success p-2">
                            <i class="homeIcon bi bi-calendar-range"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 ">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../images/home.jpg" class="d-block w-100" alt="accueil de l'hôpital E2N">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/nurse.jpg" class="d-block w-100" alt="un couloir de l'hôpital">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/surgeons.jpg" class="d-block w-100" alt="chirurgiens en pleine opération">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/newborn.jpg" class="d-block w-100" alt="un nouveau né">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>