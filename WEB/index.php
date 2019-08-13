  <?php
        include("configuration.php");
         session_start();
    
    if(!isset($_SESSION['name'])){
     
        header("Location: login.php");
     }
     $name=$_SESSION['name'];
     $password=$_SESSION['password'];
     $sub=$_POST['sub'];
    
        if(isset($_SESSION['name']))
         {
         echo"Welcome ";// .$_SESSION['name']."<br/>";


        }else{

            echo"Please Login or Sign Up";
        }

        //if user click submit button

        if(isset($_POST['submit'])){

         $select = $con->query(" UPDATE users SET sub='$sub' where name='$name' AND password='$password' ");
         

           if($select){
                     echo"Successful Update!";
            }
            else 
                     echo"Fail!";

            }



    

  ?>
 <!--Checking the register information is valid -->

  

<!DOCTYPE html>

<html>
<head>
  <title>index.php</title>
 
   <h1 class="h" >Welcome to BI-World</h1>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>

  
   
 
<form method="POST" action="index.php">

 <div >

    <h2>Please select an area you are intrested in:</h2>
   
     <div >
        <label><input type="checkbox" name='sub' value="Database">Database</label>
    </div>

    <div >
        <label><input type="checkbox" name="sub" value="Network">Network</label>
    </div>
    
    <div >
        <label><input type="checkbox" name="sub" value="Programming" >Programming</label>
    </div> 
   
    <div>
         <input type="submit"  name="submit" value="Submit"/>
    </div>

 </div>

 <!--display the selection from user-->


 
 <div>
 <p>Your subscription is: <?php  

 $select = $con->query(" SELECT * from users  where name='$name' AND password='$password' ");
         
 $row=$select->fetch_assoc();


echo $row['sub'];?></p>
 </div>






 <div >
    <h2> Not a member yet ? <a href="signup.php">Sign Up</a></h2>
 </div>  

 <div >
    <h2> Already a member ? <a href="login.php">Login</a></h2>
 </div>   

 <div >
    <h2> Logout ? <a href="logout.php">Logout</a></h2>
 </div>  



    <footer class="f">
		<p id="copyright"> &copy; LP - All rights reserved!</p> 
	</footer>



</body>
</html>
