<?php
session_start();
$conn = new mysqli("localhost","root","","restaurant");

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM admin WHERE username=?");
$stmt->bind_param("s",$username);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows === 1){
    $row = $result->fetch_assoc();

    // 🔑 VERIFY HASHED PASSWORD
    if(password_verify($password, $row['password'])){
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_user'] = $row['username'];

        header("Location: dashboard.php");
        exit;
    }else{
        header("Location: login.php?error=password");
        exit;
    }
}else{
    header("Location: login.php?error=user");
    exit;
}
