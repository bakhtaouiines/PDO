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
                    <option value="<?= $values->id ?>">
                        <?= $values->lastname ?>, <?= $values->firstname ?>
                    </option>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-calendar-plus" viewBox="0 0 16 16">
                    <path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                </svg> Ajouter un rendez-vous</button>
            <a href="../controler/liste-rendezvous-controler.php" class="btn btn-outline-secondary btn-sm p-2" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-calendar-range" viewBox="0 0 16 16">
  <path d="M9 7a1 1 0 0 1 1-1h5v2h-5a1 1 0 0 1-1-1zM1 9h4a1 1 0 0 1 0 2H1V9z"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg> Voir la liste des rendez-vous</a>
        </div>
    </form>
</div>
<?php include('footer.php'); ?>