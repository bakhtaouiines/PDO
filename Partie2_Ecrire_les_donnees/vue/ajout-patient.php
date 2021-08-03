<?php include('header.php'); ?>

<div class="container my-5 p-5 border bg-light">
    <h1 class="fs-4 fw-lighter mb-5">Enregistrer un nouveau patient:</h1>
    <form method="POST" action="" class="row g-3 needs-validation">
        <div class="row">
            <div class="col-md-6 position-relative">
                <label for="lastname" class="form-label">Nom de famille</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
                <div class="invalid-tooltip">
                    <?= isset($errors['lastname']) ? $errors['lastname'] : '' ?>

                </div>
            </div>
            <div class="col-md-6 position-relative">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
                <div class="invalid-tooltip">
                    <p><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></p>
                </div>
            </div>

            <div class="col-md-3 position-relative">
                <label for="birthdate" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
                <div class="invalid-tooltip">
                    <p><?= isset($errors['birthdate']) ? $errors['birthdate'] : '' ?></p>
                </div>
            </div>

            <div class="col-md-3 position-relative">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="number" class="form-control" id="phone" name="phone" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
                <div class="invalid-tooltip">
                    <p><?= isset($errors['phone']) ? $errors['phone'] : '' ?></p>
                </div>
            </div>
            <div class="col-md-6 position-relative">
                <label for="mail" class="form-label">Adresse Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="mailPrepend">@</span>
                    <input type="text" class="form-control" id="mail" name="mail" aria-describedby="mailPrepend" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                    <div class="invalid-tooltip">
                        <p><?= isset($errors['mail']) ? $errors['mail'] : '' ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-5">
            <button class="btn btn-outline-secondary btn-lg p-4" type="submit" name="buttonAddPatient" id="buttonAddPatient">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                </svg>Ajouter un patient</button>
            <a href="../controler/liste-patients-controler.php" class="btn btn-outline-secondary btn-lg p-4" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
                    <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                    <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>Voir la liste des patients</a>
        </div>
    </form>
</div>
<?php include('footer.php'); ?>