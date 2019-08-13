
<?php  
  include("configuration.php");
         session_start();
    
     

        if(isset($_POST['update_btn'])){

              $id=$_POST['update_id'];
             $name=$_POST['update_name'];
             $password=$_POST['update_pwd'];
             $email=$_POST['update_email'];
             $sub=$_POST['sub'];

             $select = $con->query(" UPDATE users SET  name='$name', password='$password', email='$email', sub='$sub' where id='$id'");
         

           if($select){
                     echo"Successful Update!";
            }
            else 
                     echo"Fail!";

      }


 ?>

 

 <html>
<head>
    <title>User</title>
    <h1 class="h">User Portfolio</h1>
    <link rel="stylesheet" type="text/css" href="style.css">    
    
</head> 
<body>



<?php


if(isset($_POST['edit_btn'])){
     
        $id = $_POST['edit_id'];

   
        $result = $con -> query(" SELECT * FROM users WHERE id='$id' ");


        if($result -> num_rows > 0){
						
						
    	while($row = $result->fetch_assoc()) {

?>

         <form action="edit.php" method="POST">
                <div >
                    
                    <input type="hidden" name="update_id"  value="<?php echo $row['id']; ?>">
                 </div>
               
             <div>
                 <label>Username</label>
                 <input type="text" name="update_name" value="<?php echo $row['name']; ?>">
            </div>

            <div >
                <label>Password</label>
                <input type="text" name="update_pwd"  value="<?php echo $row['password']; ?>">
            </div>

            <div >
                <label>Email</label>
                <input type="text" name="update_email"  value="<?php echo $row['email']; ?>">
            </div> 

            <div >
                <label><strong>Subscription:</strong></label>
                 <input type="radio" name="sub" value="Database"
           <?php 
            if($row['sub']=='Database'){
                 echo "checked";
           }
           ?>
           >Database

          <input type="radio" name="sub" value="Network"
           <?php 
           if($row['sub']=='Network'){
            echo "checked";
           }

            ?>
          > Network

          <input type="radio" name="sub" value="Programming"
          <?php  if($row['sub']=='Programming')
                    { echo "checked"; }
            ?>  
            > Programming

</div>

         <button type="submit"  name="cancel_btn" class="btn btn-danger">Cancel</a>

        <button type="submit" class="btn btn-primary" name="update_btn">Update</button>

</form>


<?php
        }
    }
}
?>


<h3><a href="administor.php"> Back to Administor</a></h3>



 <footer class="f">
		<p id="copyright"> &copy; LP - All rights reserved!</p> 
</footer>


</body>

 </html>