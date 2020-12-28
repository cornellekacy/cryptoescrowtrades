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




    $me = rand();
// Attempt insert query execution
    $sql = "UPDATE transaction SET dstatus='pending'  WHERE transaction_id='$id' ";
    if(mysqli_query($link, $sql)){
        echo "<div class='alert alert-success'>
        <strong>Success!</strong> Dispute Successfully opened. and administrator will get in contact with your shortly.
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
                                <h4 class="card-title">Open Dispute</h4>
                                <p>Disputes are open when your task is not completed on the set date and time or goods are not delivered on the initial agreement. By opening a dispute, you are asking Escrow Giant to refund back your funds. submite the form below to open a new dispute</p>
                                <form class="mt-4" method="post">
                                    <div class="form-group">
                                    
                                        <input type="hidden" class="form-control" name="id" id="maxval"
                                            aria-describedby="maxval"  value="<?php echo $data["transaction_id"] ?>">
                                    </div>
                                  
                                 
                                    <button name="save" class="btn btn-primary">Open Dispute Now</button>
                                </form>
                            </div>
                        </div> 
                </div>
                 <div class="col-md-2">
                    
                </div>
            </div>
                
            </div>
            <?php include 'footer.php'; ?>