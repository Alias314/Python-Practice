var aboutModal = document.getElementById("about-modal");
var aboutBtn = document.getElementById("about");
var spanAbout = document.getElementById("close-about");
var modal = document.getElementById("signin-modal");
var signInButton = document.getElementById("sign-in");
var spanSignIn = document.getElementById("close-signin");

aboutBtn.onclick = function() {
    aboutModal.style.display = "block";
}

spanAbout.onclick = function() {
    aboutModal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == aboutModal) {
        aboutModal.style.display = "none";
    }
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

signInButton.onclick = function() {
    modal.style.display = "block";
}

spanSignIn.onclick = function() {
    modal.style.display = "none";
}

document.addEventListener('click', function(event) {
    if (event.target.classList.contains('favoriteButton')) {
        event.target.style.backgroundColor = 'red';
        
        setTimeout(() => {
            event.target.style.backgroundColor = 'white'; 
        }, 1000);
    }
});
