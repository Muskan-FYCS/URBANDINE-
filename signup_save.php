<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "restaurant");
if ($conn->connect_error) {
  die("Database Connection Failed");
}

$username = trim($_POST['username']);
$email    = trim($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

/* Check if username already exists */
$stmt = $conn->prepare("SELECT id FROM admin WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result(); // ✔ NO get_result()

if ($stmt->num_rows > 0) {
  echo "<script>alert('Username already exists');window.location.href='signup.php';</script>";
  exit;
}

$stmt->close();

/* Insert admin */
$stmt = $conn->prepare("INSERT INTO admin (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
  echo "<script>alert('Signup successful. Please login.');window.location.href='login.php';</script>";
} else {
  echo "Signup Error";
}

$stmt->close();
$conn->close();
?>
