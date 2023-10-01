
<?php

$rollStart= $_SESSION['rollStart'];
$rollEnd= $_SESSION['rollEnd '];
$course=$_SESSION['course'] ;
$datatableMarks='marks';
$datatableAttendance ="attendance";

$days = ['Saturday','Sunday','Monday','Tuesday' ,'Wednesday'];





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
}

    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result sheet</title>

    
</head>
<body>





 

              <h3 style="text-align: center;">Result Sheet</h3>
              <h5 style="text-align: center;">Course code : <?php echo $course ?></h5>
            <table width="100%" >
                <tr>
                    <td><h5>Roll</h5></td>
                    <td><h5>Percentage of <br>Attendance</h5></td>
                    <td><h5>Attendance<br> Marks</h5></td>
                    <td><h5>CT Marks</h5></td>
                    <td><h5>Final mark <br>[ Part-A ]</h5></td>
                    <td><h5>Final mark <br>[ Part-B ]</h5></td>
                    <td><h5>Total Marks</h5></td>
                    <td><h5>Grade</h5></td>
                    <td><h5>Grade<br> Point</h5></td>
                </tr>

        <?php
        for($i=$rollStart;$i<=$rollEnd;$i++)
        {
            echo "<tr>";
            echo "<td><h6>$i</h6></td>";

            $total=0;
            $prsnt=0;

            for($j=1;$j<=15;$j++)
            {
                foreach($days as $k)
                {                  
                    $s = "select * from $datatableAttendance where day='$k' && cycle='$j' && course='$course' && roll='$i'  ORDER BY id DESC";
                    $result = mysqli_query($con,$s);
                    $num = mysqli_num_rows($result);
                    $ans=0;

                    if($num==0)
                    {
                        continue;
                    }
                    $total++;
                    
                    $var = mysqli_fetch_assoc($result);
                    $ans=$var['attendance'];
                     
                    if($ans==1)
                    {
                        $prsnt++;
                    }
                    
                } 
    
            }
            if($total==0)
            {
                $percentage=0;
            }
            else
            {
                $percentage=round(($prsnt/$total)*100,2);
            }
            
            echo "<td>$percentage%</td>";

            $Amark=0;
            if($percentage>=90)
            {
                $Amark=8;
            }
            else if($percentage>=85)
            {
                $Amark=7;
            }
            else if($percentage>=80)
            {
                $Amark=6;
            }
            else if($percentage>=70)
            {
                $Amark=5;
            }
            else if($percentage>=60)
            {
                $Amark=4;
            }
            echo "<td> $Amark</td>";
            //_________________CT MARKS_______________

            $marksList=array(6);
            for($j=0;$j<=5;$j++)
            {
                $marksList[$j]=0;
            }
            
            for($j=1;$j<=5;$j++)
            {
                $ans=0;              
                    $s = "select * from $datatableMarks where ctNo='$j' && course='$course' && roll='$i' ORDER BY id DESC ";
                    $result = mysqli_query($con,$s);
                    $num = mysqli_num_rows($result);
                    

                    if($num==0)
                    {
                        continue;
                    }
    
                    else
                    {
                        $var = mysqli_fetch_assoc($result);
                        
                        $ans=$var['marks'];
                        if($ans=='A')
                        {
                            $ans=0;
                        }
                        
                    }
                     
                    $marksList[$j]=$ans;     
    
            }


            rsort($marksList);
            $ans=$marksList[0]+$marksList[1]+$marksList[2];

            $CTmarks=ceil($ans/3);
            echo "<td>$CTmarks</td>";

            //________________final marks____________________


            $finalmark=0;


            $s = "select * from $dtfinalmark  Where course='$course' && roll='$i' ORDER BY id DESC ";
            $result = mysqli_query($con,$s);
            $nummm = mysqli_num_rows($result);
                    

            $partAmark=0;
            $partBmark=0;
            if($nummm!=0)
            {
                $var = mysqli_fetch_assoc($result);
                $partAmark= (int)$var['partA'];
                $partBmark= (int)$var['partB'];           
                $finalmark+=$partAmark;
                $finalmark+=$partBmark;

            }


            echo "<td>$partAmark</td>";
            echo "<td>$partBmark</td>";


            $totalmarks=$CTmarks+$Amark+$finalmark;
            echo "<td>$totalmarks</td>";



            
            if($totalmarks>=80)
            {
                $grade='A+';
                $gradePoint='4.00';
            }
            else if($totalmarks>=75)
            {
                $grade='A';
                $gradePoint='3.75';
            }
            else if($totalmarks>=70)
            {
                $grade='A-';
                $gradePoint='3.50';
            }
            else if($totalmarks>=65)
            {
                $grade='B+';
                $gradePoint='3.25';
            }
            else if($totalmarks>=60)
            {
                $grade='B';
                $gradePoint='3.00';
            }
            else if($totalmarks>=55)
            {
                $grade='B-';
                $gradePoint='2.75';
            }
            else if($totalmarks>=50)
            {
                $grade='C+';
                $gradePoint='2.50';
            }
            else if($totalmarks>=45)
            {
                $grade='C';
                $gradePoint='2.25';
            }
            else if($totalmarks>=40)
            {
                $grade='D';
                $gradePoint='2.00';
            }
            else
            {
                $grade='F';
                $gradePoint='0';
            }



            echo "<td>$grade</td>";
            echo "<td>$gradePoint</td>";





            echo "</tr>";
            


        }

        ?></table>
             
     
    






</body>
</html>