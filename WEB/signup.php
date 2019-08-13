    <?php

         include("configuration.php");
          session_start();

          if(isset($_POST['signup'])){

                 $name = mysql_escape_string($_POST['name']); // Turn our post into a local variable
                 $email = mysql_escape_string($_POST['email']); // Turn our post into a local variable
                 $password = mysql_escape_string($_POST['password']);

                  $hash = md5( rand(0,1000) );

                 $q=$con->query("INSERT INTO users (name, password, email, hash) VALUES( '$name','$password','$email','$hash')");

           
                  $to      = $email; // Send email to our user
                  $subject = 'Signup - Sucess'; // Give the email a subject 
                  $message = '
 
:)
Thanks for joining in our website!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the URL below.
 
------------------------
Username: '.$name.'
Password: '.$password.'
------------------------
 
Please click this link to activate your account:
http://panl.ursse.org/verify.php?email='.$email.'&hash='.$hash.'
 
'; // Our message above including the link
                     
$headers = "From:noreply@panl.ursse.org "; // Set from headers

mail($to, $subject, $message, $headers); // Send our email
header('location:login.php');
 }
        
       else
       {
       $msg ="Please enter all the information.";
        }


?>





    <!--Checking the register information is valid -->

  


<!DOCTYPE html>

<html>
<head>
    <title>SIGN UP THE BI-WORLD</title>
 
    <h1 class="h" >Welcome to BI-World</h1>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
 
 

<?php 
    if(isset($msg)){  // Check if $msg is not empty
        echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
    } 
?>
    <div >

    <h2>Register</h2>
    <hr>
<form method="POST" action="signup.php">
    <label><b>Name</b></label>
    <div>
            <input type="text" name="name"  required >
    </div>

  
    <label><b>Email</b></label></br>
     <div>
            <input type="email" name="email"  required ></br>
    </div>

    <label><b>Password</b></label></br>
     <div>
            <input type="password" name="password"  required ></br>
    </div>


    <div>
            <input type="submit" name="signup" value="Sign Up"/>
    </div>
    </form>

    </div>


    <div >
    <h2> Already a member ? <a href="login.php">Login</a></h2>
    </div>   



    <footer class="f">
		<p id="copyright"> &copy; LP - All rights reserved!</p> 
	</footer>



</body>
</html>
