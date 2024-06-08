// Clear url params
window.history.replaceState({}, document.title, "register.php");

// Check if password and password confirmation match (IDK how this works but it works....)
function checkPasswordMatch() {
    let password = document.getElementById('passwdSi');
    let confirmPassword = document.getElementById('passwdConfirm');

    if (password.value !== confirmPassword.value) {
        confirmPassword.setCustomValidity('Passwords do not match');
    } else {
        confirmPassword.setCustomValidity('');
    }
}

// Add event listener to password and password confirmation fields
document.getElementById('passwdSi').addEventListener('change', checkPasswordMatch);
document.getElementById('passwdConfirm').addEventListener('change', checkPasswordMatch);

// SWITCH TO LOGIN PAGE
let registerLink = document.getElementById('link');

registerLink.addEventListener('click', () => {
    pageClose()

    setTimeout(() => {
        window.location.href = 'login.php'
    }, 800)
});

// SUBMIT REGISTER FORM
let registerForm = document.getElementById('formRegister');

registerForm.addEventListener('submit', (e) => {
    // Prevent the form from submitting
    e.preventDefault();

    // Check if the form is valid with bootstrap
    if (registerForm.checkValidity()) {
        pageClose()

        setTimeout(() => {
            registerForm.submit()
        }, 800)
    } else {
        registerForm.classList.add('was-validated');
    }
});