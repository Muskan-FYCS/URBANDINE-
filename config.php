<?php
session_start();
$conn = mysqli_connect("localhost","root","","restaurant");
if(!$conn){ die("Database connection failed"); }
?>
