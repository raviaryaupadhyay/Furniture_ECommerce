<?php
include('index_head.php');
include('database/connection.php');
$error='';
if(isset($_POST['reg_submit'])){
  $customer_id=uniqid();
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $password=$_POST['password'];

  $sql="INSERT INTO customer(customer_id,name,email,mobile,password) VALUES ('$customer_id','$name','$email','$mobile','$password')";
  if(mysqli_query($con,$sql)){
    $msg="Registered Successfully";
    echo "<script>window.alert('Registered Successfully')</script>";
  }
  else{
    $error="Email or Mobile already Registered";
  }
}
?>
<div class="w3-content w3-display-container" style="max-width:100%;height:500px;">
  <?php
  include('slider.html');
  ?>
  <div class="w3-display-middle w3-xxxlarge w3-text-white">Shop this season's hottest furniture trends!</div>
  <div class="w3-display-bottomright w3-container w3-xxlarge w3-text-white">Find your match here!!</div>
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 5000); // Change image every 2 seconds
}
</script>
<?php
  $sql="SELECT * FROM product_upload LIMIT 4";
  $res=mysqli_query($con,$sql);
  if (mysqli_num_rows($res)>0) {

?>
<div class="w3-main w3-padding w3-padding-hor-32">
<?php while ($row=mysqli_fetch_assoc($res)) {?>
  <div class="w3-container w3-quarter w3-padding">
    <div class="w3-card-4 w3-center">
      <img src="image/<?php echo $row['image'] ;?>" style="width:100%; height: 200px;">
      <h4><? $row['name']?></h4>
      <a href="product_detail.php?id=<?php echo $row['product_id'];?>" class="w3-btn w3-margin w3-theme-l1">Details</a>
      <a href="" class="w3-btn w3-margin w3-theme-l1">Add to Cart</a>
    </div>
  </div>
  <?php
}
}
?>
</div>

<div class="w3-col w3-padding-hor-32">
  <div class="w3-third w3-padding-ver-16">
    <div class="w3-center w3-container w3-theme-l1">
      <h4>Our Furniture Products</h4> 
    </div>
    <span class="cp_text1">
          Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia drerit sed, lorem. Praesent vitae nunc. Sed adipiscing. Nam sed quam vitae orci vulputate varius. Pellentesque odio odio, aliquet vel, ullamcorper a, mollis ac, sem. Praesent pede. Integer ut leo.Sed adipiscing. Nam sed quam vitae orci vulputate varius. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.<br />
          <a href="#" class="cp_link1">read more</a> </span> <span class="cp_head2">Furniture Designs</span> <span class="cp_text1"> Pellentesque odio odio, aliquet vel, ullamcorper a, mollis ac, sem. Praesent pede. Integer ut leo.Sed adipiscing. Nam sed quam vitae orci vulputate varius. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia drerit sed, lorem. Praesent vitae nunc. Sed adipiscing. quam vitae orci vulputate varius.<br />
          <br />
          Pellentesque odio odio, aliquet vel, ullamcorper a, mollis ac, sem. Praesent pede. Integer ut leo.Sed adipiscing. Nam sed quam vitae orci vulputate varius.
  </div>
  <div class=" w3-third">
    <div class="w3-center w3-container w3-theme-l1">
      <h4>Video</h4>
    </div>
    <div class="video-container">
      <iframe width="100%" src="http://www.youtube.com/embed/tF5jeRCdXho?autoplay=0" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
  <div class="w3-third">
    <div class="w3-container">
      <div class="w3-container w3-theme-l1">
        <h4>Register Here</h4>
      </div>
      <form class="w3-container w3-border" action="#" method="POST">

      <p>
        <label class="w3-label w3-text-blue"><b>Name</b></label>
        <input class="w3-input w3-border w3-sand" name="name" type="text" required></p>

      <p>
        <label class="w3-label w3-text-blue"><b>Email</b></label>
        <input class="w3-input w3-border w3-sand" name="email" type="email" required></p>

      <p>
        <label class="w3-label w3-text-blue"><b>Mobile No.</b></label>
        <input class="w3-input w3-border w3-sand" name="mobile" type="text" maxlength="10" minlength="10" required></p>

      <p>
        <label class="w3-label w3-text-blue"><b>Password</b></label>
        <input class="w3-input w3-border w3-sand" name="password" type="password" minlength="6" required></p>

      <p>
        <input class="w3-btn w3-blue" type="submit" value="Register" name="reg_submit"></p>

      </form>
        <span id="error" class="w3-text-red"><?php echo $error; ?></span>
    </div>
  </div>
</div>

<?php
  include('footer.php');
?>
