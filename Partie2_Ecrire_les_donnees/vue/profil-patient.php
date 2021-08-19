<?php include('header.php'); ?>

<div class="content container accordion p-5 border mb-3 shadow-sm p-3 mb-5 bg-body rounded" id=" accordionOne" style="width: 50rem;">

    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">Fiche Patient</button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
                <h3>
                    Patient n°<?= $PatientInfo->id ?></h3>
                <h4 class="fst-italic"><?= $PatientInfo->lastname ?>, <?= $PatientInfo->firstname ?></h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item lh-lg">Date de naissance: <?= date('d-m-Y', strtotime($PatientInfo->birthdate)) ?></li>
                    <li class="list-group-item lh-lg">Téléphone: <?= $PatientInfo->phone ?></li>
                    <li class="list-group-item lh-lg">Email: <?= $PatientInfo->mail ?></li>
                </ul>
                <hr>
                <div class="row d-flex justify-content-center my-4">
                    <div class="col-auto">
                        <button type="button" class="btn btn-outline-success btn-sm p-2" data-bs-toggle="modal" data-bs-target="#modifPatientModal">
                            <i class="bi bi-pencil"></i>
                            Modifier les informations
                        </button>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-outline-danger btn-sm p-2" data-bs-toggle="modal" data-bs-target="#deletePatientModal">
                            <i class="bi bi-person-x"></i>
                            Supprimer le patient
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item mb-4">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                Rendez-vous
            </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
                <?php
                for ($i = 0; $i < count($Appointment); $i++) {
                    $value = $Appointment[$i];
                ?>
                    <p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center text-success fs-3"><?= date('d-m-Y, G:i', strtotime($value->dateHour)) ?></li>
                    </ul>
                    </p>
                <?php
                }
                ?>
                <button type="button" class="btn btn-outline-danger btn-sm p-2" data-bs-toggle="modal" data-bs-target="#deleteAppointmentModal">
                    <i class="bi bi-person-x"></i>
                    Annuler le rendez-vous
                </button>
            </div>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-secondary me-md-2" href="../controler/liste-patients-controler.php">
            <i class="bi bi-person-lines-fill"></i>
            Liste des patients</a>
    </div>
</div>
</div>

<!-- Modal modif info patient-->
<div class="modal fade" id="modifPatientModal" tabindex="-1" aria-labelledby="modifPatientModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-5">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="modifPatientModal">Modification des informations personnelles du patient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-6 position-relative">
                            <label for="updatedLastname" class="form-label">Nom de famille</label>
                            <input type="text" class="form-control" id="updatedLastname" name="updatedLastname" value="<?= $PatientInfo->lastname ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['updatedLastname']) ? $errors['updatedLastname'] : '' ?>
                            </div>
                        </div>

                        <div class="form-group col-6 position-relative">
                            <label for="updatedFirstname" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="updatedFirstname" name="updatedFirstname" value="<?= $PatientInfo->firstname ?>">
                            <div class="invalid-feedback">
                                <p><?= isset($errors['updatedFirstname']) ? $errors['updatedFirstname'] : '' ?></p>
                            </div>
                        </div>

                        <div class="form-group col-6 position-relative">
                            <label for="updatedBirthdate" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="updatedBirthdate" name="updatedBirthdate" value="<?= $PatientInfo->birthdate ?>">
                            <div class="invalid-feedback">
                                <p><?= isset($errors['updatedBirthdate']) ? $errors['updatedBirthdate'] : '' ?></p>
                            </div>
                        </div>

                        <div class="form-group col-6 position-relative">
                            <label for="updatedPhone" class="form-label">Téléphone</label>
                            <input type="number" class="form-control" id="updatedPhone" name="updatedPhone" value="<?= $PatientInfo->phone ?>">

                            <div class="invalid-feedback">
                                <p><?= isset($errors['updatedPhone']) ? $errors['updatedPhone'] : '' ?></p>
                            </div>
                        </div>

                        <div class="form-group col-12 position-relative">
                            <label for="updatedMail" class="form-label">Adresse Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="mailPrepend">@</span>
                                <input type="text" class="form-control" id="updatedMail" name="updatedMail" aria-describedby="mailPrepend" value="<?= $PatientInfo->mail ?>">

                                <div class="invalid-feedback">
                                    <p><?= isset($errors['updatedMail']) ? $errors['updatedMail'] : '' ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="submit" id="updatePatient" class="btn btn-outline-success btn-sm px-3" name="updatePatient">Enregistrer les modifications</button>
                    <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal confirmation suppression de RDV -->
<div class="modal fade" id="deleteAppointmentModal" tabindex="-1" aria-labelledby="deleteAppointmentModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-center p-5">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression de RDV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="lead lh-sm text-danger">
                    Souhaitez-vous vraiment annuler ce rendez-vous?
                </p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="">
                    <button type="submit" id="deleteAppointment" name="deleteAppointment" class="btn btn-outline-danger btn-sm p-2" name="deletePatient">Confirmer</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal confirmation suppression patient -->
<div class="modal fade" id="deletePatientModal" tabindex="-1" aria-labelledby="deletePatientModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-center p-3">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">Confirmation de suppression du patient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="lead lh-sm">
                    Souhaitez-vous vraiment supprimer ce patient?
                <p class="fw-bold">Cela supprimera sa fiche d'informations ainsi que ses rendez-vous.</p>
                </p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="">
                    <button type="submit" id="deletePatient" name="deletePatient" class="btn btn-outline-danger btn-sm p-2" name="deletePatient">
                        Confirmer</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('footer.php'); ?>