<?php
include "config.php";

if(isset($_POST['signup'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $pass=password_hash($_POST['password'], PASSWORD_DEFAULT);

  $check=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
  if(mysqli_num_rows($check)>0){
    echo "<script>alert('Email already registered');</script>";
  }else{
    mysqli_query($conn,"INSERT INTO users(name,email,password) VALUES('$name','$email','$pass')");
    echo "<script>alert('Signup Successful');window.location='login.php';</script>";
  }
}
?>
<link rel="stylesheet" href="style.css">

<div class="auth-box">
<h2>Create Account</h2>
<form method="post">
  <input type="text" name="name" placeholder="Full Name" required>
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="password" placeholder="Password" required>
  <button name="signup">Sign Up</button>
  <p>Already have account? <a href="login.php">Login</a></p>
</form>
</div>
