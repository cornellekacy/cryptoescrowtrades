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
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'conn.php';

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['save'])){
 $name = mysqli_real_escape_string($link,$_POST['name']);
 $username = mysqli_real_escape_string($link,$_POST['username']);
 $country = mysqli_real_escape_string($link,$_POST['country']);
 $email = mysqli_real_escape_string($link,$_POST['email']);

 $who = mysqli_real_escape_string($link,$_POST['who']);
 $what = mysqli_real_escape_string($link,$_POST['what']);
  $currency = mysqli_real_escape_string($link,$_POST['currency']);
 $price = mysqli_real_escape_string($link,$_POST['price']);

 $bmethod = mysqli_real_escape_string($link,$_POST['bmethod']);
 $baddress = mysqli_real_escape_string($link,$_POST['baddress']);
  $fee = mysqli_real_escape_string($link,$_POST['fee']);
 $expected = mysqli_real_escape_string($link,$_POST['expected']);
  $ifnotcompleted = mysqli_real_escape_string($link,$_POST['ifnotcompleted']);

 $payment = mysqli_real_escape_string($link,$_POST['payment']);
  $trn_date = mysqli_real_escape_string($link,$_POST['trn_date']);
 $sellername = mysqli_real_escape_string($link,$_POST['sname']);

 $sellercountry = mysqli_real_escape_string($link,$_POST['scountry']);
  $smethod = mysqli_real_escape_string($link,$_POST['smethod']);

 $saddress = mysqli_real_escape_string($link,$_POST['saddress']);
 $description = mysqli_real_escape_string($link,$_POST['description']);


 if (empty($name)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong>Email Cannot Be Empty.
    </div>";
}

elseif (empty($country)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong> Username Cannot Be Empty.
    </div>";
}
elseif (empty($email)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong> Password Cannot Be Empty.
    </div>";
}


else{
    $me = rand();
    $status = 'inactive';
// Attempt insert query execution
    $sql = "INSERT INTO transaction (trans_id,name,username,country,email,who,what,currency,price,bmethod,baddress,payfee,expected,ifnotcompleted,payment,trn_date,sellername,sellercountry,smethod,saddress,descript,status) 
    VALUES ('$me','$name','$username','$country','$email','$who','$what','$currency','$price','$bmethod','$baddress','$fee','$expected','$ifnotcompleted','$payment','$trn_date','$sellername','$sellercountry','$smethod','$saddress','$description','$status')";
    if(mysqli_query($link, $sql)){
        echo "<div class='alert alert-success'>
        <strong>Success!</strong> Transaction Successfully Created.
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
  if ($mail->addReplyTo($_POST['email'], $_POST['jkname'])) {
        $mail->Subject = 'Escrow Giant Inc';
        //Keep it simple - don't use HTML
        $mail->isHTML(true);
           $mail->AddEmbeddedImage('bar.png', 'logoimg', 'bar.png');
        $mail->AddEmbeddedImage('logo.png', 'logoimg1', 'logo.png');
            $name = $_POST['name'];
            $country = $_POST['country'];
            $price = $_POST['price'];
            $expected = $_POST['expected'];
            $payment = $_POST['payment'];

            $trn_date =$_POST['trn_date'];
            $sellername = $_POST['sname'];

            $sellercountry = $_POST['scountry'];
            $smethod = $_POST['smethod'];

            $saddress = $_POST['saddress'];
             $expected = $_POST['expected'];
        $mail->Body = "
                 <img src=\"cid:logoimg1\" />
                    <h3>HELLO<strong style='color: rgb(255,153,0);'></strong> <strong style='text-transform: capitalize; color: rgb(255,153,0);'> $username, </strong> You Started a new Transaction</h3>
                    <p>A new transaction has been started on your account. here are the details</p>
                    <br><br>

                     <strong>FullName</strong>: $name<br>
                     <strong>Country</strong>: $country<br>
                     <strong>Amount to pay</strong>: $price<br>
                     <strong>Delivery date</strong>: $country<br>
                     <strong>Payment Method</strong>: $payment<br>
                     <strong>3% Escrow Fee is paid by</strong>: $fee<br>
                    <br><br>


                    <p>Here is The Sellers Details</p><br><br>
                       <strong>Seller Name</strong>: $sellername<br>
                     <strong>Sellers Country</strong>: $sellercountry<br>
                     <strong>Seller Payment Method Address</strong>: $smethod<br>
                     <strong>Seller  Address</strong>: $saddress<br>
                     <strong>Completion Time</strong>: $expected<br>
                     <strong>Date Started</strong>: $trn_date<br>
                     <br>
                     <strong> <p>Transaction Is Inactive Pending payment</p></strong>
                    
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
        echo '   <script> window.location = "inactive.php";</script>';



//phpmailer ends here
    } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   
       
    }
}
}
// Close connection
mysqli_close($link);

