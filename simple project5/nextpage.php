<?php
$conn = mysqli_connect("localhost", "root", "", "stop ragging"); 
if ($conn) {
 
} else {
    echo "Error";
}

$query = "select * from information";
$connect = mysqli_query($conn, $query);
$num = mysqli_num_rows($connect); 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form action="display.php" method="post">
		<table align="center">
			<tr>
			  <td>
				<input type="text" name="user_name" placeholder="User Name"/>
			  </td>
			</tr>
			
		    <tr>
			  <td>
				<input type="submit" name="submit" value="submit"/>
			  </td>
			</tr>
		</table>

		</form>

</body>

</html>