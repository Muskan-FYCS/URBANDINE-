<?php
include "config.php";

if(!isset($_SESSION['user_id'])){
  header("Location: login.php");
  exit;
}

$user_id=$_SESSION['user_id'];

$name=$_POST['name'];
$mobile=$_POST['mobile'];
$date=$_POST['date'];
$time=$_POST['time'];
$persons=$_POST['persons'];

mysqli_query($conn,"INSERT INTO bookings(user_id,name,mobile,date,time,persons)
VALUES('$user_id','$name','$mobile','$date','$time','$persons')");

echo "<script>alert('Booking Confirmed');window.location='my-bookings.php';</script>";
?>
