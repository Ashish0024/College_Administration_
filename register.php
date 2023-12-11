<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $email_err=$phoneno_err=$Date_of_Birth_err=$address_err=$subject1_err=$subject2_err=$subject3_err=$subject4_err="";
$email="";
$phoneno="";
$Date_of_Birth="";
$address="";
$subject1="";
$subject2="";
$subject3="";
$subject4="";
$image="";


$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted


if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 10){
                    $username_err = "This username is already taken.";
                }
                 else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    


    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }   
    
    $email = trim($_POST["email"]);
    $phoneno = trim($_POST["phoneno"]);
    $Date_of_Birth = trim($_POST["Date_of_Birth"]);
    $address = trim($_POST["address"]);
    $subject1 = trim($_POST["subject1"]);
    $subject2 = trim($_POST["subject2"]);
    $subject3 = trim($_POST["subject3"]);
    $subject4 = trim($_POST["subject4"]);
       
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user (username, password,email,phoneno,Date_of_Birth,address,subject1,subject2,subject3,subject4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss", $param_username, $param_password,$param_email,$param_phoneno,$Date_of_Birth,$address,$subject1,$subject2,$param_subject3,$param_subject4);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email=$email;
            $param_phoneno=$phoneno;
            $Date_of_Birth=$Date_of_Birth;
            $address=$address;
            $subject1=$subject1;
            $subject2=$subject2;
            $param_subject3=$subject3;
            $param_subject4=$subject4;

            // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
               header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
            
        }

        .wrapper {
            width: 360px;
            padding: 20px;
            margin: auto; /* Center the form */
            margin-top: 10px; /* Add some top margin for better appearance */
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" name="email" id="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>"required>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>phoneno</label>
                <input type="number" name="phoneno" pattern="[789][0-9]{9}" id="phoneno" class="form-control <?php echo (!empty($phoneno_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phoneno; ?>"required >
                <span class="invalid-feedback"><?php echo $phoneno_err; ?></span>
            </div>
            <div class="form-group">
                <label>Date_of_Birth</label>
                <input type="date" name="Date_of_Birth" id="Date_of_Birth" class="form-control <?php echo (!empty($Date_of_Birth_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Date_of_Birth; ?>"required>
                <span class="invalid-feedback"><?php echo $Date_of_Birth_err; ?></span>
            </div>
            <div class="form-group">
                <label>address</label>
                <textarea name="address" id="address" cols="6" rows="4" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" required><?php echo $address; ?></textarea>
                <span class="invalid-feedback"><?php echo $address_err; ?></span>
            </div>
            <label for="subject1" >Select subject 1:</label> 
                 <select name="subject1" id="subject1" class="form-control"> 
                 <option value=" "></option> 
                  <option value="Artificial_intelligence">Artificial_intelligence</option> 
                 <option value="Rural_development">Rural_development</option> 
                     <option value="Vision_for_Human_society">Vision_for_Human_society</option> 
                     <option value="cloud_computing">cloud_computing</option> 
                 </select>
                 <label for="subject2">Select subject 2:</label> 
                 <select name="subject2" id="subject2" class="form-control"> 
                 <option value=""></option> 
                  <option value="Artificial_intelligence">Artificial_intelligence</option> 
                 <option value="Rural_development">Rural_development</option> 
                     <option value="Vision_for_Human_society">Vision_for_Human_society</option> 
                     <option value="cloud_computing">cloud_computing</option> 
                 </select>
                 <label for="subject3">Select subject 3:</label> 
                 <select name="subject3" id="subject3" class="form-control"> 
                 <option value=""></option> 
                  <option value="Artificial_intelligence">Artificial_intelligence</option>  
                 <option value="Rural_development">Rural_development</option> 
                     <option value="Vision_for_Human_society">Vision_for_Human_society</option> 
                     <option value="cloud_computing">cloud_computing</option> 
                 </select>
                 <label for="subject4">Select subject 4:</label> 
                 <select name="subject4" id="subject4" class="form-control"> 
                 <option value=""></option> 
                  <option value="Artificial_intelligence">Artificial_intelligence</option> 
                 <option value="Rural_development">Rural_development</option> 
                     <option value="Vision_for_Human_society">Vision_for_Human_society</option> 
                     <option value="cloud_computing">cloud_computing</option> 
                 </select>
                 <!-- <input type="file" name="fileToUpload" id="fileToUpload"><br>
                 .png file only -->
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>