// --- ACTIONS ---
// -- LOGOUT
let logout = document.getElementById('logout');

logout.addEventListener('click', () => {
    appClose()
    setTimeout(() => {
        window.location.href = '../auth/logout.php'
    }, 800)
});

// -- SWITCH TO SENT
let sentButton = document.getElementById('sent');
let receivedButton = document.getElementById('received');
let newButton = document.getElementById('new');

if (sentButton) {
    sentButton.addEventListener('click', () => {
        appClose()
        setTimeout(() => {
            window.location.href = 'sent.php'
        }, 800)
    });
}

if (receivedButton) {
    receivedButton.addEventListener('click', () => {
        appClose()
        setTimeout(() => {
            window.location.href = 'app.php'
        }, 800)
    });
}

if (newButton) {
    newButton.addEventListener('click', () => {
        appClose()
        setTimeout(() => {
            window.location.href = 'new.php'
        }, 800)
    });
}

// --- ANIMATIONS ---
// -- ONLOAD ANIMATION
window.onload = () => {
    appOpen()
    setTimeout(lettersOpen, 1000)
}

// -- BODY ANIMATION
function appOpen() {
    let body = document.getElementsByClassName('div-centered');
    let content = document.getElementsByClassName('content');

    anime({
        targets: content,
        scale: [0, 1],
        opacity: [0, 100],
        duration: 1000,
        easing: 'easeOutQuad'
    })

    anime({
        targets: body,
        width: '60%',
        duration: 1000,
        easing: 'easeOutQuad'
    })
}

function appClose() {
    let body = document.getElementsByClassName('div-centered');
    let content = document.getElementsByClassName('content');

    anime({
        targets: content,
        scale: 0,
        opacity: 0,
        duration: 800,
        easing: 'easeInQuad'
    })

    anime({
        targets: body,
        width: '100%',
        duration: 800,
        easing: 'easeInQuad'
    })
}

// -- BUTTONS ANIMATION
let buttons = document.getElementsByTagName('button');

for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('mouseenter', () => grow(buttons[i]));
    buttons[i].addEventListener('mouseleave', () => shrink(buttons[i]));
}

// -- LINKS ANIMATION
let links = document.getElementsByTagName('a');

for (let i = 0; i < links.length; i++) {
    links[i].addEventListener('mouseenter', () => grow(links[i]));
    links[i].addEventListener('mouseleave', () => shrink(links[i]));
}

// -- DROPDOWN ANIMATION
let dropdown = document.getElementById('dropdown');

dropdown.addEventListener('mouseenter', () => grow(dropdown));
dropdown.addEventListener('mouseleave', () => shrink(dropdown));

function grow(element) {
    anime({
        targets: element,
        scale: 1.1,
        duration: 200,
        easing: 'easeOutQuad'
    })
}

function shrink(element) {
    anime({
        targets: element,
        scale: 1,
        duration: 200,
        easing: 'easeOutQuad'
    })
}

// -- LETTER ANIMATION
function lettersOpen() {
    let letters = document.getElementsByClassName('div-letter');

    let observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                anime({
                    targets: entry.target,
                    scale: [0.2, 1],
                    opacity: 1,
                    duration: 800,
                    easing: 'easeOutElastic(1, .8)',
                });

                observer.unobserve(entry.target); // INFO: stop observing the element so it doesn't animate again
            }
        });
    });

    for (let i = 0; i < letters.length; i++) {
        observer.observe(letters[i]);
    }
}

// -- UPLOAD ANIMATION
let submitButton = document.getElementById('submit-button')

if (submitButton) {
    submitButton.addEventListener('click', function() {
        submitButton.innerHTML = ' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Uploading...';
    });
}

// -- ETC
// Bootstrap form validation
(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()