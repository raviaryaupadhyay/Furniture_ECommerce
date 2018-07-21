<?php
include('header.php');
$id=$_GET['id'];
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
                    </tr>
                  </table>
                  <a href="allow.php?id='.$row["product_id"].'" class="w3-btn w3-margin w3-theme-l1">Allow</a>
                  <a href="block.php?id='.$row["product_id"].'" class="w3-btn w3-margin w3-theme-l1">Block</a>
                </div>
              </div>';
      }
    ?>



