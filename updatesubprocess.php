<?php
include_once 'config.php';
if(count($_POST)>0) {
mysqli_query($link,"UPDATE user set  username='" . $_POST['username'] . "', subject1='" . $_POST['subject1'] . "', subject2='" . $_POST['subject2'] . "' ,subject3='" . $_POST['subject3'] . "' ,subject4='" . $_POST['subject4'] . "' WHERE username='" . $_POST['username'] . "'");
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
<a href="updatesub.php">STUDENT LIST</a>
</div>

Username: <br>
<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
<input type="text" name="username" class="txtField"  value="<?php echo $row['username']; ?>">
<br>
subject1 <br>
        <select name="subject1" id="subject1" class="txtField" value="<?php echo $row['subject1']; ?>"> 
             <option value=""></option> 
              <option value="Artificial_intelligence">Artificial_intelligence</option> 
             <option value="Rural_development">Rural_development</option> 
             <option value="Vision_for_Human_society">Vision_for_Human_society</option> 
              <option value="cloud_computing">cloud_computing</option> 
                 </select>
            <br>
subject2<br>
<select name="subject2" id="subject2" class="txtField" value="<?php echo $row['subject2']; ?>"> 
             <option value=""></option> 
              <option value="Artificial_intelligence">Artificial_intelligence</option> 
             <option value="Rural_development">Rural_development</option> 
             <option value="Vision_for_Human_society">Vision_for_Human_society</option> 
              <option value="cloud_computing">cloud_computing</option> 
                 </select>
                 <br>
subject3<br>
<select name="subject3" id="subject3" class="txtField" value="<?php echo $row['subject3']; ?>"> 
             <option value=""></option> 
              <option value="Artificial_intelligence">Artificial_intelligence</option> 
             <option value="Rural_development">Rural_development</option> 
             <option value="Vision_for_Human_society">Vision_for_Human_society</option> 
              <option value="cloud_computing">cloud_computing</option> 
                 </select>
                 <br>
subject4<br>
<select name="subject4" id="subject4" class="txtField" value="<?php echo $row['subject4']; ?>"> 
             <option value=""></option> 
              <option value="Artificial_intelligence">Artificial_intelligence</option> 
             <option value="Rural_development">Rural_development</option> 
             <option value="Vision_for_Human_society">Vision_for_Human_society</option> 
              <option value="cloud_computing">cloud_computing</option> 
                 </select>
                 <br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</body>
</html>