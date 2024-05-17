<?php
    include('db.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];
    
        // Check if passwords match
        if ($password !== $confirmPassword) {
            echo "<br><div style='text-align:center; color:darkred;'>Passwords do not match!</div>";
            exit();
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
        // Insert data into the database
        $sql = "INSERT INTO user_info (email, password) VALUES ('$email', '$hashedPassword')";
    
        if (mysqli_query($conn, $sql)) {
            // Sign up success
            echo "<br><div style='text-align:center; color:darkgreen;'>Sign up success!</div>";

            // Automatically log in the user after signing up
            $sql = "SELECT * FROM user_info WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                // Log in the user by setting session or cookie, or other authentication mechanism
                // For example, you can set a session variable to indicate the user is logged in
                session_start();
                $_SESSION['email'] = $email;
                // Redirect the user to the desired page after login
            } else {
                // Error occurred while logging in after signup
                echo "<div style='text-align:center; color:red;'>An error occurred while logging in. Please try again.</div>";
            }
        } else {
            // Failed to insert into database
            echo "<div style='text-align:center; color:red;'>Failed to sign up: " . mysqli_error($conn) . "</div>";
        }
    }
    
    mysqli_close($conn);
?>
