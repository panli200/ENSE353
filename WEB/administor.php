<?php
        include("configuration.php");
         session_start();


        if(isset($_POST['delete_btn'])){
        
        $id = $_POST['delete_id'];
      
        $delete = $con->query("DELETE FROM users where id='$id'");

        }
        
      if(isset($_POST['add_btn'])){

 
                  $name = mysql_escape_string($_POST['new_name']); 
                  $password = mysql_escape_string($_POST['new_pwd']);
                  $email = mysql_escape_string($_POST['new_email']); 
                
            $add=  $con->query("INSERT INTO users(name, password, email) VALUES('$name', '$password', '$email')" );  

        }


       
?>

<html>
<head>
    <title>administrator</title>
    <h1 class="h">Administrator - Users Information</h1>
    <link rel="stylesheet" type="text/css" href="style.css">   
</head> 
<body>

<table class="table">
<tr>
            <th>ID</th>
            <th>NAME</th>
            <th>PASSWORD</th>
            <th>EMAIL</th>
            <th>VERIFIED</th>
            <th>SUBSCRIPTION</th>
            <th>EDIT</th>
            <th>DELETE</th>
  </tr>

<?php

 $result = $con -> query(" SELECT * from users ");

if ($result->num_rows >0 ) {
    
    
    while($row = $result->fetch_assoc()){
?>

       
    <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['verified']; ?></td>
            <td><?php echo $row['sub']; ?></td> 
            <td>
                 <form action="edit.php" method="POST">
                 <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                 <button type="submit" name="edit_btn">Edit</button>
                 </form>
             </td>
          <td>
                <form action="administor.php" method="POST">
                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="delete_btn" >Delete</button>
              </form>
         </td> 
 </tr>


<?php
        }
}
?>
      
    <tr>  
        <form action="administor.php" method="POST">
                <td></td>  
                <td >
                        <input name="new_name" contenteditable >
                       
                </td>  
                <td>
                        <input name="new_pwd" contenteditable>
                </td>  
                <td>
                        <input name="new_email" contenteditable>
                </td>  
                <td > </td> 
                <td ></td> 
                <td></td>
                <td>
                    
                        <button type="submit" id="add_btn" name="add_btn" > Add </button>
                    
                </td>  
        </form>
    </tr>  
  
  


</table>


<h3><a href="logout.php"> Logout</a></h3>

 <footer class="f">
		<p id="copyright"> &copy; LP - All rights reserved!</p> 
</footer>

</body>	
</html>
