<?php
    include('db.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Query the database to check if the user exists
        $sql = "SELECT * FROM user_info WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            // Verify the password using password_verify() function
            if (password_verify($password, $row['password'])) {
                // User authenticated successfully
                echo "<br><div style='text-align:center; color:darkgreen;'>Logged in successfully!</div>";
            } else {
                // Password does not match
                echo "<br><div style='text-align:center; color:darkred;'>Incorrect password!</div>";
            }
        } else {
            // User not found
            echo "<br><div style='text-align:center; color:darkred;'>User not found!</div>";
        }
    }
?>

