<?php include('header.php'); ?>

<div class="container my-5 p-5 border bg-light shadow-sm" style="max-width: 800px;">
    <h2 class="fw-lighter mb-5">Enregistrer un nouveau patient:</h2>
    <form method="POST" action="" class="row g-3 needs-validation">
        <div class="row">
            <div class="col-md-6 position-relative">
                <label for="lastname" class="form-label">Nom de famille</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
                <p class="text-danger">
                    <?= isset($errors['lastname']) ? $errors['lastname'] : '' ?>
                </p>
            </div>

            <div class="col-md-6 position-relative">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname" >

                <p class="text-danger">
                    <?= isset($errors['firstname']) ? $errors['firstname'] : '' ?>
                </p>
            </div>

            <div class="col-md-4 position-relative">
                <label for="birthdate" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" >

                <p class="text-danger">
                    <?= isset($errors['birthdate']) ? $errors['birthdate'] : '' ?>
                </p>
            </div>

            <div class="col-md-3 position-relative">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="number" class="form-control" id="phone" name="phone" >

                <p class="text-danger">
                    <?= isset($errors['phone']) ? $errors['phone'] : '' ?>
                </p>
            </div>

            <div class="col-md-5 position-relative">
                <label for="mail" class="form-label">Adresse Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="mailPrepend">@</span>
                    <input type="text" class="form-control" id="mail" name="mail" aria-describedby="mailPrepend" >
                    <p class="text-danger">
                        <?= isset($errors['mail']) ? $errors['mail'] : '' ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-4">
            <div class="col-auto">
                <button class="btn btn-outline-success p-2" type="submit" name="buttonAddPatient" id="buttonAddPatient" onclick="addPatient()">
                    <i class="bi bi-person-plus p-2"></i>
                    Ajouter un patient</button>
            </div>
            <div class="col-auto">
                <a href="../controler/liste-patients-controler.php" class="btn btn-outline-secondary p-2" role="button"><i class="bi bi-person-lines-fill p-2"></i>
                    Voir la liste des patients</a>
            </div>
        </div>
    </form>
</div>



<div id="addPatientToast">Le patient a bien été enregistre !</div>

<?php include('footer.php'); ?>