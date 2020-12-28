<?php include 'header2.php'; ?>
    <!-- Header part end-->
    <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
<br><br><hr>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
      
        </div>
        <div class="col-lg-6">
          <?php
//our included config file
include "conn.php";
//starting our session to preserve our login


//check whether data with the session name username has already been created
//if so redirect to hhomepage
if (isset($_SESSION['username'])) {
    //redirecting if there is already a session with the name username
    // header("Location: home.php");
  echo '   <script> window.location = "admin/index.php";</script>';
   
}

//check whether data with the name username has been submitted
if (isset($_POST['save'])) {

    //variables to hold our submitted data with post
    $username = $_POST['username'];
        //Encrypting our login password
    $password = md5($_POST['password']);

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($link, $username);
$password = mysqli_real_escape_string($link, $password);

    //our sql statement that we will execute
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

    //Executing the sql query with the connection
    $re = mysqli_query($link, $sql);

    //check to see if there is any record / row in the database
    //if there is then the user exists
    if (mysqli_num_rows($re)) {
        //echo "Welcome";
        //creating a session name with username ad inserting the submitted username
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        //redirecting to homepage
       echo '   <script> window.location = "admin/index.php";</script>';
    }else{
        //display error if no record exists
        echo "<div class='alert alert-danger' role='alert' align='center'>
  <strong>Oh snap!</strong> check Your Credentials.
</div>";
    }
}
?>
         <form class="" action="" method="post">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label><b>Username</b></label>
                  <input class="form-control" name="username" type="text"  placeholder = 'Username' required="">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label><b>Password</b></label>
                  <input class="form-control" name="password"  type="password"  placeholder = 'password' required="">
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" name="save" class="button button-contactForm btn_4">Login</button>
            </div>
          </form>
          <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>
        <div class="col-lg-3">
      
        </div>
      </div>
    </div>
  </div>
  
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- swiper js -->
    <script src="js/slick.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>


    
</body>

</html>

  <!-- ================ contact section end ================= -->
