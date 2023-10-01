<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>


<style>
table {
border-collapse: collapse;
width: 50%;
color: #588c7e;
font-family: monospace;
font-size: 15px;
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
<th>vname</th>
<th>vroll</th>
<th>vseries</th>
<th>vdept</th>
<th>vemail</th>
<th>university</th>
<th>rag_date</th>
<th>rag_time</th>
<th>rag_place</th>
<th>sname</th>
<th>sroll</th>
<th>sseries</th>
<th>sdept</th>
<th>smobile</th>
<th>sfb</th>
<th>description</th>

</tr>


<?php
    $conn = mysqli_connect("localhost", "root", "", "stop ragging");
    

    $sql = "SELECT vname, vroll, vseries,vdept,vemail,university,rag_date,rag_time,rag_place,sname,sroll,sseries,sdept,smobile,sfb,description FROM information";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" .        $row["vname"] . "</td><td>" . $row["vroll"] . "</td><td>"
                . $row["vseries"]. "</td><td>" . $row["vdept"]. "</td><td>" . $row["vemail"]. "</td><td>" . $row["university"]. "</td><td>" . $row["rag_date"]. "</td><td>" . $row["rag_time"]. "</td><td>" . $row["rag_place"]. "</td><td>" . $row["sname"]. "</td><td>" . $row["sroll"]. "</td><td>" . $row["sseries"]. "</td><td>" . $row["sdept"]. "</td><td>" . $row["smobile"]. "</td><td>" . $row["sfb"]. "</td><td>" . $row["description"] . "</td></tr>";
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