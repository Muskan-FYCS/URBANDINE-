<?php
session_start();
$conn = new mysqli("localhost","root","","restaurant");
if($conn->connect_error){
  die("DB Error");
}

$username = trim($_POST['username']);
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT password FROM admin WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows === 1){
  $row = $result->fetch_assoc();

  if(password_verify($password, $row['password'])){
    $_SESSION['admin'] = $username;
    header("Location: dashboard.php");
    exit;
  }
}

echo "<script>alert('Invalid Login');window.location.href='login.php';</script>";
