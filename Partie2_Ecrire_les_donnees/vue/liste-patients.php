<?php include('header.php'); ?>

<div class="container p-3" style="width: auto;">
    <div class="row">
        <div class="col-auto ms-auto mb-3">
            <a href="../controler/ajout-patient-controler.php" class="btn btn-outline-success btn-lg p-3" role="button">
                <i class="bi bi-person-plus fs-4 p-2"></i>
                Ajouter un patient
            </a>
        </div>
    </div>
    <table class="table table-hover table-bordered table-responsive bg-light shadow-sm">
        <thead style="background-color: #2edb98;">
            <tr class="align-middle ">
                <th scope="col" class="text-center text-uppercase p-4">Nom</th>
                <th scope="col" class="text-center text-uppercase p-4">Prénom</th>
                <th scope="col" class="text-center">
                    <i class="bi bi-person fs-2"></i>
                </th>
            </tr>
        </thead>

        <tbody>
            <?php
            // On affiche chaque entrée une à une
            foreach ($PatientsList as $value) {
            ?>
                <tr class="align-middle">
                    <td class="text-center p-3"><?= $value->lastname ?></td>
                    <td class="text-center p-3"><?= $value->firstname ?></td>
                    <td class="text-center p-3">
                        <a href="../controler/profil-patient-controler.php?patientId=<?= $value->id ?>" class="btn btn-success btn-sm p-2" role="button">
                            Consulter
                        </a>
                        <button type="button" class="btn btn-danger btn-sm p-2" data-bs-toggle="modal" data-bs-target="#deletePatientModal">
                            Supprimer
                        </button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

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
                <p class="fw-bold text-danger">Cela supprimera sa fiche d'informations ainsi que ses rendez-vous.</p>
                </p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="">
                    <button type="submit" id="deletePatientAndAppointment" name="deletePatientAndAppointment" class="btn btn-outline-danger btn-sm p-2">
                        Confirmer</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>