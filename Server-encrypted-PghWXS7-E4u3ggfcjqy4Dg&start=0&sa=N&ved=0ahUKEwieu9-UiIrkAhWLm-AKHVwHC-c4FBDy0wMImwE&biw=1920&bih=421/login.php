          <?php
//our included config file
include "../admin/conn.php";
//starting our session to preserve our login


//check whether data with the session name username has already been created
//if so redirect to hhomepage
if (isset($_SESSION['username'])) {
    //redirecting if there is already a session with the name username
    // header("Location: home.php");
  echo '   <script> window.location = "../admin/index.php";</script>';
   
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
       echo '   <script> window.location = "../admin/index.php";</script>';
    }else{
        //display error if no record exists
           echo '<script type="text/javascript">
alert("Escrow User Or Password Incorrect");
window.location.href = "customer-login.html";
</script>';

    }
}
?>