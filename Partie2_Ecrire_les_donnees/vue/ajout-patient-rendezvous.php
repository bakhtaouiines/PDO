<?php include('header.php'); ?>

<div class="container my-5 p-5 border bg-light shadow-sm" style="max-width: 800px;">

    <h4 class="fw-lighter mb-5">Enregistrer un nouveau patient:</h4>
    <form method="POST" action="" class="row g-3 needs-validation">
        <div class="row mb-3">
            <div class="col-md-6 position-relative">
                <label for="lastname" class="form-label">Nom de famille</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
                <p class="text-danger">
                    <?= isset($errors['lastname']) ? $errors['lastname'] : '' ?>
                </p>
            </div>
            <div class="col-md-6 position-relative">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
                <p class="text-danger">
                <p><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></p>
                </p>
            </div>
            <div class="col-md-4 position-relative">
                <label for="birthdate" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                <p class="text-danger">
                <p><?= isset($errors['birthdate']) ? $errors['birthdate'] : '' ?></p>
                </p>
            </div>
            <div class="col-md-3 position-relative">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="number" class="form-control" id="phone" name="phone" required>

                <p class="text-danger">
                <p><?= isset($errors['phone']) ? $errors['phone'] : '' ?></p>
                </p>
            </div>
            <div class="col-md-5 position-relative">
                <label for="mail" class="form-label">Adresse Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="mailPrepend">@</span>
                    <input type="text" class="form-control" id="mail" name="mail" aria-describedby="mailPrepend" required>
                    <p class="text-danger">
                    <p><?= isset($errors['mail']) ? $errors['mail'] : '' ?></p>
                    </p>
                </div>
            </div>
        </div>
        <hr>
        <div class="mt-3">
            <label for="appointmentDate" class="fs-4 fw-lighter me-3">Sélectionner un jour et un horaire:</label>
            <input type="datetime-local" id="appointmentDateHour" name="appointmentDateHour">
            <p class="text-danger"><?= isset($errors['appointmentDateHour']) ? $errors['appointmentDateHour'] : '' ?></p>
        </div>
        <hr>
        <div class="row d-flex justify-content-center my-4">
            <div class="col-auto">
                <button class="btn btn-outline-success p-2" type="submit" name="buttonAddPatientAndAppointment" id="buttonAddPatientAndAppointment" onclick="addPatient()">
                    <i class="bi bi-person-plus p-2"></i>
                    Ajouter un patient et un RDV</button>
            </div>
        </div>
    </form>
    <hr>
    <div class="col-12 mt-5 text-center">
        <a href="../controler/liste-rendezvous-controler.php" class="btn btn-outline-secondary p-2" role="button">
            <i class="bi bi-calendar-range p-2"></i>
            Voir la liste des rendez-vous</a>
        <a href="../controler/liste-patients-controler.php" class="btn btn-outline-secondary p-2" role="button"><i class="bi bi-person-lines-fill p-2"></i>
            Voir la liste des patients</a>
    </div>
</div>

<div id="addPatientToast">Le patient a bien été enregistré!</div>

<?php include('footer.php'); ?>