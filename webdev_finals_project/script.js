var aboutButton = document.getElementById("about");
var modal = document.getElementById("signin-modal");
var signInButton = document.getElementById("sign-in");
var span = document.getElementsByClassName("close")[0];

aboutButton.onclick = function() {
    alert("button works");
}

signInButton.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}