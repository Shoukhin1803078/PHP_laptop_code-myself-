 <?php 

$host="localhost";
$user="root";
$password="";
$db="test";


$conn = mysqli_connect("localhost", "root", "", "test"); 
// mysql_connect($host,$user,$password);
// mysql_select_db($db);

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
	
    $sql="select * from login where User='".$uname."'AND Pass='".$password."' limit 1";
    
    $result=mysql_query($sql);
    
    if(mysql_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
        
}
?> 

<?php
// $conn = mysqli_connect("localhost", "root", "", "test"); 
// if ($conn) {
//     echo "connection successfull";
// } 
// else {
//     echo "Error";
// }

// $query = "select * from login";
// $connect = mysqli_query($conn, $query);
// $num = mysqli_num_rows($connect); 

// if ($num > 0) {
// 	while ($data = mysqli_fetch_assoc($connect)) {
// 		echo "  
// 				   <tr>  
// 				   <td>" . $data['User'] . "</td>  
// 				   <td>" . $data['Pass'] . "</td>
// 				   </tr>  
// 			  ";
// 	}
// }

?>


<!DOCTYPE html>
<html>
<head>
	<title> Login Form in HTML5 and CSS3</title>
	<link rel="stylesheet" a href="css\style.css">
	<link rel="stylesheet" a href="css\font-awesome.min.css">
</head>

<style>
    body{
	margin: 0 auto;
	/* background-image: url("../image/technology.jpg"); */
	background-repeat: no-repeat;
	background-size: 100% 720px;
}

.container{
	width: 500px;
	height: 300px;
	text-align: center;
	margin: 0 auto;
	background-color: rgba(44, 62, 80,0.7);
	margin-top: 160px;
}

.container img{
	width: 150px;
	height: 150px;
	margin-top: -60px;
}

input[type="text"],input[type="password"]{
	margin-top: 30px;
	height: 45px;
	width: 300px;
	font-size: 18px;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 40px;
}

.form-input::before{
	content: "\f007";
	font-family: "FontAwesome";
	padding-left: 07px;
	padding-top: 40px;
	position: absolute;
	font-size: 35px;
	color: #2980b9; 
}

.form-input:nth-child(2)::before{
	content: "\f023";
}

.btn-login{
	padding: 15px 25px;
	border: none;
	background-color: #5636e4;
	color: #fff;
}
</style>

<body>
	<div class="container">
	<!-- <img src="image/login.png"/> -->
		<form>
			<div class="form-input">
				<input type="text" name="text" placeholder="Enter the User Name"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="password"/>
			</div>
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div>
</body>
</html>


