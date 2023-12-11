<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="welcome.css"> 

</head>
<body>
    <div class="cont1">

    
    
    <div class="box1"> 

    <div class="ashish1"><img  class="s-img" src="uploads/<?php echo htmlspecialchars($_SESSION["image"]); ?>.png">
    <h4 class="my-5">Hello <?php echo htmlspecialchars($_SESSION["username"]); ?></h4>
</div>

    <div class="ashish2">

    <div class="gmailBox">
        <img class="rest" src="email.png">

        <h4 class="my-5">EMAIL_ID : <?php echo htmlspecialchars($_SESSION["email"]); ?></h4>
    </div>
    
    <div class="mobileBox">
        <img class="mobile" src="mobile.png">
    <h4 class="my-5">phoneno : <?php echo htmlspecialchars($_SESSION["phoneno"]); ?></h4>
    </div>
    
    <div class="dobBox">
        <img class="dob" src="dob.png">
    <h4 class="my-5">Date_of_Birth : <?php echo htmlspecialchars($_SESSION["Date_of_Birth"]); ?></h4>
    </div>
    
    <div class="addressbox">
        <img class="address" src="address.png">
    <h4 class="my-5">ADDRESS : <?php echo htmlspecialchars($_SESSION["address"]); ?></h4>
    </div>
    </div>
    </div>


    <div class="box2">
    <marquee class="headquote">Selected Subject</marquee> 

    <h4 class="my-5">Subject1 : <?php echo htmlspecialchars($_SESSION["subject1"]); ?>
    <h4 class="my-5">Subject2 : <?php echo htmlspecialchars($_SESSION["subject2"]); ?>
    <h4 class="my-5">Subject3 : <?php echo htmlspecialchars($_SESSION["subject3"]); ?>
    <h4 class="my-5">Subject4 : <?php echo htmlspecialchars($_SESSION["subject4"]); ?>

    <!-- <a href="reset-password.php">Reset Your Password</a>
<a href="logout.php" class="botton" >SIGN OUT</a> -->

    </div>
    
</div>
<a href="logout.php"><button class="button-29" role="button">LOG OUT</button>
<a href="reset-password.php"> <button  class="button-29" role="button">PASSWORD RESET </button>

</body>
</html>


<!-- HTML !-->


