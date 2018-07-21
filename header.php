<?php
include('database/connection.php');
$error0=$error='';
session_start();
$login_id=$_SESSION['username'];
if(isset($_POST['data_submit'])){
  $carpainter_id=$_SESSION['username'];
  $product_id=uniqid();
  $name=$_POST['name'];
  $category=$_POST['category'];
  $detail=$_POST['details'];
  $price=$_POST['price'];

$target_dir = "image/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$image = basename($_FILES["image"]["name"]);
$uploadOk = 1;

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

  $sql="INSERT INTO product_upload(carpainter_id,product_id,name,category,product_details,price,image) VALUES('$carpainter_id','$product_id','$name','$category','$detail',$price,'$image')";
  if(mysqli_query($con,$sql)){
    echo '<script>
          window.alert("Data Inserted");
        </script>';
  }
  else{
    echo '<script>
          window.alert("Data Not Inserted. May be file already exists");
    </script>';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Furniture</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/w3-theme-blue.css">
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
  <style>
html , body {
font-family: Cambria, serif;
}
div {
  text-align: justify;
  text-justify: inter-word;
}
.video-container {
  position:relative;
  padding-bottom:56.25%;
  padding-top:30px;
  height:0;
  overflow:hidden;
}

.video-container iframe, .video-container object, .video-container embed {
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
}
</style>
</head>
<body>
	<div class="w3-container w3-theme-d5 w3-top" style="padding:0px;">
		<div class="w3-quarter w3-center">
			<img src="image/logo.png" style="height:40px;">
		</div>
		<div class="w3-quarter">
			<input class="w3-input w3-round w3-text-black" style="margin-top:2px;" type="search" name="" placeholder="Search">
		</div>
		<div class="w3-half w3-padding-ver-12">
  			<ul class="w3-navbar w3-large w3-left-align" style="margin-left:7px;">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a href="javascript:void(0);" onclick="myFunction()"><i class="fa fa-bars"></i></a>
  </li>
  <li><a href="index.php">Home</a></li>
  <li class="w3-hide-small w3-dropdown-hover"><a href="#">Category</a>
  <div class="w3-dropdown-content w3-theme-d5 w3-card-4">
  <?php
  include('database/connection.php');
  $sql="SELECT * FROM category";
  $res=mysqli_query($con,$sql);
  if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        echo '<a href="cat.php?product_category='.$row["product_category"].'">'.ucfirst($row["product_category"]).'</a>';
    }
  }
    ?>
  </div>
  </li>
  <li class="w3-hide-small"><a href="#">Services</a></li>
  <li class="w3-hide-small w3-dropdown-hover"><a href="#">Add Product</a>
  <div class="w3-dropdown-content w3-theme-d5 w3-card-4">
    <a href="#" onclick="document.getElementById('id01').style.display='block'" >Registered User</a>
    <a href="#" onclick="document.getElementById('id02').style.display='block'">Unregistered User</a>
  </div>
  </li>
  <li class="w3-hide-small w3-right"><a href="logout.php">Logout</a></li>
</ul>
<!-------------------after minimize------------->
<div id="demo" class="w3-hide w3-hide-large w3-hide-medium">
  <ul class="w3-navbar w3-left-align w3-large w3-theme-d5">
    <li><a href="#">Services</a></li>
    <li><a href="#">Add Product</a>
	<div class="w3-dropdown-content w3-theme-d5 w3-card-4">
    <a href="#" onclick="document.getElementById('id01').style.display='block'" >Registered User</a>
    <a href="#" onclick="document.getElementById('id02').style.display='block'">Unregistered User</a>
  </div>
  </li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</div>
		</div>
	</div>
  <script>
function myFunction() {
    var x = document.getElementById("demo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

