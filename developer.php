<?php
session_start();
if(isset($_SESSION['username'])){
	include('header.php');
}
else{
	include('index_head.php');
}
if(isset($_SESSION['username'])){
?>

<nav class="w3-sidenav w3-collapse w3-theme-l1 w3-animate-left" style="z-index:3;width:300px;"><br>
    <div class="w3-container">
      <h5>Dashboard</h5>
    </div>
    <a href="#" class="w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove"></i>  Close Menu</a>
    <?php
    $sql="SELECT * FROM customer WHERE email='$login_id'";
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
  <div class="w3-main" <?php if(isset($_SESSION['username'])){echo 'style="margin-left:300px;margin-top:43px;"'; } else{echo 'style="margin-top:43px;"'; } ?>">

   <?php
  $sql="SELECT * FROM developer";
  $res=mysqli_query($con,$sql);
  if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        echo '<div class="w3-container w3-quarter w3-padding">
                <div class="w3-card-4 w3-center">
                  <img src="image/'.$row["image"].'" style="width:100%; height:200px;">
                  <h4>'.ucfirst($row["name"]).'</h4>
                  <table style"width:100%;">
                    <tr>
                      <td>Category:</td>
                      <td>'.$row["Speciality"].'</td>
                    </tr>
                  </table>
                </div>
              </div>';
        }
      }
    ?>