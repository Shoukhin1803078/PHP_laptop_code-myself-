<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>


<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>





</head>
<body>
<table>
<tr>
<th>Id</th>
<th>name</th>
<th>email</th>
</tr>





<?php
    $conn = mysqli_connect("localhost", "root", "", "test3");
    

    $sql = "SELECT id, name, email FROM student_info";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>"
                . $row["email"] . "</td></tr>";
        }
        echo "</table>";
    } 
    
    else {
        echo "no results found ";
    }





    $conn->close();
    ?>






</table>
</body>
</html>