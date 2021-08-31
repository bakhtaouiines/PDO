<?php include('header.php'); ?>

<div class="container p-3">
    <!-- formulaire  de recherche de patient -->
    <div class="row justify-content-end my-2">
        <div class="col-md-4 offset-md-9">
            <form method="GET" action="">
                <div class="input-group rounded mb-3">
                    <input type="search" id="searchPatient" name="searchPatient" class="form-control rounded" placeholder="Rechercher un patient" aria-label="Rechercher un patient" value="<?= ($SearchPatientsList != '') ? $SearchPatientsList :  ''  ?>">
                    <button type="submit" id="submitSearchPatient" name="submitSearchPatient" class="input-group-text border-0 bg-light">
                        <i class="bi bi-search"></i>
                    </button>
                </div>

                <!-- filtre de recherche -->
                <div class="col-md-6 offset-md-6">
                    <select id="patientFilter" name="patientFilter[]" class="form-select" multiple>
                        <option value="" selected disabled>Filtrer la recherche par:</option>
                        <option value="lastname">Nom</option>
                        <option value="firstname">Prénom</option>
                        <option value="mail">Mail</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <!-- bouton redirige vers formulaire ajout patient -->
    <div class="row my-2">
        <div class="col-md-4">
            <a href="../controler/ajout-patient-controler.php" class="btn btn-outline-success p-2" role="button">
                <i class="bi bi-person-plus fs-5 p-2"></i>
                Ajouter un patient
            </a>
        </div>

        <?php
        if ($isCorrectPage) {
        ?>
            <!-- pagination -->
            <div class="col-md-3 offset-md-9">
                <nav aria-label="navigationPatients">
                    <ul class="pagination">
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a class="page-link" href="?page=<?= $currentPage - 1 ?><?= ($SearchPatientsList != '') ? '&searchPatient=' . $SearchPatientsList . '&patientFilter%5B%5D=' . $patientFilterString :  ''  ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <?php for ($page = 1; $page <= $numberOfPages; $page++) : ?>
                            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a class="page-link" href="?page=<?= $page ?><?= ($SearchPatientsList != '') ? '&searchPatient=' . $SearchPatientsList . '&patientFilter%5B%5D=' . $patientFilterString : '' ?>"><?= $page ?>
                                </a>
                            </li>
                        <?php endfor ?>

                        <li class="page-item <?= ($currentPage == $numberOfPages) ? "disabled" : "" ?>">
                            <a class="page-link" href="?page=<?= $currentPage + 1 ?><?= ($SearchPatientsList != '') ? '&searchPatient=' . $SearchPatientsList . '&patientFilter%5B%5D=' . $patientFilterString :  ''  ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
    </div>



    <!-- tableau patients -->
    <table class="table table-hover table-bordered table-responsive bg-light shadow-sm mt-3">
        <thead style="background-color: #21a869;">
            <tr class="align-middle text-white">
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
                        <button type="button" class="btn btn-danger btn-sm p-2" data-bs-toggle="modal" data-bs-target="#deletePatientModal" onClick="deleteIdPatients(<?= $value->id ?>)">
                            Supprimer
                        </button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<?php
        } else { ?>
    <p>Une erreur est survenue lors de l'obtention de cette page.
        <a href="../controler/liste-patients-controler.php" class="btn btn-outline-secondary p-2" role="button">Retour à la liste des patients</a>
    </p>

<?php
        }
?>

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
                    <input type="hidden" id="delete_idPatients" name="delete_idPatients" value="">
                    <button type="submit" id="deletePatientAndAppointment" name="deletePatientAndAppointment" class="btn btn-outline-danger btn-sm p-2">Confirmer</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>