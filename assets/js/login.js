// Clear url params
window.history.replaceState({}, document.title, "login.php");

// SWITCH TO REGISTER PAGE
let registerLink = document.getElementById('link');

registerLink.addEventListener('click', () => {
    pageClose()

    setTimeout(() => {
        window.location.href = 'register.php'
    }, 800)
});

// SUBMIT LOGIN FORM
let loginForm = document.getElementById('formLogin');

loginForm.addEventListener('submit', (e) => {
    // Prevent the form from submitting
    e.preventDefault();

    // Check if the form is valid with bootstrap
    if (loginForm.checkValidity()) {
        pageClose()

        setTimeout(() => {
            loginForm.submit()
        }, 800)
    } else {
        loginForm.classList.add('was-validated');
    }
});