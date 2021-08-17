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

                <p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Date de naissance: <?= date('d-m-Y', strtotime($PatientInfo->birthdate)) ?></li>
                    <li class="list-group-item">Téléphone: <?= $PatientInfo->phone ?></li>
                    <li class="list-group-item">Email: <?= $PatientInfo->mail ?></li>
                </ul>
                </p>
                <div class="row d-flex justify-content-center">
                    <div class="col-auto">
                        <button type="button" class="btn btn-outline-success btn-sm p-2" data-bs-toggle="modal" data-bs-target="#modifPatientModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
                            </svg>Modifier les informations
                        </button>
                    </div>
                    <div class="col-auto">
                        <form method="POST" action="">
                            <button type="submit" id="deletePatient" name="deletePatient" class="btn btn-outline-danger btn-sm p-2" name="deletePatient">
                                <svg xmlns=" http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    <path fill-rule="evenodd" d="M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                                </svg>
                                </svg>Supprimer le patient
                            </button>
                        </form>
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
                <p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= date('d-m-Y, g:i a', strtotime($Appointment->dateHour)) ?></li>
                </ul>
                </p>
            </div>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-secondary me-md-2" href="../controler/liste-patients-controler.php">Liste des patients</a>
    </div>

</div>
</div>

<!-- fenêtre modale pour confirmer la suppression -->
<!-- <div class="modal hide fade" id="confirmModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Confirmation de la suppression</h3>
    </div>
    <div class="modal-body">
        <p>Etes-vous sûr de vouloir supprimer cet élément ?</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" id="confirmModalNo">Non</a>
        <a href="#" class="btn btn-primary" id="confirmModalYes">Oui</a>
    </div>
</div> -->


<!-- Modal -->
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
                    <input type="submit" id="updatePatient" class="btn btn-success btn-sm px-3" name="updatePatient" value="Enregistrer les modifications">
                    <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php include('footer.php'); ?>