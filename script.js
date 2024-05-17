document.addEventListener("DOMContentLoaded", function() {
    var aboutModal = document.getElementById("about-modal");
    var signinModal = document.getElementById("signin-modal");
    var signupModal = document.getElementById("signup-modal");

    var signInButton = document.getElementById("sign-in");
    var spanAbout = document.getElementById("close-about");
    var spanSignIn = document.getElementById("close-signin");
    var spanSignUp = document.getElementById("close-signup");

    var aboutBtn = document.getElementById("about");
    var openSignupLink = document.getElementById("open-signup");
    var openSigninLink = document.getElementById("open-signin");

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
        if (event.target == signinModal) {
            signinModal.style.display = "none";
        }
        if (event.target == signupModal) {
            signupModal.style.display = "none";
        }
    }

    signInButton.onclick = function() {
        signinModal.style.display = "block";
    }

    spanSignIn.onclick = function() {
        signinModal.style.display = "none";
    }

    spanSignUp.onclick = function() {
        signupModal.style.display = "none";
    }

    openSignupLink.onclick = function(event) {
        event.preventDefault();
        signinModal.style.display = "none";
        signupModal.style.display = "block";
    }

    openSigninLink.onclick = function(event) {
        event.preventDefault();
        signupModal.style.display = "none";
        signinModal.style.display = "block";
    }
});


document.addEventListener('click', function(event) {
    if (event.target.classList.contains('favoriteButton')) {
        event.target.style.backgroundColor = 'red';
        
        setTimeout(() => {
            event.target.style.backgroundColor = 'white'; 
        }, 1000);
    }
});
