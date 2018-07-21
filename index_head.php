<?php
include('database/connection.php');
$error0=$error='';
if (isset($_POST['logout_submit'])) {
  if(session_destroy()) // Destroying All Sessions
  {
    
    header("Location: index.php"); // Redirecting To Home Page

  }
}

if(isset($_POST['user_reg_submit'])){
  $carpainter_id=uniqid();
  $name=$_POST['name'];
  $address=$_POST['address'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $password=$_POST['password'];

  $sql="INSERT INTO carpainter(carpainter_id,name,address,email,mobile,password) VALUES ('$carpainter_id','$name','$address','$email','$mobile','$password')";
   $sql="INSERT INTO customer(customer_id,name,address,email,mobile,password) VALUES ('$carpainter_id','$name','$address','$email','$mobile','$password')";
  if(mysqli_query($con,$sql)||mysqli_query($con,$sql1)){
    $msg="Registered Successfully";
    echo "<script>window.alert('Registered Successfully')</script>";
  }
  else{
    $error0="Email or Mobile already Registered";
  }
}

if(isset($_POST['add_user_login'])){
  $email=$_POST['username'];
  $password=$_POST['password'];

  $sql="SELECT * FROM carpainter";
  $res=mysqli_query($con,$sql);
  if (mysqli_num_rows($res) > 0) {
    // output data of each row
	
    while($row = mysqli_fetch_assoc($res)){
    if ($row['email']==$email && $row['password']==$password) {
      session_start();
      $_SESSION['username']=$email;
      header("location: addproduct.php");
    }
	}
  }
}

if(isset($_POST['user_login'])){
  $email=$_POST['username'];
  $password=$_POST['password'];

  $sql="SELECT * FROM customer";
  $res=mysqli_query($con,$sql);
  if (mysqli_num_rows($res) > 0) {
    // output data of each row
    
    while($row = mysqli_fetch_assoc($res)){
	if ($row['email']==$email && $row['password']==$password) {
      session_start();
      $_SESSION['username']=$email;
      header("location: user.php");
    }
	}
  }
}

if(isset($_POST['admin_login'])){
  $email=$_POST['username'];
  $password=$_POST['password'];

  $sql="SELECT * FROM admin_table";
  $res=mysqli_query($con,$sql);
  if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)){
    if ($row['email']==$email && $row['password']==$password) {
      session_start();
      $_SESSION['username']=$email;
      header("location: admin.php");
    }
	}
  }
}
if(isset($_POST['get_password'])){
  $email=$_POST['username'];
  $sql="SELECT * FROM carpainter";
  $res=mysqli_query($con,$sql);
  if (mysqli_num_rows($res) > 0) {
    // output data of each row
    
    while($row = mysqli_fetch_assoc($res)){
	if ($row['email']==$email) {
		$pass="SELECT password FROM carpainter WHERE email='$email'";
     $to=$email;
	 $subject='This is the password for your id';
	// $body=$pass;
	 $headers='From: rarya1995@gmail.com';
	 mail($to,$subject,$pass,$headers);
      header("location: index.php");
    }
	}
  }
}
if(isset($_POST['get_admin_password'])){
  $email=$_POST['username'];
  $sql="SELECT * FROM admin_table";
  $res=mysqli_query($con,$sql);
  if (mysqli_num_rows($res) > 0) {
    // output data of each row
    
    while($row = mysqli_fetch_assoc($res)){
	if ($row['email']==$email) {
		$pass="SELECT password FROM admin_table WHERE email='$email'";
     $to=$email;
	 $subject='This is the password for your id';
	// $body=$pass;
	 $headers='From: rarya1995@gmail.com';
	 mail($to,$subject,$pass,$headers);
      header("location: index.php");
    }
	}
  }
}
if(isset($_POST['get_user_password'])){
  $email=$_POST['username'];
  $sql="SELECT * FROM customer";
  $res=mysqli_query($con,$sql);
  if (mysqli_num_rows($res) > 0) {
    // output data of each row
    
    while($row = mysqli_fetch_assoc($res)){
	if ($row['email']==$email) {
		$pass="SELECT password FROM customer WHERE email='$email'";
     $to=$email;
	 $subject='This is the password for your id';
	// $body=$pass;
	 $headers='From: rarya1995@gmail.com';
	 mail($to,$subject,$pass,$headers);
      header("location: index.php");
    }
	}
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
  
  <li class="w3-hide-small w3-dropdown-hover w3-right"><a href="#">Login</a>
  <div class="w3-dropdown-content w3-theme-d5 w3-card-4">
    <a href="#" onclick="document.getElementById('id03').style.display='block'" >Admin</a>
    <a href="#" onclick="document.getElementById('id04').style.display='block'">User</a>
  </div>
  </li>
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
    <li><a href="#">Login</a>
  <div class="w3-dropdown-content w3-theme-d5 w3-card-4">
    <a href="#" onclick="document.getElementById('id03').style.display='block'" >Admin</a>
    <a href="#" onclick="document.getElementById('id04').style.display='block'">User</a>
  </div></li>
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

<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
  
    <div class="w3-center"><br>
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
      <img src="image/img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
    </div>

    <form class="w3-container" action="#" method="POST">
      <div class="w3-section">
        <label><b>Username</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>

        <label><b>Password</b></label>
        <input class="w3-input w3-border" type="password" minlength="6" placeholder="Enter Password" name="password" required>

        <input class="w3-btn-block w3-blue w3-section w3-padding" type="submit" value="Login" name="add_user_login">
        <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
      </div>
    </form>

    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
      <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-btn w3-red">Cancel</button>
      <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#" onclick="document.getElementById('id05').style.display='block'">password?</a></span>
    </div>

  </div>
  </div>

  <div id="id02" class="w3-modal">
  <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
  
    <div class="w3-center"><br>
      <span onclick="document.getElementById('id02').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
    </div>

    <form class="w3-container" action="#" method="POST">
      <div class="w3-section">
        <label><b>Name</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Name" name="name" required>

        <label><b>Address</b></label>
        <input class="w3-input w3-border" type="text" placeholder="Enter Address" name="address" required>

        <label><b>Email</b></label>
        <input class="w3-input w3-border" type="email" placeholder="Enter email id" name="email" required>

        <label><b>Mobile No.</b></label>
        <input class="w3-input w3-border" type="text" placeholder="Enter Mobile No." name="mobile" required>

        <label><b>Password</b></label>
        <input class="w3-input w3-border" type="password" minlength="6" placeholder="Enter Password" name="password" required>

        <input class="w3-btn-block w3-blue w3-section w3-padding" type="submit" value="Register" name="user_reg_submit">
        <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
      </div>
    </form>

    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
      <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-btn w3-red">Cancel</button>
      <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#" onclick="document.getElementById('id05').style.display='block'">password?</a></span>
    </div>

  </div>
  </div>

  <div id="id03" class="w3-modal">
  <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
  
    <div class="w3-center"><br>
      <span onclick="document.getElementById('id03').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
      <img src="image/img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
    </div>

    <form class="w3-container" action="#" method="POST">
      <div class="w3-section">
        <label><b>Username</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>

        <label><b>Password</b></label>
        <input class="w3-input w3-border" type="password" minlength="6" placeholder="Enter Password" name="password" required>

        <input class="w3-btn-block w3-blue w3-section w3-padding" type="submit" value="Login" name="admin_login">
        <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
      </div>
    </form>

    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
      <button onclick="document.getElementById('id03').style.display='none'" type="button" class="w3-btn w3-red">Cancel</button>
      <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#" onclick="document.getElementById('id06').style.display='block'">password?</a></span>
    </div>

  </div>
  </div>

  <div id="id04" class="w3-modal">
  <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
  
    <div class="w3-center"><br>
      <span onclick="document.getElementById('id04').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
      <img src="image/img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
    </div>

    <form class="w3-container" action="#" method="POST">
      <div class="w3-section">
        <label><b>Username</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>

        <label><b>Password</b></label>
        <input class="w3-input w3-border" type="password" minlength="6" placeholder="Enter Password" name="password" required>

        <input class="w3-btn-block w3-blue w3-section w3-padding" type="submit" value="Login" name="user_login">
        <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
      </div>
    </form>

    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
      <button onclick="document.getElementById('id04').style.display='none'" type="button" class="w3-btn w3-red">Cancel</button>
      <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#" onclick="document.getElementById('id07').style.display='block'">password?</a></span>
    </div>

  </div>
  </div>
 <div id="id05" class="w3-modal">
  <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
  
    <div class="w3-center"><br>
      <span onclick="document.getElementById('id05').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
      <img src="image/img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
    </div>

    <form class="w3-container" action="#" method="POST">
      <div class="w3-section">
        <label><b>Username</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
		<input class="w3-btn-block w3-blue w3-section w3-padding" type="submit" value="GET PASSWORD" name="get_password">
      </div>
    </form>

    
  </div>
  </div>
   <div id="id06" class="w3-modal">
  <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
  
    <div class="w3-center"><br>
      <span onclick="document.getElementById('id06').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
      <img src="image/img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
    </div>

    <form class="w3-container" action="#" method="POST">
      <div class="w3-section">
        <label><b>Username</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
		<input class="w3-btn-block w3-blue w3-section w3-padding" type="submit" value="GET PASSWORD" name="get_admin_password">
      </div>
    </form>

    
  </div>
  </div>
   <div id="id07" class="w3-modal">
  <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
  
    <div class="w3-center"><br>
      <span onclick="document.getElementById('id07').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
      <img src="image/img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
    </div>

    <form class="w3-container" action="#" method="POST">
      <div class="w3-section">
        <label><b>Username</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
		<input class="w3-btn-block w3-blue w3-section w3-padding" type="submit" value="GET PASSWORD" name="get_user_password">
      </div>
    </form>

    
  </div>
  </div>