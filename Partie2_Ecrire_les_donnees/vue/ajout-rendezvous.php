<?php include('header.php'); ?>

<div class="content container my-5 p-5 border" style="max-width: 600px;">
    <h2 class="fw-lighter mb-5 text-center">Choisir un rendez-vous:</h2>
    <form method="POST" action="" class="row g-3 needs-validation">
        <div class="row text-center">
            <div class="col-md-12 mb-5">
                <select id="idPatients" name="idPatients" class="form-select" required>
                    <option selected>
                        Patient:
                    </option>
                    <?php
                    foreach ($getPatientId as $values) {
                    ?>">
                    <option value="<?= $values->id ?>"><?= $values->lastname ?>, <?= $values->firstname ?></option>
                <?php
                    }
                ?>
                </select>
                <div>
                    <p><?= isset($errors['patientId']) ? $errors['patientId'] : '' ?></p>
                </div>
            </div>

            <label for="appointmentDate" class="fs-5 fw-lighter mb-3">Sélectionner un jour et un horaire:</label>
            <input type="datetime-local" id="appointmentDateHour" name="appointmentDateHour">
            <div>
                <p class="text-danger"><?= isset($errors['appointmentDateHour']) ? $errors['appointmentDateHour'] : '' ?></p>
            </div>
        </div>

        <div class="col-12 mt-5 text-center">
            <button class="btn btn-outline-success btn-sm p-2" type="submit" name="buttonAddAppointment" id="buttonAddAppointment">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                </svg>Ajouter un rendez-vous</button>
            <a href="../controler/liste-rendezvous-controler.php" class="btn btn-outline-secondary btn-sm p-2" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
                    <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                    <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>Voir la liste des rendez-vous</a>
        </div>
    </form>
</div>
<?php include('footer.php'); ?>