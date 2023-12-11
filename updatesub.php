<?php
include_once 'config.php';
$result = mysqli_query($link,"SELECT * FROM user");
?>
<!DOCTYPE html>
<html>
 <head>
   <title> Retrive data</title>
   <link rel="stylesheet" href="style.css">
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
	  <tr>
	  <td>sr no.    </td>
    <td>username</td>
   
    <td>subject1</td>
    <td>subject2</td>
    <td>subject3</td>
    <td>subject4</td>
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
      <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["username"]; ?></td>
  
    <td><?php echo $row["subject1"]; ?></td>
    <td><?php echo $row["subject2"]; ?></td>
    <td><?php echo $row["subject3"]; ?></td>
    <td><?php echo $row["subject4"]; ?></td>
		<td><a href="updatesubprocess.php?id=<?php echo $row["id"]; ?>">Update</a></td>
      </tr>
			<?php
			$i++;
			}
			?>
</table>
 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
</html>