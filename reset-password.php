<?php
include "config.php";

if(!isset($_GET['token']) || empty($_GET['token'])){
  die("Invalid or missing token.");
}

$token = mysqli_real_escape_string($conn, $_GET['token']);

$check = mysqli_query($conn, "SELECT * FROM users 
                              WHERE reset_token='$token' 
                              AND token_expire > NOW()");

if(mysqli_num_rows($check) == 0){
  die("Reset link expired or invalid.");
}

if(isset($_POST['reset'])){
  $pass = $_POST['password'];

  if(strlen($pass) < 6){
    echo "<script>alert('Password must be at least 6 characters');</script>";
  }else{
    $newpass = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_query($conn,"UPDATE users 
                        SET password='$newpass', 
                            reset_token=NULL, 
                            token_expire=NULL 
                        WHERE reset_token='$token'");

    echo "<script>alert('Password updated successfully'); window.location='login.php';</script>";
  }
}
?>
<link rel="stylesheet" href="style.css">

<div class="auth-box">
  <h2>Reset Password</h2>
  <form method="post">
    <input type="password" name="password" placeholder="Enter new password" required>
    <button type="submit" name="reset">Update Password</button>
    echo "<script>alert('Reset link generated. Open this link: $link');</script>";

  </form>
</div>
