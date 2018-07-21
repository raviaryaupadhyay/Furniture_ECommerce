<?php
$id=$_GET['id'];
include('database/connection.php');
$sql="UPDATE product_upload SET product_status=0 WHERE product_id='$id'";
if (mysqli_query($con,$sql)) {
	header("location: admin.php");
}
?>