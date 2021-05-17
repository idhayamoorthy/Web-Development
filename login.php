<?php

$host = "localhost";
$dbemail = "root";
$dbpassword = "";
$dbname = "telemedicine";

$conn = new mysqli ($host, $dbemail, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}

session_start();

if (isset($_POST['email'])){
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($conn,$email);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($conn,$password);
 //Checking is user existing in the database or not
 $query = "SELECT * FROM `register` WHERE email='$email'and password='$password'";
 $result = mysqli_query($conn,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
    if($rows==0)
    {
        $_SESSION['email'] = $email;
        header("Location:dashboard.php");
 }
    else{
     echo "
     <h1 style='text-align:center;'>E-mail or password is incorrect </h1>
     <p style='text-align:center;'> Click here to go <a href='login.html'>Login page</a> </p>";
         }
}

?>
