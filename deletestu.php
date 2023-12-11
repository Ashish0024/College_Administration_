<?php
include_once 'config.php';
$result = mysqli_query($link,"SELECT * FROM user");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Delete employee data</title>
</head>
<body>
<table>
	<tr>
    <td>sr no.    </td>
    <td>username</td>
    <td>address</td>
    <td>email</td>
    <td>phoneno</td>
    <td>Date_of_Birth</td>
    <td>subject1</td>
    <td>subject2</td>
    <td>subject3</td>
    <td>subject4</td>
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["username"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["phoneno"]; ?></td>
    <td><?php echo $row["Date_of_Birth"]; ?></td>
    <td><?php echo $row["subject1"]; ?></td>
    <td><?php echo $row["subject2"]; ?></td>
    <td><?php echo $row["subject3"]; ?></td>
    <td><?php echo $row["subject4"]; ?></td>
	<td><a href="deleteprocess.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>
</body>
</html>