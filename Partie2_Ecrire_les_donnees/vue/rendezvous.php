<?php include('header.php'); ?>

<div class="content container p-5" style="width: 50rem;">
    <div class="card border border-secondary mb-3 shadow-sm p-3 mb-5 bg-body rounded">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="#">Rendez-vous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true" href="../controler/profil-patient-controler.php?patientId=<?= $PatientInfo->id ?>">Fiche-patient</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <h3 class="card-title">
                Patient n°<?= $PatientInfo->id ?></h3>
            <h4 class="fst-italic"><?= $PatientInfo->lastname ?>, <?= $PatientInfo->firstname ?></p>

                <div class="card-text p-4 ">
                    <ul class="list-group list-group-flush text-center lh-lg">
                        <li class="list-group-item fw-bolder fs-4">
                            <p class="text-success bg-light">Date et Heure:<br>
                                <?= date('d-m-Y, g:i a', strtotime($Appointment->dateHour)) ?>
                            </p>
                        </li>
                    </ul>
                </div>
                <hr>
                <div class="row d-flex justify-content-center my-4">
                    <div class="col-6">
                        <button type="button" class="btn btn-outline-success btn-sm p-2" data-bs-toggle="modal" data-bs-target="#modifAppointmentModal">
                            <i class="bi bi-pencil"></i>
                            Modifier le rendez-vous
                        </button>
                    </div>
                    <div class="col-auto">

                        <button type="button" class="btn btn-outline-danger btn-sm p-2" data-bs-toggle="modal" data-bs-target="#deleteAppointmentModal">
                            <i class="bi bi-person-x"></i>
                            Annuler le rendez-vous
                        </button>

                    </div>
                </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-secondary me-md-2" href="../controler/liste-rendezvous-controler.php">
                <i class="bi bi-calendar-range"></i>
                Liste des rendez-vous</a>
        </div>
    </div>
</div>

</div>
<!-- Modal Modif RDV-->
<div class="modal fade" id="modifAppointmentModal" tabindex="-1" aria-labelledby="modifAppointmentModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-5">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="modifAppointmentModal">Modification du rendez-vous</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-6 position-relative">
                            <label for="updatedDateHour" class="form-label">Date</label>
                            <input type="datetime-local" class="form-control" id="updatedDateHour" name="updatedDateHour" value="">
                            <div class="invalid-feedback">
                                <?= isset($errors['updatedDateHour']) ? $errors['updatedDateHour'] : '' ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="submit" id="updateAppointment" class="btn btn-outline-success btn-sm px-3" name="updateAppointment">Enregistrer les modifications</button>
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
</div>

<?php include('footer.php'); ?>