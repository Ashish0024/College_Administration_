<?php
include_once 'config.php';
$sql = "DELETE FROM user WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($link, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($link);
}
mysqli_close($link);
?>