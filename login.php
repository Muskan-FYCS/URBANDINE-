<?php
include "../config.php";
if(isset($_POST['login'])){
  $email=$_POST['email'];
  $pass=$_POST['password'];

  $res=mysqli_query($conn,"SELECT * FROM admins WHERE email='$email'");
  $row=mysqli_fetch_assoc($res);

  if($row && password_verify($pass,$row['password'])){
    $_SESSION['admin']=$row['name'];
    header("Location: dashboard.php");
  }else{
    echo "<script>alert('Invalid login');</script>";
  }
}
?>
<link rel="stylesheet" href="style.css">

<div class="auth-box">
  <h2>Admin Login</h2>
  <p>Access your dashboard</p>

  <form method="POST">
    <input type="email" name="email" placeholder="Email address" required>
    <input type="password" name="password" placeholder="Password" required>
    <button name="login">Login</button>
  </form>

  <a href="signup.php">Create new admin</a>
</div>
