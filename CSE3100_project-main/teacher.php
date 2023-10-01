<?php

require 'connect_DB.php';

session_start();
$id =    $_SESSION['id'];
$dtlogin='login';
$s = "select * from $dtlogin where id=$id   ";
$r = mysqli_query($con,$s);
$v = mysqli_fetch_assoc($r);
$name=$v['name'];
$email= $v['email'];
$pass= $v['password'];
$type=$v['type'];
if($type=='Student')
{
    $roll=$v['roll'];
}
$dept=$v['dept'];
$phone=$v['phone'];
$datatablelogin='login';

$dtfinalmark='finalmark';




$dtPhoto='photo';


if($type!="Teacher"){

    header('location:main.php');

}


?>





<html>
<head>
<title> login and registration </title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="sstyle.css">
</head>
<body>



<div class="list">

 

    <div class="row">
            <div class="col-sm-3">
                <div class="minibox">
                    <div class="d-flex justify-content-center">
                        <p><h4><?php echo $name ?></h4></p>
                    </div>
                </div>
                

                    <?php 
                    $sql = "SELECT * FROM $dtPhoto WHERE personID=$id ORDER BY id DESC";
                    $res = mysqli_query($con,  $sql);

                    if (mysqli_num_rows($res) != 0) {
          	            $image = mysqli_fetch_assoc($res) 
                            ?>
             
                            <div class="d-flex justify-content-center" >
             	                <img class="profilePic"alt="Image not found"  src="uploads/<?=$image['image_url']?>"  >
                            </div>
                        <?php 
                    }
                    else
                    {
                        ?>
                        <div class="d-flex justify-content-center" >
                            <img class="profilePic" alt="Image not found"  src="uploads/blank.webp"  >
                        </div>
                   <?php 

                    }
                        
                    ?>
                
        

            </div>
            <div class="col-sm-7">
                <div class="minibox">
                <div class="container"  >
                    <h3><p>Information :  </p></h3>

                        <div class="row">
                            <div class="col-sm-3" >
                            <h6><p>Email  </p></h6>

                            </div>
                            <div class="col-sm-1" >
                            <h6><p>:</p></h6>
                            </div>
                            <div class="col-sm-8" >
                            <p>   <?php echo $email ;?></p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3" >

                            <h6><p>Phone No.  </p></h6>

                            </div>
                            <div class="col-sm-1" >
                            <h6><p>:</p></h6>
                            </div>
                            <div class="col-sm-8" >

                            <p> <?php echo $phone; ?></p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3" >
                            <h6><p>Dept.  </p></h6>

                            </div>
                            <div class="col-sm-1" >
                            <h6><p>:</p></h6>
                            </div>
                            <div class="col-sm-8" >
                            <p>    <?php echo $dept ;?></p>

                            </div>
                        </div>
                        

                    </div>

                </div>


                <div class="d-flex justify-content-end" style="margin: 10px;">
                    <a href="editProfile.php"><button class="btn btn-success ">Edit Profile</button> </a>    
                </div>
                
            </div>
            <div class="col-sm-2">

                <div class="d-flex justify-content-end" style="margin: 10px;">
                    <a href="logout.php"><button class="btn btn-danger ">logout</button> </a>
                </div>
    

            </div>
           

    </div>


</div>
  
<div class="list" >
    <div class="d-flex justify-content-center">
    <div class="btn-group">
        <form  method='post'>
            <button type="submit" class="btn btn-primary" name="viewCourse" >view Courses list</button>
        </form>
    </div>

    <div class="btn-group">
    <form  method='post'>
                <button type="submit" class="btn btn-primary" name="attendance" >take Attendance</button>
            </form>
       
    </div>
    <div class="btn-group">
        <form  method='post'>
                <button type="submit" class="btn btn-primary"  name="viewAttendance" >view Attendance-Sheet</button>
            </form>

    </div>
    <div class="btn-group">
            <form  method='post'>
                <button type="submit" class="btn btn-primary" name="ctmark" >store CT Mark</button>
            </form>
        </div>
        <div class="btn-group">
            <form  method='post'>
                <button type="submit" class="btn btn-primary" name="viewCTmarks" >view CT-Mark Sheet</button>
            </form>
        </div>

        <div class="btn-group">
            <form  method='post'>
                <button type="submit" class="btn btn-primary" name="finalmark" >add Final Mark</button>
            </form>
        </div>
        
        <div class="btn-group">
            <form  method='post'>
                <button type="submit" class="btn btn-primary" name="viewResult" >View Result</button>
            </form>
        </div>
    </div>
    </div>
   
         
        
    <?php

//

