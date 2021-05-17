<?php

$username = $_POST['username'];
$email  = $_POST['email'];
$password = $_POST['password'];
$phone= $_POST['phone'];

if (!empty($username) || !empty($email) || !empty($password) || !empty($phone) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "telemedicine";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT  email From register Where email = ? Limit 1";
  $INSERT = "INSERT Into register (username, email ,password,phone )values(?,?,?,?)";

     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s",$email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $username,$email ,$password,$phone);
      $stmt->execute();
      echo "<script> alert('Successfully registered!') </script>
      <h1 style='text-align:center;'> Thank you for your registation </h1>
      <p style='text-align:center;'> Click here to go <a href='login.html'>Login page</a> </p>";
     }

      else {
      echo "<h1 style='text-align:center;'>Someone already registered using this email! Try again!!!</h1>
      <p style='text-align:center;'> Click here to <a href='reg.html'>Register</a> </p>";
     }

     $stmt->close();
     $conn->close();
    }
} 
else {
 echo "All field are required";
 die();
}

?>
