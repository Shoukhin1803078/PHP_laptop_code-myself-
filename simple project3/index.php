<?php
// include("insert.php");
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


    <form action="insert.php" method="POST">
        Name: <input type="text" name="name"><br>
        Email: <input type="email" name="email"><br>
        Mobile: <input type="mobile" name="mobile"><br>
        Date : <input type="date" name="date"><br><br>
        <input type="submit" name="submit" value="submit"><br><br><br>
        <a href="display.php">display</a>
        <!-- <input type="submit" name="display" value="display"> -->
    </form>














    <!-- eikhaneo kora jay -->






    <?php
    // $dbhost='localhost';
    // $dbusername='root';
    // $dbpass='';
    // $dbname='test3';

    // $mysqli= mysqli_connect($dbhost,$dbusername,$dbpass,$dbname);

    // if (isset($_POST['submit'])) {
    //     $name = $_POST['name'];
    //     $email = $_POST['email'];
    //     $mobo = $_POST['mobile'];
    //     $date = $_POST['date'];

    //     $result = mysqli_query($mysqli, "INSERT INTO student_info VALUES ('','$name','$email','$mobo','$date')");


    //     if ($result) {
    //         echo "successfully receive  ";
    //     } else {
    //         echo "data submit hoy ni ";
    //     }
    // }
    ?>



    <?php
    // $conn = mysqli_connect("localhost", "root", "", "test3");
    // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // $sql = "SELECT id, name, email FROM student_info";
    // $result = $conn->query($sql);
    // if ($result->num_rows > 0) {
    //     // output data of each row
    //     while ($row = $result->fetch_assoc()) {
    //         echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>"
    //             . $row["email"] . "</td></tr>";
    //     }
    //     echo "</table>";
    // } else {
    //     echo "0 results";
    // }
    // $conn->close();
    ?>

    <?php


    //     //$result = mysqli_query($mysqli, "INSERT INTO student_info VALUES ('','$name','$email','$mobo','$date')");
    //     $result1 = mysqli_query($mysqli, "SELECT * FROM student_info ORDER BY id DESC");

    //     while($res=mysqli_fetch_array($result1))
    //   {
    //       echo '<tr>';
    //       echo '<td>'.$res['name'].'</td>';
    //       echo '<td>'.$res['email'].'</td>';
    //       echo '<td>'.$res['mobile'].'</td>';
    //       echo '<td>'.$res['date'].'</td>';
    //       echo '</tr>'
    //       //." ".$res['email']." ".$res['mobile']." ".$res['date'];

    //   }

    ?>


</body>

</html>