//______________final marks_____________
if(isset($_POST["finalmark"]))
{


    global $id,$con;
    $datatable ="course";
    $s = "select * from $datatable where  personID = '$id' ";
    $result = mysqli_query($con,$s);
    $num = mysqli_num_rows($result);
    if($num!=0)
    {

        ?>

    <div class="d-flex justify-content-center">
    <div class="list"  >
    <h3 style="text-align: center;"> Add final marks </h3>
    <form method='post'>
        <div>
        <label>Course Code</label>
            <select class="form-control" name="course" required>
                <?php  
                 global $id,$con;
                 $datatable ="course";
                 $s = "select * from $datatable where  personID = '$id' ";
                 $result = mysqli_query($con,$s);
                 $num = mysqli_num_rows($result);        
                 
                while( $var = mysqli_fetch_assoc($result))
                    { ?><option value="<?php echo $var['course']?>" ><?php echo $var['course']?></option>
                        <?php
                    }
            
                    ?>
            </select>

        </div>
    
        <div class="form-group">
            <label>Roll range</label>
            <input type="text" name="rollStart" class="form-control" required>
            <br>
            <input type="text" name="rollEnd" class="form-control" required>
        </div>
        <div class="d-flex justify-content-end">

        <button type="submit" class="btn btn-success" name="getfinalmark" >NEXT</button>

        </div>
    </form> 

    </div>
    </div>
    <?php

               
    }
    else
    {
        ?>

    <div class="d-flex justify-content-center">
        
    <div class='list'>
        <div class="minibox">
            <h3>No Course are available</h3>

        </div>
        <div class="minibox">
            <div class="form-group"> 
                <form  method='post'>
                    <button type="submit" class="btn btn-success btn-block " name="addCourse" >Add Course</button>
                </form>
            </div>
        </div>
    </div>
       
    </div>

      <?php


    }





}

if(isset($_POST["getfinalmark"]))
{

    $rollStart = $_POST['rollStart'];
        $rollEnd = $_POST['rollEnd'];
        $course = $_POST['course'];



        ?>
         <div class="d-flex justify-content-center" >
             <div class="list">
        <form method='post'>
                <input type="hidden" name="rollStart" value="<?php echo $rollStart?>">
                <input type="hidden" name="rollEnd" value="<?php echo $rollEnd?>">
                <input type="hidden" name="course" value="<?php echo $course?>">

        
            <table class="table table-striped table-bordered" style="max-width: 500px;">
                <tr>
                    <td>Roll</td>
                    <td>Part-A</td>
                    <td>Part-B</td>
                </tr>
        
        <?php
        $datatable='finalmark';
        for($i=$rollStart;$i<=$rollEnd;$i++)
        {

            $s = "select * from $datatable where  course='$course' && roll='$i' ORDER BY id DESC";
            $result = mysqli_query($con,$s);
            $num = mysqli_num_rows($result);

            $valueA;
            $valueB;
            if($num==0)
            {
                $valueA=''; 
                $valueB='';

            }
            else
            {
                $var = mysqli_fetch_assoc($result);         
                $valueA=$var['partA'];
                $valueB=$var['partB'];
            }


            ?>

				<tr>
                    <td><?php echo $i?></td>
                    <td style="text-align: center;"><input type="number" value="<?php echo $valueA?>" name="A<?php echo $i?>"></td>
                    <td style="text-align: center;"><input type="number" value="<?php echo $valueB?>" name="B<?php echo $i?>"></td>
                </tr>
                   
            <?php

        }

        ?>
        </table>

            <button type="submit" class="btn btn-success  btn-block" name="savefinalmarks" >Save</button>

        </form>
         </div>
         </div>
        
        <?php
        


   

}
if(isset($_POST["savefinalmarks"]))
{

    global $name;
    global $con;

    $rollStart = $_POST['rollStart'];

    $rollEnd = $_POST['rollEnd'];
    $course = $_POST['course'];


    $datatable="finalmark";
   
    for($i=$rollStart;$i<=$rollEnd;$i++)
    {

        $xA=$_POST['A'.$i];
        $xB=$_POST['B'.$i];


        $s = "select * from $datatable where  course='$course' && roll='$i' ORDER BY id DESC";
        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);

        if($num==0)
        {
            $query = "INSERT INTO $datatable VALUES('','$i','$course','$xA','$xB','$name') ";

            mysqli_query($con,$query);
  
        }
        else
        {
            $var = mysqli_fetch_assoc($result);         
            $newID=$var['id'];

            $query = "UPDATE $datatable  SET partA='$xA',partB='$xB',teacher='$name' WHERE id=$newID";

            mysqli_query($con,$query);


        }

    }


    ?>
    <div class="d-flex justify-content-center">
    <div class="list">
    <h3>Data Store successfully</h3>
    </div></div>
    <?php

   



}




