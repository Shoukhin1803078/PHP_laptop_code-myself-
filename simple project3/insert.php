<?php
    $dbhost='localhost';
    $dbusername='root';
    $dbpass='';
    $dbname='test3';
    
    $mysqli= mysqli_connect($dbhost,$dbusername,$dbpass,$dbname);

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobo = $_POST['mobile'];
        $date = $_POST['date'];

        $result = mysqli_query($mysqli, "INSERT INTO student_info VALUES ('','$name','$email','$mobo','$date')");
       

        if ($result) {
            echo "successfully receive  ";
        } else {
            echo "data submit hoy ni ";
        }
    }
?>


