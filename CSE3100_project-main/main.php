<?php


require 'connect_DB.php';


?>


<html>
<head>

<title> login and registration </title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="sstyle.css">
</head>
<body>
	<div class="box" >
        
		<div class="login-box">
	
			<h2> Login here </h2>
			<form method='post'>
				<div >
                    <select name="type" class="form-control">
                        <option value="Teacher" >Teacher</option>
                        <option value="Student" >Student</option>
                    </select>
        
                </div>
            
                <div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" required>
				</div>

				<div class="form-group">
					<label>password</label>
					<input type="password" name="password" class="form-control" required>
				</div>

				<button type="submit" class="btn btn-primary  btn-block" name="loginSubmit" > Login</button>

			</form> 
		</div>
        <div class="newAC-box">
        <form  method='post'>
        <button type="submit" class="btn btn-success  btn-block" name="newAcSubmit" >Create a new account </button>
    </form>

       
        </div>
            



    <?php 




if(isset($_POST["loginSubmit"]))
{


    $datatableLogin ="login";




    $email = $_POST['email'];
    $pass = $_POST['password'];
    $type = $_POST['type'];
    
    $s = "select * from $datatableLogin where email='$email' && password = '$pass' && type='$type' ";
    $result = mysqli_query($con,$s);
    $num = mysqli_num_rows($result);

    session_start();
    
    $_SESSION['email']=$email;
    $_SESSION['pass']=$pass;
    $_SESSION['type']=$type;




    if($num==1)
    {
        $var = mysqli_fetch_assoc($result);


        $_SESSION['id']= $var["id"];
        $_SESSION['name']= $var["name"];
        $_SESSION['dept']= $var["dept"];
        $_SESSION['phone']= $var["phone"];




        if($type=="Teacher"){

            header('location:teacher.php');

        }
        if($type=="Student")
        {
            header('location:student.php');

        }

    }
    else
    {
        ?>
        <div class="d-flex justify-content-center  ">
            <h3> <p class="p-3 mb-2 bg-danger text-white">login failed</p> </h3>
        </div>
        <?php
    }



}

if(isset($_POST["newAcSubmit"]))
{
    header('location:newac.php');

}
    
    


  
?>




</div>
</body>



</html>