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
            <?php 
include 'conn.php';
if($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM transaction WHERE transaction_id = {$id}";
    $result = $link->query($sql);

    $data = $result->fetch_assoc();

}

?>
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Make Payment</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                   
                </div>
            </div>
     


                
                <div class="row">
                   <div class="col-md-3">
                       
                   </div> 
                   <div class="col-md-6">
                       <h2 align="center">Make Payment</h2>
                       <p align="center">Our system will detect your payment immediately you deposit funds into escrow wallet.</p>
                       <p>Dispute trade if seller shipped you wrong products or damage items or if no product is send within time limits</p>
                   
                   </div> 
                   <div class="col-md-3">
                       
                   </div> 
                </div>
                
        

            <div class="container-fluid">
                <div class="row">
                   <div class="col-md-3">
                       
                   </div> 
                   <div class="col-md-6">
                    <div align="center">
                    <img src="bitcoin.jpg" height="200">
                    </div>
                       <h2 align="center">Bitcoin</h2>
                       <p>Here is Our Escrow Wallet Address: <br> <strong style="font-size: 15px; color: #000"><?php
             include 'conn.php';
// Check connection
             if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM payment";
            $result = mysqli_query($link, $sql);

            if (mysqli_num_rows($result) > 0) {
    // output data of each row
              while($row = mysqli_fetch_assoc($result)) {

                
                echo $row["bitcoin"];

            }
          } else {
            echo "0 results";
          }

          mysqli_close($link);
          ?></strong></p>
                       <p>bitcoin You Will Pay <b><?php echo $data["currency"];?> <?php echo $data["price"] ?> + <?php echo $data["currency"];?> <?php 
$myNumber =  $data["price"];
 
//I want to get 25% of 928.
$percentToGet = 3;
 
//Convert our percentage value into a decimal.
$percentInDecimal = $percentToGet / 100;
 
//Get the result.
$percent = $percentInDecimal * $myNumber;
 
//Print it out - Result is 232.
echo $percent;
             ?> Fee = <?php $url = "https://blockchain.info/stats?format=json";
          $stats = json_decode(file_get_contents($url), true);
          $btcValue = $stats['market_price_usd'];
          $usdCost =   $data["price"]+ $percent;

          $convertedCost = $usdCost / $btcValue;

          echo number_format($convertedCost, 8). " BTC"; ?></b> 
                       <br><hr><br>
                       <div align="center">
                    <img src="paypal.png" height="200">
                    </div>
                       <h2 align="center">PayPal</h2>
                       <p>Payment through PayPal most be done through Family and Friends, for our system to accept it on Escrow in few minutes. We don't accept payment through Goods and Services because it might take days and we don't want to put Both parties(Buyer/Seller) at Risk.</p>
                       <p>Here is Our Paypal Email Address: <strong style="font-size: 25px; color: #000">




                        <?php
             include 'conn.php';
// Check connection
             if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM payment";
            $result = mysqli_query($link, $sql);

            if (mysqli_num_rows($result) > 0) {
    // output data of each row
              while($row = mysqli_fetch_assoc($result)) {

                
                echo $row["paypal"];

            }
          } else {
            echo "0 results";
          }

          mysqli_close($link);
          ?></strong></p>
                       <p>Paypal You Will Pay <b><?php echo $data["currency"];?> <?php echo $data["price"];?> + <?php echo $data["currency"];?><?php 
$myNumber =  $data["price"];
 
//I want to get 25% of 928.
$percentToGet = 3;
 
//Convert our percentage value into a decimal.
$percentInDecimal = $percentToGet / 100;
 
//Get the result.
$percent = $percentInDecimal * $myNumber;
 
//Print it out - Result is 232.
echo $percent;
             ?> = <?php echo $data["currency"];?> <?php echo $data["price"]+$percent;?></b></p>
                   </div> 
                   <div class="col-md-3">
                       
                   </div> 
                </div>

<hr>


                          <div align="center">
                    <img src="gift.png" height="200">
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        
                      </div>
                       <div class="col-md-6">
                         <p>Payment through Gift Cards. we accept all form of gift cards. scratch the card and take a picture of it and upload it through here. </p>
                      </div>
                       <div class="col-md-3">
                        
                      </div>
                    </div>
                    
                
      <hr>

            
              <div class="row">
                <div class="col-md-3">
                  
                </div>
                <div class="col-md-6">
                    <div class="card">
    <?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


// Load Composer's autoloader
require 'autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (array_key_exists('save', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    $attachment = $_POST['get-photo'];
    $body = 'here is the screenshot';
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
      $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
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
    $mail->setFrom('mail@escrow-giant.com', 'Crypto Escrow Services LLC');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('support@cryptoescrowtrades.com', 'Crypto Escrow Services LLC');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo('support@cryptoescrowtrades.com', 'Crypto Escrow Services LLC')) {
        $mail->Subject = 'Crypto Escrow Services LLC';
        //Keep it simple - don't use HTML
        $mail->isHTML(true);
        $mail->MsgHTML($body);
        //Build a simple message body
          $mail->AddAttachment($_FILES['get-photo']['tmp_name'], $_FILES['get-photo']['name']);

        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            echo 'Sorry, something went wrong. Please try again later.'. $mail->ErrorInfo;
        } else {
            echo "<script>alert('Screenshot Successfully Sent we will get back to you shortly');
            window.location.href = 'pay.php'</script>";
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}

?>
                            <div class="card-body">
                                <h4 class="card-title">Upload Screenshot</h4>
                                <h6 class="card-subtitle">Upload a screenshot of the payment and send to us. Once we see the screenshot and confirm the payment, your escrow transaction will be activated
                                </h6>
                                <form class="mt-4" method="post" enctype="multipart/form-data">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="get-photo" class="custom-file-input" id="inputGroupFile04">
                                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" name="save" type="submit">Upload</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
                <div class="col-md-3">
                  
                </div>
              </div>
            </div>

 <?php include 'footer.php'; ?>