//______________view attendance sheet_____________
    if(isset($_POST["viewAttendance"]))
    {

        global $id,$con;
        $datatable ="course";
        $s = "select * from $datatable where  personID = '$id' ";
        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);
        if($num!=0)
        {

            ?>


        <div class="d-flex justify-content-center">
        <div class="list" >
        <h2> Attendance Sheet  </h2>
        <form method='post'>
            <div>
            <label>Course Code</label>
                <select name="course" class="form-control" required>
                    <?php  
                     global $id,$con;
                     $datatable ="course";
                     $s = "select * from $datatable where  personID = '$id' ";
                     $result = mysqli_query($con,$s);
                     $num = mysqli_num_rows($result);
         
                     
                    while( $var = mysqli_fetch_assoc($result))
                        { ?><option value="<?php echo $var['course']?>" ><?php echo $var['course']?></option>
                            <?php
                        }
                
                        ?>
                </select>
    
            </div>
        
            <div class="form-group">
                <label>Roll range</label>
                <input type="text" name="rollStart" class="form-control" required>
                <br>
                <input type="text" name="rollEnd" class="form-control" required>
            </div>

            <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success" name="showAttendance" >NEXT</button>

            </div>
        </form> 
        </div></div>
    
    
        <?php


            
        }
        else
        {
            ?>

        <div class="d-flex justify-content-center">
            
        <div class='list'>
            <div class="minibox">
                <h3>No Course are available</h3>

            </div>
            <div class="minibox">
                <div class="form-group"> 
                    <form  method='post'>
                        <button type="submit" class="btn btn-success btn-block " name="addCourse" >Add Course</button>
                    </form>
                </div>
            </div>
        </div>
           
        </div>
  
          <?php

        }

    }

    if(isset($_POST["showAttendance"]))
    {
        $rollStart = $_POST['rollStart'];
        $rollEnd = $_POST['rollEnd'];
        $course = $_POST['course'];

        global $id,$con;
        $datatable ="attendance";
       

        $days = ['Saturday','Sunday','Monday','Tuesday' ,'Wednesday'];



        ?><?php

        ?>
        
        <div class="outer-wrapper">
        <div class="d-flex justify-content-end" >
            <a target="_blank" href="generatePDF.php?id=<?=$row['id']?>" class="btn  btn-success"> <i class="fa fa-file-pdf-o"></i>Print</a>
        </div>
        <div class="minibox"><h3 style="text-align: center;">Attendance Sheet</h3>
        <h4 style="text-align: center;">Course code : <?php echo $course ?></h4></div>
        
            
            <div class="table-wrapper" >
            <table class="table table-striped table-bordered" style="margin: 10px;">
                <tr>
                    <td><h5>Roll</h5></td>
                    <?php 
                    for($j=1;$j<=15;$j++)
                    {
                        foreach($days as $k)
                        {
                            $s10 = "select * from $datatable where day='$k' && cycle='$j' && course='$course' && roll>='$rollStart' && roll<='$rollEnd'";
                            $result10 = mysqli_query($con,$s10);
                            $num10 = mysqli_num_rows($result10);

                            if( $num10 != 0)
                            {echo "<td ><h5>$j $k[0]$k[1]$k[2]</h5></td>"; }
                            
                        }


                    } 
                    ?>
                
                    <td><h5>Present</h5></td>
                    <td><h5>Percentage</h5></td>
                </tr>

        <?php
        for($i=$rollStart;$i<=$rollEnd;$i++)
        {
            echo "<tr>";
            echo "<td><h5>$i</h5></td>";

            $total=0;
            $prsnt=0;

            for($j=1;$j<=15;$j++)
            {
                $zz=0;
                foreach($days as $k)
                { 
                    $s10 = "select * from $datatable where day='$k' && cycle='$j' && course='$course' && roll>='$rollStart' && roll<='$rollEnd'";
                    $result10 = mysqli_query($con,$s10);
                    $num10 = mysqli_num_rows($result10);
                    
                    if($num10 != 0)
                    {
                                    
                    $s = "select * from $datatable where day='$k' && cycle='$j' && course='$course' && roll='$i'  ORDER BY id DESC";
                    $result = mysqli_query($con,$s);
                    $num = mysqli_num_rows($result);
                    $ans=0;

                    $total++;
                    if($num==0)
                    {
                        echo "<td></td>";
                        continue;
                    }
                  
                    
                    $var = mysqli_fetch_assoc($result);
                    $ans=$var['attendance'];
                    $tcrName=$var['teacher'];
    
                    
                    if($ans==1)
                    {
                        $prsnt++;
                    }
                    echo "<td title='$tcrName'>$ans</td>";

                    }
                    
                    
                } 
    
            }
            //echo "<td>$total</td>";
            echo "<td>$prsnt</td>";
            if($total==0)
            {
                $percentage=0;
            }
            else
            {
                $percentage=round(($prsnt/$total)*100,2);
            }
            echo "<td>$percentage%</td>";
            echo "</tr>";


            $_SESSION['rollStart']= $rollStart;
            $_SESSION['rollEnd ']= $rollEnd ;
            $_SESSION['course']= $course;
            $_SESSION['pdf']='tcr_attendance.php';
            
        }

        ?></table>

        
          </div>
        </div>
        
        </div>
        <?php
    }



    //____________view course_____________

        if(isset($_POST["viewCourse"]))
        {
            showCourse();

        }


        //________________add course______________
        if(isset($_POST["addCourse"]))
        {
            ?>
            <div class="d-flex justify-content-center">
            <div class="list" >
         
            
            <div class="form-group" ">
            <form  method='post'>
            <label>Enter Course Code:</label>
                <?php 
                
                for($i=0;$i<10;$i++) 
                {
                    $ii=$i+1; ?>
      
                <div class="form-group">
                    <label><?php echo "$ii : "; ?></label>
                    <input type="text"  name="course<?php echo $i?>" class="form-control" value="">
                    </div>
                    <?php 
                }?>
      
                <button type="submit" class="btn btn-success btn-block" name="saveCourse" >Save</button>
            </form>
            </div>
        
            </div>
            </div>
            
            <?php
        }

        if(isset($_POST["saveCourse"]))
        { 
            global $id,$con;

            $datatable ="course";
           



            for($i=0;$i<10;$i++)
            {
                $x="course".$i;
                $newCourse=$_POST[$x];
                if($newCourse!="")
                {
                    $s = "INSERT INTO $datatable VALUES('','$id','$newCourse','$type')";
                    mysqli_query($con,$s);

                }

            }
           
            showCourse();

        }



    function showCourse()
        {
            global $id,$con;
            $datatable ="course";
            $s = "select * from $datatable where  personID = '$id' ";
            $result = mysqli_query($con,$s);
            $num = mysqli_num_rows($result);

            if($num!=0)
            {
                ?>
                 <div class="d-flex justify-content-center">
                 <div class="list" >
                    <table class="table table-striped table-bordered"  >
                        <tr>
                            <td><h5>Course Code</h5></td>
                            <td colspan="10000000"><h5>Other Teacher<br>Name</h5></td>
                        </tr>
                <?php

                        while( $var = mysqli_fetch_assoc($result))
                        {
                            ?>
                            <tr>
                                <td ><?php echo $var['course']?></td>  
                            <?php

                                global $datatablelogin;
                            $c= $var['course'];
                            $s = "select * from $datatable where type='Teacher' && course='$c' && personID<>$id ";
                            $r = mysqli_query($con,$s);
                            ?><?php
                            while( $v = mysqli_fetch_assoc($r))
                            {
                                $newid=$v['personID'];
                                $q = "select * from $datatablelogin WHERE id=$newid ";
                                $k = mysqli_query($con,$q);
                                $d = mysqli_fetch_assoc($k);
                                $tcrName=$d['name'];
                                echo "<td>".$tcrName."</td>";


                            }
                            ?><?php


                        ?>
                        </tr>
                        
                        <?php


                        }

                ?>
                    </table>

                  
                    <div class="form-group"> 
                    <form  method='post'>
                        <button type="submit" class="btn btn-success btn-block " name="addCourse" >Add Course</button>
                    </form>
                 </div>
                    <div class="form-group"> 
                    <form  method='post'>
                        <button type="submit" class="btn btn-danger btn-block " name="deleteCourse" >Delete Course</button>
                    </form>
                    </div>
            


                    </div>
                 </div>

                 <?php
              
            }
            else
            {
                ?>

        <div class="d-flex justify-content-center">
            
        <div class='list'>
            <div class="minibox">
                <h3>No Course are available</h3>

            </div>
            <div class="minibox">
                <div class="form-group"> 
                    <form  method='post'>
                        <button type="submit" class="btn btn-success btn-block " name="addCourse" >Add Course</button>
                    </form>
                </div>
            </div>
        </div>
           
        </div>
  
          <?php


            }



        }

        //__________delete course_____________

