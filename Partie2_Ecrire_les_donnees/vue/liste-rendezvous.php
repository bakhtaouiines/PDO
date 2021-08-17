<?php include('header.php'); ?>

<div class="content container p-5 " style="width: auto;">
    <table class="table table-hover table-bordered table-responsive">
        <thead style="background-color: #2edb98;">
            <tr class="align-middle">
                <th scope="col" class="text-center text-uppercase p-4">Date et Heure</th>
                <th scope="col" class="text-center p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar2-day" viewBox="0 0 16 16">
                        <path d="M4.684 12.523v-2.3h2.261v-.61H4.684V7.801h2.464v-.61H4v5.332h.684zm3.296 0h.676V9.98c0-.554.227-1.007.953-1.007.125 0 .258.004.329.015v-.613a1.806 1.806 0 0 0-.254-.02c-.582 0-.891.32-1.012.567h-.02v-.504H7.98v4.105zm2.805-5.093c0 .238.192.425.43.425a.428.428 0 1 0 0-.855.426.426 0 0 0-.43.43zm.094 5.093h.672V8.418h-.672v4.105z" />
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                        <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                    </svg>
                </th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($AppointmentsList as $value) {
            ?>
                <tr class="align-middle">
                    <td class="text-center p-3"><?= date('d-m-Y, g:i a', strtotime($value->dateHour)) ?></td>
                    <td class="text-center p-3">
                        <a href="../controler/rendezvous-controler.php?rdvId=<?= $value->id ?>" class="btn btn-success btn-sm p-2" role="button">
                            Consulter
                        </a>
                        <a href="" class="btn btn-danger btn-sm p-2" role="button">
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>
    <div class="row">
        <div class="col-auto ms-auto my-5">
            <a href="../controler/ajout-rendezvous-controler.php" class="btn btn-outline-success btn-lg p-3" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                </svg>Ajouter un rendez-vous</a>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>