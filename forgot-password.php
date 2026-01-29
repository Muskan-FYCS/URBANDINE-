<?php
include "config.php";

if(isset($_POST['send'])){
  $email = $_POST['email'];
  $token = bin2hex(random_bytes(32));
  $expire = date("Y-m-d H:i:s", strtotime("+15 minutes"));

  $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
  if(mysqli_num_rows($check)>0){
    mysqli_query($conn,"UPDATE users SET reset_token='$token', token_expire='$expire' WHERE email='$email'");

    // demo link (for localhost)
    $link = "http://localhost/restaurant/reset-password.php?token=$token";

    echo "<script>alert('Reset link generated. Open this link: $link');</script>";
  }else{
    echo "<script>alert('Email not found');</script>";
  }
}
?>
<link rel="stylesheet" href="style.css">

<div class="auth-box">
<h2>Forgot Password</h2>
<form method="post">
  <input type="email" name="email" placeholder="Enter your registered email" required>
  <button name="send">Send Reset Link</button>
  <p><a href="login.php">Back to Login</a></p>
</form>
</div>
