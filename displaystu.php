<?php
include_once 'config.php';
$result = mysqli_query($link, "SELECT * FROM user");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>

    <script>
        function redirectToStudentInfo(id, username) {
            // Redirect to a PHP page that displays student information
            window.location.href = 'DisplayStudentInfo.php?id=' + id + '&username=' + username;
        }
        
      

    </script>
    <style>
        .pointer {cursor: pointer;}
        .pointer:hover {
            text-decoration: underline;
            color:darkcyan;}
    </style>
</head>

<body>
    <?php
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table>
            <tr>
                <td>sr no.</td>
                <td class="pointer">username</td>
                
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr >
                    <td><?php echo $row["id"]; ?></td>
                    <td class="pointer" onclick="redirectToStudentInfo('<?php echo $row["id"]; ?>', '<?php echo $row["username"]; ?>', '<?php echo $row["email"]; ?>', '<?php echo $row["Date_of_Birth"]; ?>', '<?php echo $row["subject1"]; ?>', '<?php echo $row["subject2"]; ?>', '<?php echo $row["subject3"]; ?>', '<?php echo $row["subject4"]; ?>', '<?php echo $row["address"]; ?>', '<?php echo $row["phoneno"]; ?>')">
                        <?php echo $row["username"]; ?>    
                        <!-- <input type="button" name="Release" onclick="redirectToStudentInfo('<?php echo $row["id"]; ?>', '<?php echo $row["username"]; ?>')" value="Click to View Info"> -->

                    </td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </table>
    <?php
    } else {
        echo "No result found";
    }
    ?>
</body>
</html>
