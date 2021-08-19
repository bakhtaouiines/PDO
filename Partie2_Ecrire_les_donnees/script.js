function addPatient() {
    let patientToast = document.getElementById("addPatientToast");
    patientToast.className = "show";
    setTimeout(function() {
        patientToast.className = patientToast.className.replace("show", "");
    }, 3000);
}

function deleteId() {
    document.getElementById('delete_id').value = deleteId();
}