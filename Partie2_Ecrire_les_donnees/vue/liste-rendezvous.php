<?php include('header.php'); ?>

<div class="container p-3" style="width: auto;">
    <div class="row">
        <div class="col-auto ms-auto mb-3">
            <a href="../controler/ajout-rendezvous-controler.php" class="btn btn-outline-success btn-lg p-3" role="button"><i class="bi bi-person-plus fs-4 p-2"></i>
                Ajouter un rendez-vous</a>
        </div>
    </div>

    <table class="table table-hover table-bordered table-responsive bg-light shadow-sm">
        <thead style="background-color: #2edb98;">
            <tr class="align-middle">
                <th scope="col" class="text-center">
                    <i class="bi bi-person fs-2"></i>
                </th>
                <th scope="col" class="text-center text-uppercase p-4">Date et Heure</th>
                <th scope="col" class="text-center p-4">
                    <i class="bi bi-calendar2-day fs-2"></i>
                </th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($AppointmentsList as $value) {
            ?>
                <tr class="align-middle">
                    <td class="text-center p-3"><?= $value->lastname ?>, <?= $value->firstname ?></td>
                    <td class="text-center p-3"><?= date('d-m-Y, G:i', strtotime($value->dateHour)) ?></td>
                    <td class="text-center p-3">
                        <a href="../controler/rendezvous-controler.php?rdvId=<?= $value->id ?>" class="btn btn-success btn-sm p-2" role="button">
                            Consulter
                        </a>
                        <button type="button" class="btn btn-danger btn-sm p-2" data-bs-toggle="modal" data-bs-target="#deleteAppointmentModal" onClick="deleteId(<?= $value->id ?>)">
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
                    <input type="hidden" id="delete_id" name="delete_id" value="">
                    <button type="submit" id="deleteAppointment" name="deleteAppointment" class="btn btn-outline-danger btn-sm p-2">
                        Confirmer</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>