?>
                    <div class="card">

                            <div class="card-body">
                                <h4 class="card-title">Start A New Transaction</h4>
                                <form class="mt-4" method="post">
                                    <div class="form-group">
                                    <label>Full Name</label>
                                        <input type="text" class="form-control"  id="maxval"
                                            aria-describedby="maxval" name="name" >
                                    </div>
                                      <div class="form-group">
                                    
                                        <input type="hidden" class="form-control"  id="maxval"
                                            aria-describedby="maxval" name="username" value="<?php echo $_SESSION['username']; ?>" >
                                    </div>
                                    <div class="form-group">
                                    <label>Country</label>
                                        <input type="text" class="form-control"  id="maxval"
                                            aria-describedby="maxval" name="country" >
                                    </div>
                                      <div class="form-group">
                                    <label>Email</label>
                                        <input type="email" class="form-control"  id="maxval"
                                            aria-describedby="maxval" name="email" >
                                    </div>
                                     <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Who Are You?</label>
                                        <select class="form-control" name="who" id="exampleFormControlSelect1">
                                            <option value="Buyer">Buyer</option>
                                            <option value="Seller">Seller</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">What are you buying/selling?</label>
                                        <select class="form-control" name="what" id="exampleFormControlSelect1">
                                            <option value="Goods">Goods</option>
                                            <option value="Services">Services</option>
                                        </select>
                                    </div>
                                      <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Currency</label>
                                        <select class="form-control" name="currency" id="exampleFormControlSelect1">
                                            <option value="$ USD">USD</option>
                                            <option value="€ EUR">EUR</option>
                                            <option value="$ AUD">AUD</option>
                                             <option value="£ GBP">GBP</option>
                                        </select>
                                    </div>

                                       <div class="form-group">
                                    <label>Amount to pay</label>
                                        <input type="text" class="form-control" id="maxval"
                                            aria-describedby="maxval" name="price" >
                                    </div>
                                        <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Buyer Payment Method</label>
                                        <select class="form-control" name="bmethod"  id="city">
                                            <option value="Bitcoin">Bitcoin</option>
                                            <option value="Paypal">Paypal</option>
                                        </select>
                                    </div>

                                  <div class="form-group">
                                    <label>Buyer Refund Address(bitcoin or paypal)</label>
                                        <input type="text" class="form-control"  name="baddress" 
                                            aria-describedby="maxval" name="baddress" >
                                    </div> 


                                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Who Pays The Escrow Fee: <small>We get 3% fee of the total tansaction</small></h4>
                                                                    <div class="radio">
  <label><input type="radio" name="fee" checked value="Buyer">Buyer</label>
</div>
<div class="radio">
  <label><input type="radio" name="fee" value="Seller">Seller</label>
</div>
<div class="radio">
  <label><input type="radio" name="fee" value="50% Buyer / 50% Seller">50% Buyer / 50% Seller</label>
</div>
                                
                            </div>
                        </div>



                           

                                      <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Expected delivery Date/time</label>
                                        <select class="form-control" name="expected" id="exampleFormControlSelect1">
                                            <option value="1 day">1 day</option>
                                            <option value="2 days">2 days</option>
                                            <option value="3 days">3 days</option>
                                              <option value="4 days">4 days</option>
                                            <option value="5 days">5 days</option>
                                            <option value="6 days">6 days</option>

                                            <option value="7 days">7 days</option>
                                            <option value="8 days">8 days</option>
                                              <option value="9 days">9 days</option>
                                            <option value="10 days">10 days</option>
                                            <option value="11 days">11 days</option>

                                             <option value="12 days">12 days</option>
                                            <option value="13 days">13 days</option>
                                              <option value="14 days">14 days</option>
                                            <option value="15 days">15 days</option>
                                            <option value="16 days">16 days</option>

                                              <option value="17 days">17 days</option>
                                            <option value="18 days">18 days</option>
                                              <option value="19 days">19 days</option>
                                            <option value="20 days">20 days</option>
                                            <option value="21 days">21 days</option>

                                                 <option value="22 days">22 days</option>
                                            <option value="23 days">23 days</option>
                                              <option value="24 days">24 days</option>
                                            <option value="25 days">25 days</option>
                                            <option value="26 days">26 days</option>
                                            <option value="27 days">27 days</option>
                                              <option value="28 days">28 days</option>
                                            <option value="29 days">29 days</option>
                                            <option value="30 days">30 days</option>
                                        </select>
                                    </div>
                                          <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">If Not Completed</label>
                                        <select class="form-control" name="ifnotcompleted" id="exampleFormControlSelect1">
                                            <option value="Open Despute">Open Despute</option>
                                            <option value="Extend for 1days">Extend for 1days</option>
                                            <option value="Extend for 1week">Extend for 1week</option>
                                              <option value="Extend for 1month">Extend for 1month</option>
                                        </select>
                                    </div>
                                      <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Payment Method</label>
                                        <select class="form-control" name="payment" id="exampleFormControlSelect1">
                                            <option value="Bitcoin">Bitcoin</option>
                                            <option value="Paypal">Paypal</option>
                                        </select>
                                    </div>
                                           <div class="form-group">
                                    <label>Transaction Date</label>
                                        <input type="date" class="form-control"  id="maxval"
                                            aria-describedby="maxval" name="trn_date" >
                                    </div>
                                            <div class="form-group">
                                    <label>Seller Name</label>
                                        <input type="text" class="form-control"  id="maxval"
                                            aria-describedby="maxval" name="sname" >
                                    </div>
                                            <div class="form-group">
                                    <label>Seller Country</label>
                                        <input type="text" class="form-control"  id="maxval"
                                            aria-describedby="maxval" name="scountry" >
                                    </div>
                                     <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Seller payment Method</label>
                                        <select class="form-control" name="smethod" id="exampleFormControlSelect1">
                                            <option value="Bitcoin">Bitcoin</option>
                                            <option value="Paypal">Paypal</option>
                                        </select>
                                    </div>
                                     <div class="form-group">
                                    <label>seller address to receive funds(Bitcoin or Paypal)</label>
                                        <input type="text" class="form-control"  id="maxval"
                                            aria-describedby="maxval" name="saddress" >
                                    </div>

                                       <div class="form-group">
                                         <label>Description, Full Address and Phone Number</label>
                                        <textarea class="form-control" name="description" rows="3" placeholder="Text Here..."></textarea>
                                        
                                    </div>
                                    <button name="save" class="btn btn-primary">Create Transaction</button>
                                </form>
                            </div>
                        </div> 
                </div>
                 <div class="col-md-2">
                    
                </div>
            </div>
                
            </div>
            <?php include 'footer.php'; ?>