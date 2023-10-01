<form action="<?php $_SERVER['PHP_SELF']?>" method="GET">
Search Here<input type="text" name="search_text">
     <input type="submit" value="Search">
</form>

<?php

$conn=mysqli_connect('localhost','root','','sms_db');

if(isset($_GET['search_text'])){
$search_text=$_GET['search_text'];
$sql="SELECT * FROM product where product_name LIKE '$search_text'";
$query=mysqli_query($conn,$sql);


if(mysqli_num_rows($query)>0){
$data=mysqli_fetch_assoc($query);
$product_id = $data['product_id'];
$product_name=$data['product_name'];
$product_code=$data['product_code'];
echo $product_id.' '.$product_name.' '.$product_code;


}


}


?>