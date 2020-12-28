<?php include 'header2.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
      ?>
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
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'conn.php';

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['save'])){
 $email = mysqli_real_escape_string($link,$_POST['email']);
 $username = mysqli_real_escape_string($link,$_POST['username']);
 $password = mysqli_real_escape_string($link,$_POST['password']);


 if (empty($email)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong>Email Cannot Be Empty.
    </div>";
}

elseif (empty($username)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong> Username Cannot Be Empty.
    </div>";
}
elseif (empty($password)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong> Password Cannot Be Empty.
    </div>";
}


else{
    $me = rand();
// Attempt insert query execution
    $sql = "INSERT INTO user (username,email,password) 
    VALUES ('$username','$email',MD5('$password'))";
    if(mysqli_query($link, $sql)){
        echo "<div class='alert alert-success'>
        <strong>Success!</strong> User Account Successfully Created.
        </div>";



// Load Composer's autoloader
require 'autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
 $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
     // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.yandex.com';
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "mail@escrow-giant.com";
//Password to use for SMTP authentication
$mail->Password = "escrowgiant45";
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('mail@escrow-giant.com', $_POST['username']);
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress($_POST['email'], 'Registration Mail');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
  if ($mail->addReplyTo($_POST['email'], $_POST['username'])) {
        $mail->Subject = 'Escrow Giant Inc';
        //Keep it simple - don't use HTML
        $mail->isHTML(true);
           $mail->AddEmbeddedImage('bar.png', 'logoimg', 'bar.png');
        $mail->AddEmbeddedImage('logo.png', 'logoimg1', 'logo.png');
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        $mail->Body = "
                 <img src=\"cid:logoimg1\" />
                    <h3><strong style='color: rgb(255,153,0);'>HELLO</strong> <strong style='text-transform: capitalize; color: rgb(255,153,0);'> $username, </strong> Welcome to Escrow Giant</h3>
                    <p> You Created an account on Escrow-giant.com. This is your login details, Thanks For trusting us</p>
                    <br><br>
                    Username: $username<br>
                    Password: $password
                    <br><br>
                    login here
                    https://www.escrow-giant.com/login.php
                    
                        ";
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.'. $mail->ErrorInfo;
        } else {
            // echo "<script>alert('Message Successfully Sent we will get back to you shortly');
            // window.location.href = 'mail.php'</script>";
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}

//phpmailer ends here
    } else{
        // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   
       echo "<div class='alert alert-danger'>
        <strong>Error!</strong> Username already taken
        </div>";
    }
}
}
// Close connection
mysqli_close($link);

?>
          <form class=" " action="" method="post" >
            <div class="row">
             
          
              <div class="col-12">
                <div class="form-group">
                  <label><b>Username</b></label>
                  <input  class="form-control" name="username"  type="text"  >
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                   <label><b>Password</b></label>
                  <input class="form-control" name="password"  type="password">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                   <label><b>Email</b></label>
                  <input class="form-control" name="email"  type="email" >
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" name="save" class="button button-contactForm btn_4">Create Account</button>
            </div>
          </form>
          <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
        <div class="col-lg-3">
      
        </div>
      </div>
  
  <!-- ================ contact section end ================= -->
  
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