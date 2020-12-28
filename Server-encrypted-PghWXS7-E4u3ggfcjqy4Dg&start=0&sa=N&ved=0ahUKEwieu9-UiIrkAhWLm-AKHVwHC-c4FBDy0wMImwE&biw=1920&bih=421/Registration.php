                                                              <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include '../admin/conn.php';

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['save'])){
 $fullname = mysqli_real_escape_string($link,$_POST['fullname']);
  $username = mysqli_real_escape_string($link,$_POST['username']);
 $email = mysqli_real_escape_string($link,$_POST['email']);
 $username = mysqli_real_escape_string($link,$_POST['username']);
 $password = mysqli_real_escape_string($link,$_POST['password']);
 $country = mysqli_real_escape_string($link,$_POST['country']);


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
    $sql = "INSERT INTO user (fullname,username,email,password,country) 
    VALUES ('$fullname','$username','$email',MD5('$password'),'$country')";
    if(mysqli_query($link, $sql)){
   
        echo '<script type="text/javascript">
alert("User Account Successfully Created");
window.location.href = "Registration.html";
</script>';





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