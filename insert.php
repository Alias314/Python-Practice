<?php
    session_start();
    include('db.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve logged-in user's ID from session
        if(isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $petId = $_POST['petId'];

            // Query to insert pet information into favorites table
            $sql = "INSERT INTO favorites (user_id, pet_id, pet_name, pet_breed, pet_gender, pet_size, pet_age)
                    SELECT $userId, pet_id, pet_name, pet_breed, pet_gender, pet_size, pet_age
                    FROM pets
                    WHERE pet_id = $petId";

            if(mysqli_query($conn, $sql)) {
                echo "success";
            } else {
                echo "error";
            }
        } else {
            echo "not_logged_in";
        }
    }
?>
