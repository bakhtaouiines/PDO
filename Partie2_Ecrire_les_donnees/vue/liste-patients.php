<?php include('header.php'); ?>

<div class="content container p-5 " style="width: auto;">
    <table class="table table-hover table-bordered table-responsive">
        <thead style="background-color: #2edb98;">
            <tr class="align-middle ">
                <th scope="col" class="text-center text-uppercase p-4">Nom</th>
                <th scope="col" class="text-center text-uppercase p-4">Prénom</th>
                <th scope="col" class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>
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
            <a href="../controler/ajout-patient-controler.php" class="btn btn-outline-success btn-lg p-3" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                </svg>Ajouter un patient</a>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>