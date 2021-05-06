registerUserForm = document.getElementById("formRegisterUser");
registerPassword = document.getElementById("registerUserButton");
registerConfirmPassword = document.getElementById("registerUserButton");

function validateRegister() {
    if (registerPassword == registerConfirmPassword) {
        registerUserForm.submit();
    }
}
