<?php
session_start();                                                                   
if(isset($_SESSION['username'])){
	include('header.php');
}
else{
	include('index_head.php');
}
$id=$_GET['id'];
?>
<?php
include('database/connection.php');
$error='';
if(isset($_POST['order'])){
  $customer_id=$_POST['user_id'];
  $address=$_POST['address'];
  $mobile=$_POST['mobile'];

  $sql="INSERT INTO booked_product(id,address,mobile) VALUES ('$customer_id','$address','$mobile')";
  if(mysqli_query($con,$sql)){
    $msg="Registered Successfully";
    echo "<script>window.alert('Registered Successfully')</script>";
  }
  else{
    $error="Email or Mobile already Registered";
  }
}
if(isset($_SESSION['username']))
{
	?>

<nav class="w3-sidenav w3-collapse w3-theme-l1 w3-animate-left" style="z-index:3;width:300px;"><br>
    <div class="w3-container">
      <h5>Dashboard</h5>
    </div>
    <a href="#" class="w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove"></i>  Close Menu</a>
    <?php
    $sql="SELECT * FROM admin_table WHERE email='$login_id'";
    $res=mysqli_query($con,$sql);
    if (mysqli_num_rows($res) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($res);
        echo '<h5 class="w3-padding">Welcome:<b class="w3-padding">'.ucfirst($row["name"]).'</b></h5>';
    }
    ?>
    
  </nav>
<?php }?>

  <!-- Overlay effect when opening sidenav on small screens -->
  <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px;margin-top:43px;">

   <?php
  $sql="SELECT * FROM product_upload WHERE product_id='$id'";
  $res=mysqli_query($con,$sql);
  if (mysqli_num_rows($res) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($res);
        echo '<div class="w3-container w3-half w3-padding">
                <div class="w3-card-4 w3-center">
                  <img src="image/'.$row["image"].'" style="width:100%;">
                </div>
              </div>
              <div class="w3-container w3-half w3-padding">
                <div class=" w3-center">
                  <h4>'.ucfirst($row["name"]).'</h4>
                  <table style"width:100%;">
                    <tr>
                      <td>Category:</td>
                      <td>'.$row["category"].'</td>
                    </tr>
                    <tr>
                      <td>Price:</td>
                      <td>Rs:'.$row["price"].'/</td>
                    </tr>
                    <tr>
                      <td>Discription:</td>
                      <td>'.$row["product_details"].'</td>
                    </tr><tr>
                      <td>Purchase Mode</td>
                      <td style="color:red"> Ghar par hi le lenge</td>
                    </tr>
                  </table>
                </div>
              </div><br>
	<div class="w3-third">
    <div class="w3-container">
      <div class="w3-container w3-theme-l1">
        <h4>Place order</h4>
      </div>
      <form class="w3-container w3-border" action="#" method="POST">
		<input type="hidden" name="user_id" value="$login_id">
      <p>
        <label class="w3-label w3-text-blue"><b>Address</b></label>
        <textarea class="w3-input w3-border w3-sand" name="address" type="text" cols="10" required></textarea></p>

	  <p>
        <label class="w3-label w3-text-blue"><b>Mobile No.</b></label>
        <input class="w3-input w3-border w3-sand" name="mobile" type="text" required></p>

      <p>
        <input class="w3-btn w3-blue" type="submit" value="Order" name="order"></p>

      </form>
        <span id="error" class="w3-text-red"><?php echo $error; ?></span>
    </div>
  </div>';
        }
    ?>