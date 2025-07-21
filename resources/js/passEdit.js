document.addEventListener("DOMContentLoaded", function () {
    const cancelButton = document.getElementById("cancelButton");
    const fields = [
        document.getElementById("current_password"),
        document.getElementById("new_password"),
        document.getElementById("new_password_confirmation"),
    ];

    if (cancelButton) {
        cancelButton.addEventListener("click", function () {
            fields.forEach((field) => {
                if (field) field.value = "";
            });
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    // Password Sekarang
    const btnCurrentPass = document.getElementById("btnCurrentPass");
    const currentPasswordInput = document.getElementById("current_password");
    const currentPassOpenIcon = document.getElementById("currentPassOpen");
    const currentPassCloseIcon = document.getElementById("currentPassClose");

    if (
        btnCurrentPass &&
        currentPasswordInput &&
        currentPassOpenIcon &&
        currentPassCloseIcon
    ) {
        btnCurrentPass.addEventListener("click", function () {
            const isHidden = currentPasswordInput.type === "password";
            currentPasswordInput.type = isHidden ? "text" : "password";
            currentPassOpenIcon.classList.toggle("hidden", !isHidden);
            currentPassCloseIcon.classList.toggle("hidden", isHidden);
        });
    }

    // Password Baru
    const btnNewPass = document.getElementById("btnNewPass");
    const newPasswordInput = document.getElementById("new_password");
    const newPassOpenIcon = document.getElementById("newPassOpen");
    const newPassCloseIcon = document.getElementById("newPassClose");

    if (btnNewPass && newPasswordInput && newPassOpenIcon && newPassCloseIcon) {
        btnNewPass.addEventListener("click", function () {
            const isHidden = newPasswordInput.type === "password";
            newPasswordInput.type = isHidden ? "text" : "password";
            newPassOpenIcon.classList.toggle("hidden", !isHidden);
            newPassCloseIcon.classList.toggle("hidden", isHidden);
        });
    }

    // Konfirmasi Password
    const btnConfirmPass = document.getElementById("btnConfirmPass");
    const confirmPasswordInput = document.getElementById(
        "new_password_confirmation"
    );
    const confirmPassOpenIcon = document.getElementById("confirmPassOpen");
    const confirmPassCloseIcon = document.getElementById("confirmPassClose");

    if (
        btnConfirmPass &&
        confirmPasswordInput &&
        confirmPassOpenIcon &&
        confirmPassCloseIcon
    ) {
        btnConfirmPass.addEventListener("click", function () {
            const isHidden = confirmPasswordInput.type === "password";
            confirmPasswordInput.type = isHidden ? "text" : "password";
            confirmPassOpenIcon.classList.toggle("hidden", !isHidden);
            confirmPassCloseIcon.classList.toggle("hidden", isHidden);
        });
    }
});
