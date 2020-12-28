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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning Jason!</h3>
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
 $username = mysqli_real_escape_string($link,$_POST['username']);
 $password = mysqli_real_escape_string($link,md5($_POST['password']));


 if (empty($username)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong>Email Cannot Be Empty.
    </div>";
}

elseif (empty($password)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong> Username Cannot Be Empty.
    </div>";
}



else{

// Attempt insert query execution
    $result = mysqli_query($link, "SELECT * FROM user WHERE username='".$username."'");

  if ($result->num_rows) {
 $sql =  "UPDATE user SET password='$password'  WHERE username='".$username."' ";
        if(mysqli_query($link, $sql)){
            echo "<div class='alert alert-success'>
            <strong>Success!</strong> Password Successfully Updated.
            </div>";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
                          } 

   else
  {
  echo "<div class='alert alert-danger'>
            <strong>Failed!</strong> Username not found.
            </div>";
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
                                <h4 class="card-title">Change Password</h4>
                                <form class="mt-4" method="post">
                                    <div class="form-group">
                                    <label>Username</label>
                                        <input type="text" class="form-control" name="username"  id="maxval"
                                            aria-describedby="maxval" >
                                    </div>
                                    <div class="form-group">
                                    <label>New Password</label>
                                        <input type="password" class="form-control" name="password"  id="maxval"
                                            aria-describedby="maxval" >
                                    </div>
                                 
                                    <button name="save" class="btn btn-primary">Change Password</button>
                                </form>
                            </div>
                        </div> 
                </div>
                 <div class="col-md-2">
                    
                </div>
            </div>
                
            </div>
            <?php include 'footer.php'; ?>