if(isset($_POST["deleteCourse"]))
{


    global $id,$con,$datatablelogin;
    $datatable ="course";
    $s = "select * from $datatable where  personID = '$id' ";
    $result = mysqli_query($con,$s);
    $num = mysqli_num_rows($result);


    if($num!=0)
    {
        ?>
            <div class="d-flex justify-content-center">
            <div class="list">
            <form method='post'>

                <table class="table table-striped table-bordered" ">
                    <tr>
                        <td>Course</td>
                        <td>select for Delete</td>
                    </tr>
            
            <?php
            while( $var = mysqli_fetch_assoc($result))
            {
                $c= $var['course'];
                ?>
    
                    <tr>
                        <td><?php echo $c?></td>
                        <div class="checkbox" ><td style="text-align: center;"><input type="checkbox"  value="<?php echo $c?>" name="courses[]"></td></div>
                    </tr>
                       
                <?php
    
            }
    
            ?>
            </table>
            <button type="submit" class="btn btn-danger btn-block" name="courseDeleteDone" >Delete</button>

    
            </form>
            </div>
            </div>
            
            <?php

    }
    else
    {
        ?>
        <div class="d-flex justify-content-center">
            <div class="list">
                <h3>No Course are available</h3>
            </div>
        </div>
        <?php
    }


}

