<?php
include "../config.php";
if(isset($_POST['signup'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
  mysqli_query($conn,"INSERT INTO admins(name,email,password) VALUES('$name','$email','$pass')");
  header("Location: login.php");
}
?>
<link rel="stylesheet" href="style.css">

<div class="auth-box">
  <h2>Create Admin</h2>
  <p>Register to manage bookings</p>

  <form method="POST">
    <input type="text" name="name" placeholder="Full name" required>
    <input type="email" name="email" placeholder="Email address" required>
    <input type="password" name="password" placeholder="Password" required>
    <button name="signup">Create Account</button>
  </form>

  <a href="login.php">Already have account? Login</a>
</div>
