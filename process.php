<?php

include('db.php');

function display($conn){
    $sql = "SELECT * FROM user_favorites";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";  
            echo "<td>".$row['pet_name']."</td>";  
            echo "<td>".$row['pet_breed']."</td>";  
            echo "<td>".$row['pet_gender']."</td>";  
            echo "<td>".$row['pet_size']."</td>";  
            echo "<td>".$row['pet_age']."</td>";  
            echo "<td>".'<a href="view.php?id='.$row['pet_id'].'">View</a>'." | ".'<a href="delete.php?id='.$row['pet_id'].'">Delete</a>'."</td>";  
            echo "</tr>";  
        }       
    } else{
        // echo "The database is empty!";
    }
}