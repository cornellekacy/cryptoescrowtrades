<?php   include 'header.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
<?php   include 'sidebar.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-2">
                    
                </div>
                 <div class="col-md-8">
                                <?php 
include 'conn.php';
if($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM transaction WHERE transaction_id = {$id}";
    $result = $link->query($sql);

    $data = $result->fetch_assoc();

}

?>
                                                                                 <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'conn.php';

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['save'])){
 $id = mysqli_real_escape_string($link,$_POST['id']);
  $price = mysqli_real_escape_string($link,$_POST['price']);
 $email = mysqli_real_escape_string($link,$_POST['email']);
  $payment = mysqli_real_escape_string($link,$_POST['payment']);
   $username = mysqli_real_escape_string($link,$_POST['username']);




    $me = rand();
// Attempt insert query execution
    $sql = "UPDATE transaction SET status='active'  WHERE transaction_id='$id' ";
    if(mysqli_query($link, $sql)){
        echo "<div class='alert alert-success'>
        <strong>Success!</strong> Transaction Successfully Activated.
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
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER; 
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
            $price = $_POST['price'];
            $email = $_POST['email'];
             $payment = $_POST['payment'];
              $username = $_POST['username'];
        $mail->Body = "
                 <img src=\"cid:logoimg1\" />
                    <h3>HELLO<strong style='color: rgb(255,153,0);'></strong> <strong style='text-transform: capitalize; color: rgb(255,153,0);'> $username, </strong> </h3>
                    <p>Your payment has been received and your transaction has been activated.</p>

                    <br>
                    <p>We received a sum of <strong>$price</strong>USD</p>
                      <br>
                       <p>The payment method was <strong>$payment</strong></p>

                    <br><br>
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
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   
      
    }

}
// Close connection
mysqli_close($link);

?>
                    <div class="card">

                            <div class="card-body">
                                <h4 class="card-title">Activate Transaction</h4>
                                <p>Only activate Transaction when payment has been made</p>
                                <form class="mt-4" method="post">
                                    <div class="form-group">
                                    
                                        <input type="hidden" class="form-control" name="id" id="maxval"
                                            aria-describedby="maxval"  value="<?php echo $data["transaction_id"] ?>">
                                    </div>
                                       <div class="form-group">
                                        <input type="hidden" class="form-control" name="price" id="maxval"
                                            aria-describedby="maxval"  value="<?php echo $data["price"] ?>">
                                    </div>
                                      <div class="form-group">
                                        <input type="hidden" class="form-control" name="email" id="maxval"
                                            aria-describedby="maxval"  value="<?php echo $data["email"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="payment" id="maxval"
                                            aria-describedby="maxval"  value="<?php echo $data["payment"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="username" id="maxval"
                                            aria-describedby="maxval"  value="<?php echo $data["name"] ?>">
                                    </div>
                                  
                                 
                                    <button name="save" class="btn btn-primary">Activate This Transaction</button>
                                </form>
                            </div>
                        </div> 
                </div>
                 <div class="col-md-2">
                    
                </div>
            </div>
                
            </div>
            <?php include 'footer.php'; ?>