<?php
include('header.php');
?>
<div class="w3-main" style="margin-top:50px;">
<div class="w3-quarter">
    <div class="w3-container">
      <div class="w3-container w3-theme-l1">
        <h4>Add Car</h4>
      </div>
      <form class="w3-container w3-border" action="#" method="POST" enctype="multipart/form-data">

      <p>
        <label class="w3-label w3-text-blue"><b>Car Name</b></label>
        <input class="w3-input w3-border w3-sand" name="name" type="text" required></p>

      <p>
        <label class="w3-label w3-text-blue"><b>Category</b></label>
        <select class="w3-input w3-border w3-sand" name="category">
        <option>Select Category</option>
        <?php
  		$sql="SELECT * FROM category";
  		$res=mysqli_query($con,$sql);
  		if (mysqli_num_rows($res) > 0) {
   		 // output data of each row
    	while($row = mysqli_fetch_assoc($res)) {
        	echo '<option>'.ucfirst($row["product_category"]).'</option>';
    		}
  		}
    	?>
		</select>

      <p>
        <label class="w3-label w3-text-blue"><b>Product Details</b></label>
        <textarea class="w3-input w3-border w3-sand" name="details" type="text" required></textarea></p>

      <p>
        <label class="w3-label w3-text-blue"><b>Price</b></label>
        <input class="w3-input w3-border w3-sand" name="price" type="number" required></p>

      <p>
        <label class="w3-label w3-text-blue"><b>Image</b></label>
        <input class="w3-input w3-border w3-sand" name="image" type="file" required></p>

      <p>
        <input class="w3-btn w3-blue" type="submit" value="Submit" name="data_submit"></p>

      </form>
        <span id="error" class="w3-text-red"><?php echo $error; ?></span>
    </div>
  </div>
</div>

<?php
  $sql="SELECT * FROM product_upload WHERE carpainter_id='$login_id' AND product_status=1";
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
                      <td>'.$row["category"].'</td>
                    </tr>
                    <tr>
                      <td>Price:</td>
                      <td>Rs:'.$row["price"].'/</td>
                    </tr>
                  </table>
                  <a href="" class="w3-btn w3-margin w3-theme-l1">Update</a>
                  <a href="" class="w3-btn w3-margin w3-theme-l1">Delete</a>
                </div>
              </div>';
        }
      }
    ?>

</div>

<?php
include('footer.php');
?>