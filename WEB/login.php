
<?php
        include("configuration.php");
        session_start();
       

             $name = mysql_escape_string($_POST['name']); 
            $password = mysql_escape_string(($_POST['password'])); 
                  

        if(isset($_POST['submit'])){

                     if($name == "adm" && $password=="1234"){
                     
                        $_SESSION['name'] = $name;
                       

                        header('location: administor.php');		
                       
                    }

                    else{

                     $select = $con->query(" SELECT * FROM users WHERE name='$name' AND password='$password' ");

                     $rows=$select->num_rows;

                      if($rows==1){
                        
                         $_SESSION['name'] = $name;
                          $_SESSION['password'] = $password;
                           header('location: index.php');
	
                        }else{
                    
                            echo"Wrong name and password!";
                        }
                    
          }

        }
  

      ?>


<html>
<head>
<title>BI-World login</title>
<link rel="stylesheet" type="text/css" href="style.css">
<h1 class="h" > Welcome to Login in your BI-World</h1>

</head>

<body>

<h2>Plese enter your name and password:</h2>

<form  action="login.php" method="post"> 


<label>Name</label>
    <div>
        <input type="text" name="name" required>
    </div>

 <label>Password</label>
    <div>
        <input type="password" name="password" required>
    </div>
          
 
<input type="submit" name="submit" value="Login"/>

</form>




    <p><a href = "signup.php">Back to  Signup</a></p>



    <footer class="f">
		<p id="copyright"> &copy; LP - All rights reserved!</p> 
	</footer>

</body>
</html>

