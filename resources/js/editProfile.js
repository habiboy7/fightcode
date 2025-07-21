document.addEventListener("DOMContentLoaded", function () {
    const editProfile = document.getElementById("editProfile");
    const cancelBtn = document.getElementById("cancelBtn");
    const editForm = document.getElementById("editForm");
    const formDisplay = document.getElementById("formDisplay");

    if (editProfile) {
        editProfile.addEventListener("click", function () {
            formDisplay.style.display = "none";
            editForm.classList.remove("hidden");
        });
    }

    if (cancelBtn) {
        cancelBtn.addEventListener("click", function () {
            editForm.classList.add("hidden");
            formDisplay.style.display = "grid";
        });
    }
});



