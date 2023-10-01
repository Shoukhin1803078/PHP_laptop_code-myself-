<!DOCTYPE html>
<html>

<head>
    <title>Table with database</title>
    <style type="text/css">  
           *{  
                padding: 0;  
                margin: 0;  
                box-sizing: border-box;  
           }  
           body{  
                width: 100%;  
                min-height: 100vh;  
                background-color: #5d6d7d;  
           }  
           .container{  
                max-width: 900px;  
                margin: 100px auto;  
                width: 100%;  
           }  
           table{  
                border-collapse: collapse;  
                width: 100%;  
           }  
           table th{  
                background-color: red;  
                color: #fff;  
                padding: 10px;  
           }  
           table td{  
                padding: 12px;  
                color: #fff;  
                font-size: 1em;  
                text-align: center;  
           }  
           table tr:nth-child(odd){  
                background-color: #797676;  
           }  
      </style>  





</head>

<body>
   
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

        <div class="container">  
      <table border="1">  
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
                if ($num>0) {  
                     while($data=mysqli_fetch_assoc($connect)){  
                          echo "  
                               <tr>  
                               <td>".$data['id']."</td>  
                               <td>".$data['name']."</td>  
                               <td>".$data['email']."</td>  
                               <td>".$data['mobile']."</td>  
                               </tr>  
                          ";  
                     }  
                }  
           ?>  
      </table>  
 </div>  



        <?php
        $conn = mysqli_connect("localhost", "root", "", "stop ragging");


        $sql = "SELECT vname, vroll, vseries,vdept,vemail,university,rag_date,rag_time,rag_place,sname,sroll,sseries,sdept,smobile,sfb,description FROM information";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row

            while ($row = $result->fetch_assoc()) {
                <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['fname'];?></td>
                <td><?php echo $row['lname'];?></td>
                <td><?php echo $row['age'];?></td>
            </tr>
                echo "<tr><td>" .        $row["vname"] . "</td><td>" . $row["vroll"] . "</td><td>"
                    . $row["vseries"] . "</td><td>" . $row["vdept"] . "</td><td>" . $row["vemail"] . "</td><td>" . $row["university"] . "</td><td>" . $row["rag_date"] . "</td><td>" . $row["rag_time"] . "</td><td>" . $row["rag_place"] . "</td><td>" . $row["sname"] . "</td><td>" . $row["sroll"] . "</td><td>" . $row["sseries"] . "</td><td>" . $row["sdept"] . "</td><td>" . $row["smobile"] . "</td><td>" . $row["sfb"] . "</td><td>" . $row["description"] . "</td></tr>";
            }
         




</body>

</html>