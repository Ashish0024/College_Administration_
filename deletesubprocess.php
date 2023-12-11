<?php
include_once 'config.php';

// Assuming your table structure has columns 'id' and 'subject'
$id = mysqli_real_escape_string($link, $_GET["id"]); // Sanitize input to prevent SQL injection

$sql = "UPDATE user SET subject1  = '',subject2  = '',subject3  = '',subject4  = '' WHERE id = '$id'";
if (mysqli_query($link, $sql)) {
    echo "Subject column updated successfully";
} else {
    echo "Error updating subject column: " . mysqli_error($link);
}

mysqli_close($link);
?>
<a href="deletesub.php">GO back</a>
