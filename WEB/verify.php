

<!DOCTYPE >
 
<html>
<head>
    <title>BI-World Sign up</title>

    
</head>
<body>
    <!-- start header div --> 
    <div id="header">
        <h2>BI-World  Sign up</h2>
    </div>
    <!-- end header div -->   
     
    <!-- start wrap div -->   
    <div id="wrap">
        <!-- start PHP code -->
        <?php

        mysql_connect("localhost", "root", "derek2016") or die(mysql_error()); // Connect to database server(localhost) with username and password.
        mysql_select_db("mydatabase") or die(mysql_error()); // Select registrations database.
         
           if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
   
                 $email = mysql_escape_string($_GET['email']); // Set email variable
                 $hash = mysql_escape_string($_GET['hash']); // Set hash variable
                 
                 $search = mysql_query("SELECT email, hash, verified FROM users WHERE email='".$email."' AND hash='".$hash."' AND verified='0'") or die(mysql_error()); 
                 $match  = mysql_num_rows($search);
                 
           if($match > 0){
       
           mysql_query("UPDATE users SET verified='1' WHERE email='".$email."' AND hash='".$hash."' AND verified='0'") or die(mysql_error());
            echo 'Your account has been activated, you can now login';

       
      }else{
        // No match -> invalid url or account has already been activated.
        echo 'The url is either invalid or you already have activated your account.';
    }
                 
}else{
    // Invalid approach
    echo 'Invalid approach, please use the link that has been send to your email.</div>';
}
             
        ?>
        <!-- stop PHP Code -->
 
         
   
    <h3><a href="login.php">Login</a></h3>

    
    <footer style="position:fixed; left:0; bottom:0; width:100%; background-color:lightblue; text-align:center;">
		<p id="copyright"> &copy; LP - All rights reserved!</p> 
	</footer>


</body>
</html>