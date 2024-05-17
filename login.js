document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const loginMessageDiv = document.getElementById("login-message");

    // Send form data to PHP backend using AJAX
    fetch("login.php", {
        method: "POST",
        body: new FormData(this)
    })
    .then(response => response.text())
    .then(data => {
        loginMessageDiv.innerHTML = data; // Display message returned by PHP backend
    })
    .catch(error => {
        console.error("Error:", error);
        loginMessageDiv.innerHTML = "An error occurred. Please try again.";
    });
});

fetch("login.php", {
    method: "POST",
    body: formData
})
.then(response => response.text())
.then(data => {
    // Display the response message in the message area
    document.getElementById("login-message").innerHTML = data;
    document.getElementById("login-form").reset();
})
.catch(error => {
    console.error("Error:", error);
    document.getElementById("login-message").innerHTML = "An error occurred. Please try again later.";
});
