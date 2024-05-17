<?php 
include('db.php');

if (isset($_POST['pet_id']) && isset($_POST['pet_name']) && isset($_POST['pet_breed']) && isset($_POST['pet_gender']) && isset($_POST['pet_size']) && isset($_POST['pet_age'])) {
    $pet_id = $_POST['pet_id'];
    $pet_name = $_POST['pet_name'];
    $pet_breed = $_POST['pet_breed'];
    $pet_gender = $_POST['pet_gender'];
    $pet_size = $_POST['pet_size'];
    $pet_age = $_POST['pet_age'];

    if (petExists($pet_id, $conn)) {
        removePet($pet_id, $conn);
        echo "Pet removed from favorites!";
    } else {
        insertPet($pet_id, $pet_name, $pet_breed, $pet_gender, $pet_size, $pet_age, $conn);
        echo "Pet added to favorites!";
    }
} else {
    // echo "Invalid data!";
}

function petExists($pet_id, $conn) {
    $sql = "SELECT * FROM user_favorites WHERE pet_id = '$pet_id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

function insertPet($pet_id, $pet_name, $pet_breed, $pet_gender, $pet_size, $pet_age, $conn){
    $sql = "INSERT INTO user_favorites (pet_id, pet_name, pet_breed, pet_gender, pet_size, pet_age) VALUES ('$pet_id', '$pet_name', '$pet_breed', '$pet_gender', '$pet_size', '$pet_age')";

    if (mysqli_query($conn, $sql)) {
        // Operation successful, no need to echo anything here
    } else {
        echo "Failed to add pet! " . mysqli_error($conn);
    }
}

function removePet($pet_id, $conn){
    $sql = "DELETE FROM user_favorites WHERE pet_id = '$pet_id'";

    if (mysqli_query($conn, $sql)) {
        // Operation successful, no need to echo anything here
    } else {
        echo "Failed to remove pet! " . mysqli_error($conn);
    }
}
?>
