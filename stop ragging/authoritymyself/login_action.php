<?php
  $conn = mysqli_connect("localhost", "root", "", "tutorial");
  if(!$conn){
	  echo ("Error Connection:".mysqli_connect_error());
  }
  if(isset($_POST['submit'])){
	  $user_name = $_POST['user_name'];
	  $password = $_POST['password'];
	  
   $sql = "select * from user_registration where user_name= '$user_name' and password = '$password'";
   $result = mysqli_query($conn,$sql);
   $count = mysqli_num_rows($result);
   
   if($count ==1){
	   echo "<h1>go here</h1> ";
     header("location:nextpage.php");
   }
   else{
	   echo "login failed";
   }
   
  }

?>