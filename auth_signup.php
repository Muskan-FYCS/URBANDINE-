<?php
$conn = new mysqli("localhost","root","","restaurant");

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO admin (username,email,password) VALUES (?,?,?)");
$stmt->bind_param("sss",$username,$email,$password);

if($stmt->execute()){
  header("Location: signup.php?status=success");
}else{
  header("Location: signup.php?status=error");
}
