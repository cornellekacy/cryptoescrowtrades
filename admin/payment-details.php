<?php   include 'header.php'; ?>
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
 $bitcoin = mysqli_real_escape_string($link,$_POST['bitcoin']);
 $paypal = mysqli_real_escape_string($link,$_POST['paypal']);



    $me = rand();
// Attempt insert query execution
    $sql = "UPDATE payment SET bitcoin='$bitcoin',paypal='$paypal'  WHERE payment_id=1 ";
    if(mysqli_query($link, $sql)){
        echo "<div class='alert alert-success'>
        <strong>Success!</strong> payment details Successfully Created.
        </div>";


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
                                <h4 class="card-title">Set Payment Details</h4>
                                <form class="mt-4" method="post">
                                    <div class="form-group">
                                    <label>Bitcoin Wallet Address</label>
                                        <input type="text" class="form-control" name="bitcoin" id="maxval"
                                            aria-describedby="maxval" >
                                    </div>
                                    <div class="form-group">
                                    <label>Paypal Email Address</label>
                                        <input type="email" class="form-control" name="paypal" id="maxval"
                                            aria-describedby="maxval" >
                                    </div>
                                 
                                    <button name="save" class="btn btn-primary">Set Payment Details</button>
                                </form>
                            </div>
                        </div> 
                </div>
                 <div class="col-md-2">
                    
                </div>
            </div>
                
            </div>
            <?php include 'footer.php'; ?>