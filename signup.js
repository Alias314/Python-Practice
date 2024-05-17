document.getElementById("signup-form").addEventListener("submit", function(event) {
    event.preventDefault();

    const email = document.getElementById("user-email").value;
    const password = document.getElementById("user-password").value.trim();
    const confirmPassword = document.getElementById("confirm-password").value.trim();
    const messageDiv = document.getElementById("message");

    if (password !== confirmPassword) {
        messageDiv.innerHTML = "<br><div style='text-align:center; color:darkred;'>Passwords do not match!</div>";
        return;
    }

    const formData = new FormData();
    formData.append("email", email);
    formData.append("password", password);
    formData.append("confirm-password", confirmPassword);

    fetch("signup.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        messageDiv.innerHTML = data;
        document.getElementById("signup-form").reset();
    })
    .catch(error => {
        console.error("Error:", error);
        messageDiv.innerHTML = "An error occurred. Please try again.";
    });
});