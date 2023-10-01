<style>
     * {
          margin: 0px;
          padding: 0px;
          box-sizing: border-box;
     }

     body {
          background-color:darkgray;
          /* display: table;
    margin: 0 auto; */

          display: flex;
          justify-content: center;

          /* align-items: center; */
     }

     .abc {
          width:200px;
          font-size: 25px;
          background-color:darkgreen;
     }
     .searchbox{

          width:200px;
          font-size: 25px;
          background-color:beige;
     }
     .table {
  border: 10px solid black;
  /* border-collapse: collapse; */
}
th, td {
  padding: 5px;
  border: 1px solid blue;
}
th{
     font-size: large;
     font-weight: bolder;
}

</style>


<form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
<br><br>
     <h1>Search Date<h1> <input type="text" name="search_text" class="searchbox">
               <br><br>
               <input type="submit" value="Search" class="abc">
               <br>
</form>

<?php

$conn = mysqli_connect('localhost', 'root', '', 'stop ragging');

if (isset($_GET['search_text'])) {
     $search_text = $_GET['search_text'];
     $sql = "SELECT * FROM information where rag_date LIKE '$search_text'";
     $query = mysqli_query($conn, $sql);

     if (mysqli_num_rows($query) > 0) {
          $data = mysqli_fetch_assoc($query);
          $post_no=$data['post no'];
          $vname = $data['vname'];
          $vroll = $data['vroll'];
          $vseries = $data['vseries'];
          $vemail = $data['vemail'];
          $university = $data['university'];
          $rag_date = $data['rag_date'];
          $rag_time = $data['rag_time'];
          $rag_place = $data['rag_place'];
          $sname = $data['sname'];
          $sroll = $data['sroll'];
          $sseries = $data['sseries'];
          $sdept = $data['sdept'];
          $smobile=$data['smobile'];
          $sfb=$data['sfb'];
          $description=$data['description'];


          echo "<br>";
          echo "<table>
<tr>
<th>Post No</th>
<th>Vname</th>
<th>Vroll</th>
<th>Vseries</th>
<th>Vemail</th>
<th>University</th>
<th>Rag Date</th>
<th>Rag Time</th>
<th>Rag Place</th>
<th>Sname</th>
<th>Sroll</th>
<th>Sseries</th>
<th>Sdept</th>
<th>Smobile</th>
<th>Sfb</th>
<th>Description</th>


</tr>

<tr>
<td>$post_no</td>
<td>$vname</td>
<td>$vroll</td>
<td>$vseries</td>
<td>$vemail</td>
<td>$university</td>
<td>$rag_date</td>
<td>$rag_time</td>
<td>$rag_place</td>
<td>$sname</td>
<td>$sroll</td>
<td>$sseries</td>
<td>$sdept</td>
<td>$smobile</td>
<td>$sfb</td>
<td>$description</td>
</tr>
</table>";
          // echo $vname.' '.$vroll.' '.$vseries;
     }
}


?>