function addPatient() {
    let patientToast = document.getElementById("addPatientToast");
    patientToast.className = "show";
    setTimeout(function() {
        patientToast.className = patientToast.className.replace("show", "");
    }, 3000);
}

function deleteId(id) {
    document.getElementById('delete_id').value = id;
}

function deleteIdPatients(idPatients) {
    document.getElementById('delete_idPatients').value = idPatients;
}