<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #ffe6e6; /* Soft pink background */
    font-size: large;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column; /* Align content vertically */
    height: 100vh;
}

.card {
    background-color: #fff;
    padding: 70px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center;
}

img {
    width: 200px;
    height: 200px;
    border: 2px solid #ff4d4d;
    border-radius: 8px;
    margin-bottom: 25px;
    object-fit: cover;
}

h2 {
    margin-top: 0;
    color: #ff4d4d; /* Reddish title */
    margin-bottom: 25px;
}

p {
    margin-bottom: 20px;
    color: #333; /* Dark text */
}

.button {
    margin-top: 20px;
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff4d4d; /* Reddish button */
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.button:hover {
    background-color: #cc0000; /* Darker shade of reddish button on hover */
}
</style>
<body>
    <div class="container">
        <div class="card">
            <?php
            // Include database connection
            include('db.php');

            // Check if pet ID is provided in the URL
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Fetch the specific pet's data
                $sql = "SELECT * FROM user_favorites WHERE pet_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $id);
                $stmt->execute();
                $result = $stmt->get_result();

                // Check if pet with provided ID exists
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    // Display the pet details
                    echo '<img src="';
                    switch ($id) {
                        case 1:
                            echo 'images/dog-adopt-me2.jpg';
                            break;
                        case 2:
                            echo 'https://res.cloudinary.com/petrescue/image/upload/b_auto:predominant,f_auto,c_pad,h_638,w_638/v1650977162/jknpvhn9xyanrei2llfx.jpg';
                            break;
                        case 3:
                            echo 'https://img.buzzfeed.com/buzzfeed-static/static/2018-04/5/15/asset/buzzfeed-prod-web-02/sub-buzz-6810-1522956555-5.png?output-quality=auto&output-format=auto&downsize=640:*';
                            break;
                        default:
                            echo ''; // If ID is not 1, 2, or 3, no image will be displayed
                            break;
                    }
                    echo '" alt="Pet Image">';
                    
                    echo "<h2>Pet Details</h2>";
                    echo "<p><strong>Name:</strong> ". $row['pet_name']. "</p>";
                    echo "<p><strong>Breed:</strong> ". $row['pet_breed']. "</p>";
                    echo "<p><strong>Gender:</strong> ". $row['pet_gender']. "</p>";
                    echo "<p><strong>Size:</strong> ". $row['pet_size']. "</p>";
                    echo "<p><strong>Age:</strong> ". $row['pet_age']. "</p>";
                } else {
                    echo "<p>Pet not found.</p>";
                }
            } else {
                echo "<p>Pet ID not provided.</p>";
            }
            ?>
            <a href="index.php" class="button">Back to Main Page</a>
        </div>
    </div>
</body>
</html>
