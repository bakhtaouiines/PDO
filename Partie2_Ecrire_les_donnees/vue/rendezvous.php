<?php include('header.php'); ?>

<div class="content container p-5" style="width: 50rem;">
    <div class="card border border-secondary mb-3 shadow-sm p-3 mb-5 bg-body rounded">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="#">Rendez-vous</a>
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
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <button type="button" class="btn btn-outline-success btn-sm p-2" data-bs-toggle="modal" data-bs-target="#modifAppointmentModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
                            </svg>Modifier le rendez-vous
                        </button>
                    </div>
                    <div class="col-auto">
                        <form method="POST" action="">
                            <button type="submit" id="deleteAppointment" name="deleteAppointment" class="btn btn-outline-danger btn-sm p-2" name="deletePatient">
                                <svg xmlns=" http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    <path fill-rule="evenodd" d="M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                                </svg>
                                </svg>Annuler le rendez-vous
                            </button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-outline-secondary btn-lg p-3 me-md-2" href="../controler/liste-rendezvous-controler.php">Liste des rendez-vous</a>
    </div>
</div>

</div>
<!-- Modal -->
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
                    <input type="submit" id="updateAppointment" class="btn btn-success btn-sm px-3" name="updateAppointment" value="Enregistrer les modifications" required>
                    <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php include('footer.php'); ?>