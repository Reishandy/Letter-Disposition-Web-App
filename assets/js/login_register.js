// --- ANIMATIONS ---
// -- ONLOAD ANIMATION
window.onload = () => {
    pageOpen()
}

// -- BUTTON ANIMATION
let button = document.getElementById('button')

button.addEventListener('mouseenter', () => grow(button));
button.addEventListener('mouseleave', () => shrink(button));

// -- LINK ANIMATION
let register = document.getElementById('link')

register.addEventListener('mouseenter', () => grow(register));
register.addEventListener('mouseleave', () => shrink(register));

// -- HOVER FUNCTIONS
function grow(element) {
    anime({
        targets: element,
        scale: 1.2,
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

// -- FORM ANIMATION
function pageOpen() {
    let form = document.getElementsByClassName('form-def');
    let container = document.getElementsByClassName('form-container');

    // INFO: the original value is in login_register.css

    anime({
        targets: form,
        scale: 0.2,
        opacity: 0,
        duration: 0,
    })

    anime({
        targets: form,
        scale: 1,
        opacity: 1,
        duration: 1400,
        easing: 'easeOutQuad'
    })

    anime({
        targets: container,
        width: '30%',
        height: '100%',
        duration: 1000,
        easing: 'easeOutQuad'
    })
}

function pageClose() {
    let form = document.getElementsByClassName('form-def');
    let container = document.getElementsByClassName('form-container');

    anime({
        targets: form,
        scale: 0.2,
        opacity: 0,
        duration: 800,
        easing: 'easeInQuad'
    })

    anime({
        targets: container,
        width: '100%',
        height: '100%',
        duration: 800,
        easing: 'easeOutQuad'
    })
}