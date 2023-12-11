<?php
include_once 'config.php';

// Retrieve student information based on the provided ID
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "SELECT * FROM user WHERE id = '$id'";
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        
        // Display student information as needed
        echo "<h2>Student Information</h2>";
        echo "<p>ID: " . $row['id'] . "</p>";
        echo "<p>Username: " . $row['username'] . "</p>";
        echo "<p>email: " . $row['email'] . "</p>";
        echo "<p>phoneno: " . $row['phoneno'] . "</p>";
        echo "<p>Date_of_Birth: " . $row['Date_of_Birth'] . "</p>";
        echo "<p>address: " . $row['address'] . "</p>";
        echo "<p>subject1: " . $row['subject1'] . "</p>";
        echo "<p>subject2: " . $row['subject2'] . "</p>";
        echo "<p>subject3: " . $row['subject3'] . "</p>";
        echo "<p>subject4: " . $row['subject4'] . "</p>";



        // Add more details as needed
    } else {
        echo "Student not found";
    }
} else {
    echo "Invalid request. Please provide a student ID.";
}
?>
