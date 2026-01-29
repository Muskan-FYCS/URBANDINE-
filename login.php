<?php
include "config.php";

if(isset($_POST['login'])){
  $email=$_POST['email'];
  $pass=$_POST['password'];

  $res=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
  $row=mysqli_fetch_assoc($res);

  if($row && password_verify($pass,$row['password'])){
    $_SESSION['user_id']=$row['id'];
    $_SESSION['user_name']=$row['name'];
    header("Location: my-bookings.php");
  }else{
    echo "<script>alert('Invalid login details');</script>";
  }
}
?>
<link rel="stylesheet" href="style.css">

<div class="auth-box">
<h2>User Login</h2>
<form method="post">
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="password" placeholder="Password" required>
  <button name="login">Login</button>
  <p>No account? <a href="signup.php">Signup</a></p>
  <p><a href="forgot-password.php">Forgot Password?</a></p>

</form>
</div>
