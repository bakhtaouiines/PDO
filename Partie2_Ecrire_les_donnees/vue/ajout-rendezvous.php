<?php include('header.php'); ?>

<div class="container my-5 p-5 bg-light shadow-sm" style="max-width: 600px;">
    <h2 class="fw-lighter mb-5 text-center">Ajouter un rendez-vous:</h2>
    <form method="POST" action="" class="row g-3 needs-validation">
        <div class="row text-center">
            <div class="col-md-12 mb-5">
                <select id="idPatients" name="idPatients" class="form-select" size="5">
                    <option value="" selected disabled>
                        Patient:
                    </option>
                    <?php
                    foreach ($getPatientId as $values) {
                    ?>
                        <option value="<?= $values->id ?>">
                            <?= $values->lastname ?>, <?= $values->firstname ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
                <div>
                    <p class="text-danger"><?= isset($errors['patientId']) ? $errors['patientId'] : '' ?></p>
                </div>
            </div>

            <label for="appointmentDate" class="fs-5 fw-lighter mb-3">Sélectionner un jour et un horaire:</label>
            <input type="datetime-local" id="appointmentDateHour" name="appointmentDateHour">
            <div>
                <p class="text-danger"><?= isset($errors['appointmentDateHour']) ? $errors['appointmentDateHour'] : '' ?></p>
            </div>
        </div>

        <div class="col-12 mt-5 text-center">
            <button class="btn btn-outline-success p-2" type="submit" name="buttonAddAppointment" id="buttonAddAppointment">
                <i class="bi bi-calendar-plus p-2"></i>
                Ajouter un rendez-vous</button>
            <a href="../controler/liste-rendezvous-controler.php" class="btn btn-outline-secondary p-2" role="button">
                <i class="bi bi-calendar-range p-2"></i>
                Voir la liste des rendez-vous</a>
        </div>
    </form>
</div>
<?php include('footer.php'); ?>