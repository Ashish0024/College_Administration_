<?php
include_once 'config.php';
if(count($_POST)>0) {
mysqli_query($link,"UPDATE user set  username='" . $_POST['username'] . "', address='" . $_POST['address'] . "', email='" . $_POST['email'] . "' ,phoneno='" . $_POST['phoneno'] . "' WHERE username='" . $_POST['username'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($link,"SELECT * FROM user WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update User Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="update.php">STUDENT LIST</a>
</div>

Username: <br>
<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
<input type="text" name="username" class="txtField"  value="<?php echo $row['username']; ?>">
<br>
address <br>
<input type="text" name="address" class="txtField" value="<?php echo $row['address']; ?>">
<br>
email<br>
<input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>">
<br>
phoneno<br>
<input type="text" name="phoneno" class="txtField" value="<?php echo $row['phoneno']; ?>">
<br>
Date_of_Birth<br>
<input type="text" name="Date_of_Birth" class="txtField" value="<?php echo $row['Date_of_Birth']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</body>
</html>