if(isset($_POST["courseDeleteDone"]))
{


        $courses=$_POST['courses'];


        if(empty($courses))
        {
            goto k;
        }


        global $id,$con;
        $datatable ="course";
     
        foreach ($courses as $c)
        {
            $s = "DELETE FROM $datatable where  personID = '$id' && course='$c' ";
            mysqli_query($con,$s);
    
        }
    
        k:
    
        ?>
    
        <div class="d-flex justify-content-center">
            <div class="list">
                <h3>Delete successfully</h3>
            </div>
        </div>
          
          
          <?php

showCourse();


}




        




        //_____________input attendance___________________

    if(isset($_POST["attendance"]))
    {

        global $id,$con;
        $datatable ="course";
        $s = "select * from $datatable where  personID = '$id' ";
        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);
        if($num!=0)
        {

            showAttendanceform();
            
        }
        else
        {
            ?>

        <div class="d-flex justify-content-center">
            
        <div class='list'>
            <div class="minibox">
                <h3>No Course are available</h3>

            </div>
            <div class="minibox">
                <div class="form-group"> 
                    <form  method='post'>
                        <button type="submit" class="btn btn-success btn-block " name="addCourse" >Add Course</button>
                    </form>
                </div>
            </div>
        </div>
           
        </div>
  
          <?php


        }
     
    }


    function showAttendanceform()
    {
        ?>
         <div class="d-flex justify-content-center">
        <div class="list"  >
        <h2> take Attendance  </h2>
        <form method='post'>
            <div>
            <label>Course Code</label>
                <select class="form-control" name="course"  required>
                    <?php  
                     global $id,$con;
                     $datatable ="course";
                     $s = "select * from $datatable where  personID = '$id' ";
                     $result = mysqli_query($con,$s);
                     
                    while( $var = mysqli_fetch_assoc($result))
                        { ?><option value="<?php echo $var['course']?>" ><?php echo $var['course']?></option>
                            <?php
                        }
                
                        ?>
                </select>
    
            </div>
        
            <div class="form-group">
                <label>Roll range</label>
                <input type="text" name="rollStart" class="form-control" required>
                <br>
                <input type="text" name="rollEnd" class="form-control" required>
            </div>

            <div>
                <label>Cycle</label>
                <select name="cycle" class="form-control">
                <?php 
                for($i=1;$i<=15;$i++)
                {
                    echo "<option value='$i' >  $i  </option>";
                }
                ?>
                </select>
    
            </div>

            <div>
            <label>Course Code</label>
                <select name="day" class="form-control">
                    <option value="Saturday" >Saturday</option>
                    <option value="Sunday" >Sunday</option>
                    <option value="Monday" >Monday</option>
                    <option value="Tuesday" >Tuesday</option>
                    <option value="Wednesday" >Wednesday</option>
                </select>
    
            </div>
            <br>

            
            <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success" name="takeAttendance" >NEXT</button>
            </div>

        </form> 
        </div>
         </div>
    
    
        <?php

    }



    if(isset($_POST["takeAttendance"]))
    {
        $rollStart = $_POST['rollStart'];
        $rollEnd = $_POST['rollEnd'];
        $cycle = $_POST['cycle'];
        $day = $_POST['day'];
        $course = $_POST['course'];



        ?>
        <div class="d-flex justify-content-center">
        <div class="list">
        <form method='post'>
                <input type="hidden" name="rollStart" value="<?php echo $rollStart?>">
                <input type="hidden" name="rollEnd" value="<?php echo $rollEnd?>">
                <input type="hidden" name="cycle" value="<?php echo $cycle?>">
                <input type="hidden" name="day" value="<?php echo $day?>">
                <input type="hidden" name="course" value="<?php echo $course?>">

        
                
          
            <table class="table table-striped table-bordered" ">
                <tr>
                    <td>Roll</td>
                    <td>Attendance Status</td>
                </tr>
        
        <?php
        
        $datatable ="attendance";
        for($i=$rollStart;$i<=$rollEnd;$i++)
        {
            $click="";


            $s = "select * from $datatable where day='$day' && cycle='$cycle' && course='$course' && roll='$i'  ORDER BY id DESC";
            $result = mysqli_query($con,$s);
            $num = mysqli_num_rows($result);
            $ans=0;

            
            if($num!=0)
            {
                $var = mysqli_fetch_assoc($result);
                $ans=$var['attendance'];
            }
            
            if($ans==1)
            {
                $click='checked';
            }
            ?>

				<tr>
                    <td><?php echo $i?></td>
                    <div class="checkbox" ><td style="text-align: center;"><input type="checkbox" <?php echo $click?>  value="<?php echo $i?>" name="attendanceStatus[]"></td></div>
                </tr>
                   
            <?php

        }

        ?>
        </table>
        <button type="submit" class="btn btn-success  btn-block" name="takeAttendanceDone" >DONE</button>
      

           

        </form>
        </div>
        </div>
        
        <?php




        
    }

    if(isset($_POST["takeAttendanceDone"]))
    {

        $rollStart = $_POST['rollStart'];
        $rollEnd = $_POST['rollEnd'];
        $cycle = $_POST['cycle'];
        $day = $_POST['day'];
        $course = $_POST['course'];
        $rolls = $_POST['attendanceStatus'];

        $attendance = Array($rollEnd-$rollStart+1);
        for($i=$rollStart;$i<=$rollEnd;$i++)
        {
            $attendance[$i-$rollStart]=0;
        }


        foreach($rolls as $roll)
        {
            $attendance[$roll-$rollStart]=1;
        }

        global $con,$name;
        $datatable ="attendance";

        for($i=$rollStart;$i<=$rollEnd;$i++)
        {

            $s = "select * from $datatable where day='$day' && cycle='$cycle' && course='$course' && roll='$i'  ORDER BY id DESC";
            $result = mysqli_query($con,$s);
            $num = mysqli_num_rows($result);

            $status=$attendance[$i-$rollStart];
            if($num==0)
            {  
                $s = "INSERT INTO $datatable VALUES('','$i','$course','$cycle','$day','$status','$name')";
                mysqli_query($con,$s);
            }
            else
            {
                $var = mysqli_fetch_assoc($result);
                $newID=$var['id'];

                $s = "UPDATE $datatable SET attendance=$status , teacher='$name' WHERE id=$newID  ";
                mysqli_query($con,$s);


            }
    

        }

        ?>
        <div class="d-flex justify-content-center">
        <div class="list">
        <h3>Data Store successfully</h3>
        </div></div>
        <?php

    }



    //_____ input ct marks_______________
    if(isset($_POST["ctmark"]))
    {
        global $id,$con;
        $datatable ="course";
        $s = "select * from $datatable where  personID = '$id' ";
        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);
        if($num!=0)
        {

            ?>
            <div class="d-flex justify-content-center">
            <div class="list" >
        <form method='post'>
        <h2> input CT marks  </h2>
            <div>
            <label>Course Code</label>
                <select class="form-control" name="course" required>
                    <?php  
                     global $id,$con;
                     $datatable ="course";
                     $s = "select * from $datatable where  personID = '$id' ";
                     $result = mysqli_query($con,$s);
                     $num = mysqli_num_rows($result);        
                     
                    while( $var = mysqli_fetch_assoc($result))
                        { ?><option value="<?php echo $var['course']?>" ><?php echo $var['course']?></option>
                            <?php
                        }
                
                        ?>
                </select>
    
            </div>
        
            <div class="form-group">
                <label>Roll range</label>
                <input type="text" name="rollStart" class="form-control" required>
                <br>
                <input type="text" name="rollEnd" class="form-control" required>
            </div>

            
            <div>
             <label>Class-Test No.</label>
                <select class="form-control" name="ctno">
                <?php 
                for($i=1;$i<=4;$i++)
                {
                    echo "<option value='$i' >  $i  </option>";
                }
                ?>
                </select>
    
            </div>
            

            <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success" name="showCTmarkForm" >NEXT</button>

            </div>
        </form> 
        </div>
            </div>
    
    
        <?php

                   
        }
        else
        {
            ?>

            <div class="d-flex justify-content-center">
                
            <div class='list'>
                <div class="minibox">
                    <h3>No Course are available</h3>
    
                </div>
                <div class="minibox">
                    <div class="form-group"> 
                        <form  method='post'>
                            <button type="submit" class="btn btn-success btn-block " name="addCourse" >Add Course</button>
                        </form>
                    </div>
                </div>
            </div>
               
            </div>
      
              <?php
    
        }

        
    }

    if(isset($_POST["showCTmarkForm"]))
    {

        $rollStart = $_POST['rollStart'];
        $rollEnd = $_POST['rollEnd'];
        $course = $_POST['course'];
        $ctno = $_POST['ctno'];



        ?>
         <div class="d-flex justify-content-center" >
             <div class="list">
        <form method='post'>
                <input type="hidden" name="rollStart" value="<?php echo $rollStart?>">
                <input type="hidden" name="rollEnd" value="<?php echo $rollEnd?>">
                <input type="hidden" name="course" value="<?php echo $course?>">
                <input type="hidden" name="ctno" value="<?php echo $ctno?>">

        
            <table class="table table-striped table-bordered" style="max-width: 500px;">
                <tr>
                    <td>Roll</td>
                    <td>Marks</td>
                </tr>
        
        <?php
        $datatable='marks';
        for($i=$rollStart;$i<=$rollEnd;$i++)
        {

            $s = "select * from $datatable where ctNo='$ctno' && course='$course' && roll='$i' ORDER BY id DESC";
            $result = mysqli_query($con,$s);
            $num = mysqli_num_rows($result);

            $value;
            if($num==0)
            {
                $value=''; 
            }
            else
            {
                $var = mysqli_fetch_assoc($result);         
                $value=$var['marks'];
            }


            ?>

				<tr>
                    <td><?php echo $i?></td>
                    <td style="text-align: center;"><input type="number" value="<?php echo $value?>" name="<?php echo $i?>"></td>
                </tr>
                   
            <?php

        }

        ?>
        </table>

            <button type="submit" class="btn btn-success  btn-block" name="takeCTmarksDone" >DONE</button>

        </form>
         </div>
         </div>
        
        <?php
        

    }


    if(isset($_POST["takeCTmarksDone"]))
    {
        global $name;
        global $con;

        $rollStart = $_POST['rollStart'];

        $rollEnd = $_POST['rollEnd'];
        $course = $_POST['course'];
        $ctno = $_POST['ctno'];


        $datatable="marks";
       
        for($i=$rollStart;$i<=$rollEnd;$i++)
        {

            $x=$_POST[$i];
            if($x=="")
            {
                $x='A';
            }

            $s = "select * from $datatable where ctNo='$ctno' && course='$course' && roll='$i' ORDER BY id DESC";
            $result = mysqli_query($con,$s);
            $num = mysqli_num_rows($result);

            if($num==0)
            {
                $query = "INSERT INTO $datatable VALUES('','$i','$course','$ctno','$x','$name') ";

                mysqli_query($con,$query);
      
            }
            else
            {
                $var = mysqli_fetch_assoc($result);         
                $newID=$var['id'];

                $query = "UPDATE $datatable  SET marks='$x',teacher='$name' WHERE id=$newID";

                mysqli_query($con,$query);


            }

        }


        ?>
        <div class="d-flex justify-content-center">
        <div class="list">
        <h3>Data Store successfully</h3>
        </div></div>
        <?php

       

    }
   
    
    //_________ view ct marks__________

    if(isset($_POST["viewCTmarks"]))
    {
        
        global $id,$con;
        $datatable ="course";
        $s = "select * from $datatable where  personID = '$id' ";
        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);
        if($num!=0)
        {

            ?>
            <div class="d-flex justify-content-center">
            <div class="list" >
            <h2> view CT marks sheet  </h2>
            <form method='post'>
                <div>
                <label>Course Code</label>
                    <select class="form-control" name="course" required>
                        <?php  
                         global $id,$con;
                         $datatable ="course";
                         $s = "select * from $datatable where  personID = '$id' ";
                         $result = mysqli_query($con,$s);
                         $num = mysqli_num_rows($result);
    
                         if($num==0)
                         {
                             echo "<script>alert('please add Course')</script>";
    
                         }
             
                         
                        while( $var = mysqli_fetch_assoc($result))
                            { ?><option value="<?php echo $var['course']?>" ><?php echo $var['course']?></option>
                                <?php
                            }
                    
                            ?>
                    </select>
        
                </div>
            
                <div class="form-group">
                    <label>Roll range</label>
                    <input type="text" name="rollStart" class="form-control" required>
                    <br>
                    <input type="text" name="rollEnd" class="form-control" required>
                </div>
                
    
                <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success" name="showCTmarks" >NEXT</button>
                </div>
            </form> 
         </div>
            </div>
        
        <?php
    
            
        }
        else
        {
            ?>

        <div class="d-flex justify-content-center">
            
        <div class='list'>
            <div class="minibox">
                <h3>No Course are available</h3>

            </div>
            <div class="minibox">
                <div class="form-group"> 
                    <form  method='post'>
                        <button type="submit" class="btn btn-success btn-block " name="addCourse" >Add Course</button>
                    </form>
                </div>
            </div>
        </div>
           
        </div>
  
          <?php

        }

        
    }

    if(isset($_POST["showCTmarks"]))
    {

        $rollStart = $_POST['rollStart'];
        $rollEnd = $_POST['rollEnd'];
        $course = $_POST['course'];




        $datatable='marks';
        ?>
                <div class="d-flex justify-content-center">
        <div class="list">
        <div class="d-flex justify-content-end" >
     <a target="_blank" href="generatePDF.php?id=<?=$row['id']?>" class="btn  btn-success"> <i class="fa fa-file-pdf-o"></i>Print</a>
     </div>

     <h3 style="text-align: center;">CT mark</h3>
              <h4 style="text-align: center;">Course code : <?php echo $course ?></h4>

            <table class="table table-striped table-bordered"  style="text-align: center;" >
                <tr>
                    <td><h5>Roll</h5></td>
                    <?php 
                    for($j=1;$j<=4;$j++)
                    {
                        
                        echo "<td ><h5>CT-$j </h5></td>"; 
                        
                    } 
                    ?>
                    <td><h5>best of three avg.</h5></td>
                </tr>

        <?php
        for($i=$rollStart;$i<=$rollEnd;$i++)
        {
            echo "<tr>";
            echo "<td>$i</td>";

            $marksList=array(6);
            for($j=0;$j<=5;$j++)
            {
                $marksList[$j]=0;
            }
            
            for($j=1;$j<=4;$j++)
            {
                $ans=0;              
                    $s = "select * from $datatable where ctNo='$j' && course='$course' && roll='$i' ORDER BY id DESC ";
                    $result = mysqli_query($con,$s);
                    $num = mysqli_num_rows($result);
                    

                    if($num==0)
                    {
                        echo "<td></td>";
                        continue;
                    }
    
                    else
                    {
                        $var = mysqli_fetch_assoc($result);
                        
                        $ans=$var['marks'];
                        $tcrName=$var['teacher'];
                        echo "<td title='$tcrName'>$ans</td>";  
                        if($ans=='A')
                        {
                            $ans=0;
                        }
                        
                    }
                     
                    $marksList[$j]=$ans;     
    
            }


            rsort($marksList);
            $ans=$marksList[0]+$marksList[1]+$marksList[2];

            $m=ceil($ans/3);
            echo "<td>$m</td>";
            echo "</tr>";
            
        }


        
        $_SESSION['rollStart']= $rollStart;
        $_SESSION['rollEnd ']= $rollEnd ;
        $_SESSION['course']= $course;
        $_SESSION['pdf']='tcr_ctmark.php';

        ?></table>
       
        </div> </div><?php






    }
    
    

    //__________view all result___________
    if(isset($_POST["viewResult"]))
    {

        global $id,$con;
        $datatable ="course";
        $s = "select * from $datatable where  personID = '$id' ";
        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);
        if($num!=0)
        {

            ?>

        <div class="d-flex justify-content-center">
        <div class="list"  >
        <h3 style="text-align: center;"> view Result </h3>
        <form method='post'>
            <div>
            <label>Course Code</label>
                <select class="form-control" name="course" required>
                    <?php  
                     global $id,$con;
                     $datatable ="course";
                     $s = "select * from $datatable where  personID = '$id' ";
                     $result = mysqli_query($con,$s);
                     $num = mysqli_num_rows($result);        
                     
                    while( $var = mysqli_fetch_assoc($result))
                        { ?><option value="<?php echo $var['course']?>" ><?php echo $var['course']?></option>
                            <?php
                        }
                
                        ?>
                </select>
    
            </div>
        
            <div class="form-group">
                <label>Roll range</label>
                <input type="text" name="rollStart" class="form-control" required>
                <br>
                <input type="text" name="rollEnd" class="form-control" required>
            </div>
            <div class="d-flex justify-content-end">

            <button type="submit" class="btn btn-success" name="showResultSheet" >NEXT</button>

            </div>
        </form> 
    
        </div>
        </div>
        <?php

                   
        }
        else
        {
            ?>

        <div class="d-flex justify-content-center">
            
        <div class='list'>
            <div class="minibox">
                <h3>No Course are available</h3>

            </div>
            <div class="minibox">
                <div class="form-group"> 
                    <form  method='post'>
                        <button type="submit" class="btn btn-success btn-block " name="addCourse" >Add Course</button>
                    </form>
                </div>
            </div>
        </div>
           
        </div>
  
          <?php


        }


    }

    if(isset($_POST["showResultSheet"]))
    {

        $rollStart = $_POST['rollStart'];
        $rollEnd = $_POST['rollEnd'];
        $course = $_POST['course'];

        $datatableMarks='marks';
        $datatableAttendance ="attendance";

        $days = ['Saturday','Sunday','Monday','Tuesday' ,'Wednesday'];

        




        ?>
          <div class="d-flex justify-content-center">
              <div class="list">
              <div class="d-flex justify-content-end" >
     <a target="_blank" href="generatePDF.php?id=<?=$row['id']?>" class="btn  btn-success"> <i class="fa fa-file-pdf-o"></i>Print</a>
     </div>

              <h3 style="text-align: center;">Result Sheet</h3>
              <h5 style="text-align: center;">Course code : <?php echo $course ?></h5>
              
            <table class="table table-striped table-bordered " >
                <tr>
                    <td><h5>Roll</h5></td>
                    <td><h5>Percentage<br> of <br>Attendance</h5></td>
                    <td><h5>Attendance<br> Marks</h5></td>
                    <td><h5>CT<br> Marks</h5></td>
                    <td><h5>Final<br> mark <br>[ Part-A ]</h5></td>
                    <td><h5>Final<br> mark <br>[ Part-B ]</h5></td>
                    <td><h5>Total <br>Marks</h5></td>
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




        $_SESSION['rollStart']= $rollStart;
        $_SESSION['rollEnd ']= $rollEnd ;
        $_SESSION['course']= $course;
        $_SESSION['pdf']='tcr_Result.php';


        ?></table>

          </div>
          </div>
        <?php

    }

    
    ?>

</body>


</html>