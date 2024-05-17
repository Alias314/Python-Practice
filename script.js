document.addEventListener("DOMContentLoaded", function() {
    var aboutModal = document.getElementById("about-modal");
    var favModal = document.getElementById("fav-modal");
    var signinModal = document.getElementById("signin-modal");
    var signupModal = document.getElementById("signup-modal");

    var signInButton = document.getElementById("login-logout");
    var spanAbout = document.getElementById("close-about");
    var spanFav = document.getElementById("close-fav");
    var spanSignIn = document.getElementById("close-signin");
    var spanSignUp = document.getElementById("close-signup");

    var aboutBtn = document.getElementById("about");
    var favBtn = document.getElementById("homepage-favorites");
    var openSignupLink = document.getElementById("open-signup");
    var openSigninLink = document.getElementById("open-signin");

    aboutBtn.onclick = function() {
        aboutModal.style.display = "block";
    }

    spanAbout.onclick = function() {
        aboutModal.style.display = "none";
    }
    
    favBtn.onclick = function() {
        favModal.style.display = "block";
    }

    spanFav.onclick = function() {
        favModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == aboutModal) {
            aboutModal.style.display = "none";
        }
        if (event.target == favModal) {
            favModal.style.display = "none";
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