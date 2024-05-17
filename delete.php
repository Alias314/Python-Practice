<?php
// Include database connection
include('db.php');

// Check if pet ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Construct SQL query to delete the pet
    $sql = "DELETE FROM user_favorites WHERE pet_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect back to the main page after deletion
        header("Location: index.php");
        exit();
    } else {
        // Handle deletion failure
        echo "Failed to delete the pet.";
    }
} else {
    // Handle missing pet ID
    echo "Pet ID not provided.";
}
?>