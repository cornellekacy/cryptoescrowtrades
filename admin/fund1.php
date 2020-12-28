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
 $amount = mysqli_real_escape_string($link,$_POST['amount']);


 if (empty($amount)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong>Amount Cannot Be Empty.
    </div>";
}




else{


        
 $sql =  "UPDATE transaction SET funds='$amount'  WHERE transaction_id='$id' ";
        if(mysqli_query($link, $sql)){
            echo "<div class='alert alert-success'>
            <strong>Success!</strong> Password Successfully Updated.
            </div>";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
                          
    // $sql = "INSERT INTO user (username,email,password) 
    // VALUES ('$username','$email',MD5('$password'))";
    // if(mysqli_query($link, $sql)){
    //     echo "<div class='alert alert-success'>
    //     <strong>Success!</strong> User Account Successfully Created.
    //     </div>";


//phpmailer ends here
    // } else{
    //     // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   
    //    echo "<div class='alert alert-danger'>
    //     <strong>Error!</strong> Username already taken
    //     </div>";
    // }
}
}
// Close connection
mysqli_close($link);

?>
                    <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Fund User Account</h4>
                                <p>Here, you are just adding the amount the jk sents so he things his money is in his account. when a jk makes payment, just come here and add the amount, it will appear on his/her account</p>
                                <form class="mt-4" method="post">
                                    <div class="form-group">
                                 
                                        <input type="hidden" class="form-control" name="id"  id="maxval"
                                            aria-describedby="maxval" value="<?php echo $data["transaction_id"] ?>">
                                    </div>
                                    <div class="form-group">
                                    <label>Amount</label>
                                        <input type="text" class="form-control" name="amount"  id="maxval"
                                            aria-describedby="maxval" >
                                    </div>
                                 
                                    <button name="save" class="btn btn-primary">Add Fund</button>
                                </form>
                            </div>
                        </div> 
                </div>
                 <div class="col-md-2">
                    
                </div>
            </div>
                
            </div>
            <?php include 'footer.php'; ?>